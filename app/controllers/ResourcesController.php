<?php

class ResourcesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $layout = 'layouts.master';

	public function index()
	{
		$query = Request::get('search');
		if ($query)
		{
			$resources = Resource::unPublished()->where('name','LIKE',"%$query%")->get();
			return View::make("resources.res")->with('resources', $resources);
		}
		if(Auth::user()->role == 'admin' || Auth::user()->role == 'teacher'):
			$resources = Resource::all();	 
			return View::make("resources.index") -> with('resources',$resources);
		else:
			$resources = Resource::unPublished()->get(); 
			return View::make("resources.res")->with('resources', $resources);
		endif;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$resourcetags = array();
		$tags = Tag::all();
		$this->layout->content = View::make("resources.create", compact('resourcetags', 'tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Resource::validate(Input::all());
		if ($validator->fails()) {
			return Redirect::to('resources/create')
				->withErrors($validator)
				->withInput(Input::all());
		} else {
			// store
			$resource 					= new Resource;
			$resource->name             = Input::get('name');
			$resource->description      = Input::get('description');
			$resource->url 				= Input::get('url');
			$resource ->hits            = 0;
			$resource->level            = Input::get('level');
			$resource->faculty          = Input::get('faculty');

			$deviceIds = Input::get('devices');

			$tagIds 					= Input::get('tag_ids');
			$resource->save();
			if($tagIds != ''){
				$tagIds = explode(",", $tagIds);
				$resource->tags()->attach($tagIds);
				
			}
			
			if($deviceIds != '')
			{
				foreach ($deviceIds as $device_type) {
					$device = new Device(array("device_type" => $device_type));

					$resource->devices()->save($device);
				}
			}
			return Redirect::to('resources');
			}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function show($id)
	{

		$resource = Resource::find($id);
		$view     = new Viewable(array('ip_address' => Request::getClientIp(), 'user_id' => Auth::user()->ID));
		if (Auth::user()->role == 'admin') {
			$photos   = $resource->photos()->get();	
			$resource->views()->save($view);
			$views    = $resource->views()->get();
			$this->layout->content = View::make("resources.show", compact('resource', 'photos', 'views'));	

		} else {
			$photos   = $resource->approvedPhotos()->get();
			$resource->views()->save($view);
			$views    = $resource->views()->get();
			return View::make("resources.student_show",compact('resource','photos','views'));
		}

		// $resource->views()->save($view);
		// $views    = $resource->views()->get();
		// $this->layout->content = View::make("resources.show", compact('resource', 'photos', 'views', 'roles'));

	
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$resource = Resource::find($id);
		$resourcetags = $resource->tags()->get();
		$resourceDevice = $resource->devices()->get();
		$tags = Tag::all();
		return View::make("resources.edit", compact('resource', 'tags', 'resourcetags', 'resourceDevice'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// $validator = Resource::validate(Input::all());
		// if ($validator->fails()) {
		// 	return Redirect::to('resources/'.$id. '/edit')
		// 		->withErrors($validator)
		// 		->withInput(Input::all());
		// } else {
			// store
			$resource = Resource::find($id);
			$resource->name            = Input::get('name');
			$resource->description     = Input::get('description');
			$resource->url 			   = Input::get('url');
			$resource->level           = Input::get('level');
			$resource->faculty         = Input::get('faculty');
			$tagIds = array();

			$deviceIds = Input::get('device');

			$tag_ids = Input::get('tag_ids');

			if($tag_ids !=''){
				 $tagIds = explode(",", $tag_ids);
				 $resource->tags()->sync($tagIds); 
			}
			if(($deviceIds != '') || ($deviceIds === ''))
			{
				$resource->devices()->delete();
				foreach ($deviceIds as $device_type) {
					$device = new Device(array("device_type" => $device_type));
					$resource->devices()->save($device);
				}
			}

			$resource->save();
			// redirect
			return Redirect::to('resources')->with('message', 'Successfully updated');
		// }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$resource = Resource::find($id);
		$resource->delete();
		Session::flash('message', 'Successfully deleted the resource!');
		return Redirect::to('resources')->with('message', 'Successfully deleted');
	}

	public function galleries()
	{
		$resources = Resource::all();
		$this->layout->content = View::make("resources.galleries")->with('resources', $resources);
	}

	public function addphotos()
	{
		$resources = Resource::all();
		$photos = Photo::owned(Auth::user()->ID)->get();
		if(Request::ajax()){
			$resource = Resource::find(Input::get('resource_id'));
			$photo_id = Input::get('photo_id');
			//validating the user ownership in photos
			$photo_id = Photo::owned(Auth::user()->ID)->where("id", "=", $photo_id)->get()->first();
			$resource->photos()->attach($photo_id);
		}
		if(Auth::user()->role == 'admin' || Auth::user()->role == 'teacher'):
			$this->layout->content = View::make("resources.addphotos")->with(array('resources' => $resources, 'photos' => $photos));
		else:
			return View::make("resources.addphotos-kids")->with(array('resources' => $resources, 'photos' => $photos));
		endif;
	}


	public function remove_photos($resourceId, $photoId)
	{
		$resource = Resource::find($resourceId);
		$resource->photos()->detach($photoId);
		return Redirect::to('resources/'.$resourceId)->with('success', "Successfully removed photos from $resource->name");
	}
	public function lookResrc()
	{
		if (Request::ajax()) {
			$keyword = Input::get('keyword');
			$resrc = Resource::where('name','LIKE',"%m%");
			return $resrc->name;
		}
	}

	public function device_type()
	{
		//To Do: Here
		//store resource ID and device type in the devices table
		//if it is in smaller screen than hide the resource
	}
}
