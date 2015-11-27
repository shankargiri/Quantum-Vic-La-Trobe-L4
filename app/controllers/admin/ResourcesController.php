<?php
namespace Admin;
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

use Resource;
use Photo;
use Viewable;
use Auth, BaseController, Form, Input, Redirect, Sentry, View;
class ResourcesController extends \BaseController {

	protected $layout = 'layouts.master';
	public function index()
	{
		$photo_resources = Resource::unApprovedResourcePhotos();
		$this->layout->content = View::make('admin.resources.index')->with('photo_resources', $photo_resources);
	}
	public function show($id)
	{
		$photos  = array();
        $resource = Resource::find($id);
        $photo_resources = $resource->unApprovedPhotos($id);
		$this->layout->content = View::make('admin.resources.show')->with(array('photo_resources' => $photo_resources, 'resource' => $resource));
	}

	public function approve_photos($resourceId, $photoId)
	{
		$resource = Resource::find($resourceId);
		$photo = Photo::find($photoId);
		try{
			$resource->approve_photos($photoId);
			FacebookSession::setDefaultApplication($_ENV['fb_app_id'], $_ENV['fb_app_secret']);
			$session = new FacebookSession($_ENV['fb_access_token']);
			$request = new FacebookRequest(
		  			$session,
		  			'POST',
		  			'/1461068850808647/photos',
		  			array (
		  				'source' => 'multipart/form-data',
		    			'url' => $photo->url,
		    			'published' => true,
		    			'message' => $resource->name,
		    			'no_story' => false
		  			)
			);

			$response = $request->execute();
			$graphObject = $response->getGraphObject();
			if ($graphObject->getProperty("id") != "" && $graphObject->getProperty("post_id") != "") {
				Redirect::to('admin/resources')->with("success", "Successfully approved photo from $resource->name");
			}else{
				Redirect::to('admin/resources')->with("error", "Error uploading photo");	
			}				
		}
		catch(FacebookApiException $e)
		{
			return Redirect::to('admin/resources')->with("error", $e);
		}
	}

	public function reject_photos($resourceId, $photoId)
	{
		$resource = Resource::find($resourceId);
		$resource->photos()->detach($photoId);
		return Redirect::to('admin/resources')->with("success", "Successfully rejected photos from $resource->name");
	}

	public function publish_resource($resourceId)
	{
		$resource = Resource::find($resourceId);
		$resource->is_publish = true;
		$resource->save();
		return Redirect::to('resources')->with("success", "Successfully published $resource->name");
	}

	public function unpublish_resource($resourceId)
	{
		$resource = Resource::find($resourceId);
		$resource->is_publish = false;
		$resource->save();
		return Redirect::to('resources')->with("success", "Successfully unpublished $resource->name");
	}

	public function report()
	{
		$resouces = Resource::all();
		return View::make('admin.resources.report')->with('resources', $resouces);
	}
	public function defaultPhoto($resId,$photoId)
	{
		$resource = Resource::find($resId);
		Resource::where('id',$resId)->update(array('def_photo_id' => $photoId));
		return Redirect::back();	
	}

	#to be removed
	public function fb_upload_test($resourceId, $photoId)
	{
		try{
			FacebookSession::setDefaultApplication($_ENV['fb_app_id'], $_ENV['fb_app_secret']);
			$session = new FacebookSession($_ENV['fb_access_token']);
			$request = new FacebookRequest(
	  				$session,
	  				'POST',
	  				'/1461068850808647/photos',
	  				array (
	  					'source' => 'multipart/form-data',
	    				'url' => 'http://ideasoffsore.com/firebird/public/uploads/4/14088815117et9AeNYzyQ9ePQnxbnY.jpg',
	    				'published' => true,
	    				'message' => "hello this is my photo",
	    				'no_story' => false
	  				)
			);

			$response = $request->execute();
			$graphObject = $response->getGraphObject();
			if ($graphObject->getProperty("id") != "" && $graphObject->getProperty("post_id") != "") {
				Redirect::to('admin/resources')->with("success", "Successfully uploaded photo");
			}else{
				Redirect::to('admin/resources')->with("error", "Error uploading photo");	
			}			
			
		}
		catch(FacebookApiException $e)
		{
			return Redirect::to('admin/resources')->with("error", $e);
		}	
	}

}