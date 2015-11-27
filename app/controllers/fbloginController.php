<?php
 class fbloginController extends BaseController{
 	protected function login()
 	{
 	    $facebook = new Facebook(Config::get('facebook'));
	    $params = array(
	        'redirect_uri' => url('/login/fb/callback'),
	        'scope' => 'email',
	    );
	    return Redirect::to($facebook->getLoginUrl($params));
 	}

 	protected function getfbUser()
 	{
 			$code = Input::get('code');
		    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

		    $facebook = new Facebook(Config::get('facebook'));
		    $uid = $facebook->getUser();
		    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

		    $me = $facebook->api('/me');

		    // check if that email exists in wordpress database
		    //if there is user with that email, log them in 
		    //otherwise insert that user with dummy password, and alert that to user
		    $profile = Profile::whereUid($uid)->first();
		    if (empty($profile)) {
		    	
		        $user = new User;
		        $user->user_login = $me['email'];
		        $user->user_nicename = $me['first_name'].' '.$me['last_name'];
		        $user->user_email = $me['email'];
		        //$user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';

		        $user->save();

		        $profile = new Profile();
		        $profile->uid = $uid;
		        $profile->username = $me['first_name']." ".$me['last_name'];
		        $profile = $user->profiles()->save($profile);
		    }

		    $profile->access_token = $facebook->getAccessToken();
		    $profile->save();

		    $user = $profile->user;
		    //dd($user);
		    Auth::login($user);
		    $username = $me['email'];
		    Session::put('username',$username); 
		    $userId = User::where('user_login',$username)->pluck('ID');
		    Session::put('userId',$userId);
		    return Redirect::to('/');//->with('message', 'Logged in with Facebook');
 	}

 }
 ?>