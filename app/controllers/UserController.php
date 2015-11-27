<?php

class UserController extends BaseController
{
	public function index()
	{
		$users = User::all();
		
		return View::make('/users.index')->with('users', $users);
	}



	public function show($username)
	{
		$user = User::whereUsername($username)->first();
		return View::make('/users/show',['user'=> @user]);
	}


	public function create()
	{
		return View::make('users.create');
	}
	public function store()
	{

		if (! User::isValid(Input::all()))
		{
			return Redirect::back()->withInput()->withErrors(User::$messages);
		}
		$user = new User;
		$user -> user_login = Input::get('username');
		$user -> user_nicename = Input::get('name');
		$user -> user_email = Input::get('email');
		$user -> user_pass = Hash::make(Input::get('password'));
		$user->save();

		Mail::send('emails.welcome', array('username'=>Input::get('username')), function($message){
       		$message->to(Input::get('username')) ->subject('Welcome to Online resource portal!');
    	});
		return Redirect::to('login');
	}

	public function viewProfile()
	{
		$user          = Auth::User();
		$views         = Viewable::viewedResource($user->ID);
		$username 	   = $user->user_login;
		$profilePic    = userProfilePhoto::where('username',$username)->pluck('photoUrl');
		$quiz_attempts = QuizAttempt::ownedAttempts($user->ID)->get();
		if(Auth::user()->role == 'admin' || Auth::user()->role == 'teacher'){
			return View::make('profile.index')->with(array('user' => $user, 'views' => $views, 'quiz_attempts' => $quiz_attempts));
		}
		else{
			return View::make('profile.index_student')->with(array('user' => $user, 'views' => $views, 'quiz_attempts' => $quiz_attempts,'photoUrl'=> $profilePic));			
		}
	}
	
}


?>


