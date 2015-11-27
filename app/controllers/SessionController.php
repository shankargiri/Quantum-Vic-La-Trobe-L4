<?php
class SessionController extends BaseController
{
	public function create()
	{
		if(Auth::check()) return Redirect::to('/admin');
		return View::make('session.create');
	}
	public function store()
	{
		$username = Input::get('username');
		
		$userdata = array(
    	'user_login' => Input::get('username'),
    	'user_pass' => Input::get('password')
		);
		$userId = User::where('user_login',$username)->pluck('ID');
		if (! User::isValid(Input::all()))
		{
			return Redirect::back()->withInput()->withErrors(User::$messages);
		}
		else if(Auth::attempt($userdata))
		{
			//$ip = $_SERVER["REMOTE_ADDR"]; 
			//$track = new Session;
			//$track -> Ip_address = '4245755252';
			//$track -> save();  
			Session::put('userId',$userId);
			Session::put('username',$username);  
			return Redirect::to('/');//->with('ip',$ip);

		}		
		Flash::error('The username or password does not exist. Please Try again.');
		return Redirect::back();
	}
	public function destroy()
	{

		$msg='Logged out';
		Auth::logout();
		Flash::success("You have successfully logged out from the system.");
		return Redirect::to('login');
	}
	public function profile($username){
		$user = User::all();
		var_dump($user);exit;
		
		
	}
}

?>