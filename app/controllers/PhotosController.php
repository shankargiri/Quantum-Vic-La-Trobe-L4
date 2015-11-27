<?php

class PhotosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $layout = 'layouts.master';
	public function index()
	{
		
		$photos = Photo::owned(Auth::user()->ID)->paginate($_ENV['max_per_page']);
		if(Request::ajax()){
			$results = array();
			foreach($photos as $photo){
				$results[] = $photo->find_in_json();
			}
			return json_encode(array('files' => $results));	
		}
		if(Auth::user()->role == 'admin' || Auth::user()->role == 'teacher'):
			$this->layout->content = View::make("photos.index")->with(array('photos' => $photos));
		else:
			return View::make("photos.index_student")->with(array('photos' => $photos));
		endif;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$id = Auth::user()->ID;
		$files = Input::file('files');
		$assetPath = '/uploads/'.$id;
    	$uploadPath = public_path($assetPath);
    	$results = array();
		foreach ($files as $file) {
        	if($file->getSize() > $_ENV['max_file_size']){
        		$results[] = array(
        			"name"  => $file->getClientOriginalName(),
        			"size"  => $file->getSize(),
        			"error" => "Please upload file less than ".$_ENV['max_file_size']/1000000 . "mb"
				);
        	}else{	
        		//rename filename so that it won't overlap with existing file
        		$extension 		 = $file->getClientOriginalExtension();
        		$filename   =  time().Str::random(20).".".$extension;
	
        		// store our uploaded file in our uploads folder
        		$name              = $assetPath . '/' . $filename;
        		$photo_attributes  = array(
        				'name'      => $filename,
        				'size'      => $file->getSize(),
        				'url' 		=> asset($name),
        				'user_id'	=> $id
	
        		);
        		$photo = new Photo($photo_attributes);
        		if($photo->save()){
					if(!is_dir($uploadPath)){
						mkdir($uploadPath, 0777);
					}
        			//resize image into different sizes
        			foreach(Photo::getThumbnailSizes() as $key => $thumb){
        				Image::make($file->getRealPath())->resize($thumb['width'], $thumb['height'])->save($uploadPath."/".$key."-".$filename);	
        			}
        			//save original file
        			$file->move($uploadPath, $filename);
					$results[] = Photo::find($photo->id)->find_in_json();
     			}
     		}
    	}
    	 // return our results in a files object
    	return json_encode(array('files' => $results));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$photo = Photo::find($id);
		$tagged_photo = $photo->tags()->get();
		$tags = Tag::all();
		return View::make('photos.show', compact('photo', 'tags', 'tagged_photo'));
		
	}

	public function tagPhoto($id)
	{
		$photo = Photo::find($id);
		
		$tagIds = array();
		$inputTags = Input::get('tag_ids');
		if($inputTags !=''){
			 $tagIds = explode(",", $inputTags);
			 $tagIds = array_unique($tagIds);
			 $photo->tags()->sync($tagIds); 
		}
		return Redirect::to('tagPhotos')->with('success', "successfully tagged photo");
	}

	public function tagphotos()
	{
		$photos = Photo::owned(Auth::user()->ID)->paginate($_ENV['max_per_page']);
		return View::make('photos.tagphotos', compact('photos', 'tags'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$photo = Photo::find($id);
		//delete photos with thumbnails from file and photo from db
		foreach(Photo::getThumbnailSizes() as $key => $thumb){
			File::delete(public_path('/uploads/'.$photo->user_id."/").$key."-".$photo->name);
		}
		File::delete(public_path('/uploads/'.$photo->user_id."/").$photo->name);
		$photo->delete();
		$results = array($photo->name => true);
		return json_encode(array('files' => $results));
	}

}



