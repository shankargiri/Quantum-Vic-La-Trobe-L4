<?php

class userProfilePhotoController extends BaseController {
	public function index()
	{

	}
	public function store()
	{
		if (Input::hasFile('image')) {
			$username = Session::get('username');
			$file = Input::file('image');
			$filename = $username.'.jpg';
			$file = $file->move(public_path().'/img/',$filename);
			$assetPath = '/img/';
			$name = $assetPath . $filename;
			$record = new userProfilePhoto;
			$record->username = $username;
			$record->photoUrl = asset($name);
			$record->userId = Session::get('userId');
			userProfilePhoto::where('username',$username)->delete();
			$record -> save();
		}
		return Redirect::back();
	}
}
?>