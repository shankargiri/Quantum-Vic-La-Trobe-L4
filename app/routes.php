<?php
{

	Route::filter('auth.admin', function()
	{	
		if(!Auth::check()){
			return Redirect::to('login');	
		} else if(Auth::user()->role != 'admin'){
			return Redirect::to('/')->with('warning', 'You are not allowed to visit admin area');
		}
	});

	Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
	{
        Route::any('/', function()
		{
			return View::make("dashboard.index1");
		});
        Route::resource('resources', 'Admin\ResourcesController', array('only' => array('index', 'show')));
        Route::resource('resources.quizzes', 'Admin\QuizzesController');
        Route::get('resources/{resources}/reject_photos/{photos}', array('uses' => 'Admin\ResourcesController@reject_photos'));
        Route::get('resources/{resources}/publish_resource', array('uses' => 'Admin\ResourcesController@publish_resource'));
        Route::get('resources/{resources}/fb_upload_test/{photos}', array('uses' => 'Admin\ResourcesController@fb_upload_test'));        
        Route::get('resources/{resources}/unpublish_resource', array('uses' => 'Admin\ResourcesController@unpublish_resource'));
        Route::get('resources/{resources}/approve_photos/{photos}', array('uses' => 'Admin\ResourcesController@approve_photos'));
        Route::get('resource_report', array('uses' => 'Admin\ResourcesController@report'));        
	});

	
	Route::group(array('before' => 'auth'), function()
	{
		Route::resource('posts', "PostsController");
		Route::get('viewposts', array('as' => 'viewposts', 'uses' => 'PostsController@viewposts'));
		Route::resource('tags', "TagsController");
		Route::resource('resources', 'ResourcesController');
		Route::resource('photos', 'PhotosController', array("only" => array('index', 'show', 'store', 'destroy')));
		Route::get('resources/{resources}/remove_photos/{photos}', array('as' => 'remove_photos', 'uses' => 'ResourcesController@remove_photos'));
		Route::get('addphotos', array('as' => 'addphotos', 'uses' => 'ResourcesController@addphotos'));
		Route::get('tagphotos', array('as' => 'tagphotos', 'uses' => 'ResourcesController@tagphotos'));
		Route::get('tagresources', array('as' => 'tagresources', 'uses' => 'TagsController@tagsResources'));
		Route::get('tagresources/available', array('as' => 'available', 'uses' => 'TagsController@filterResources'));
		Route::get('galleries', 'ResourcesController@galleries');
		
	
	});
		
		Route::resource('resources', 'ResourcesController');

		Route::resource('resources.quizzes', 'QuizzesController');
		Route::get('resources/{resource_id}/quizzes/{id}/attempt', ['as' => 'resources.quizzes.attempt', 'uses' => 'QuizzesController@attempt']);
		Route::get('resources/{resource_id}/quizzes/{id}/previous_attempts', ['as' => 'resources.quizzes.previous_attempts', 'uses' => 'QuizzesController@previous_attempts']);
		Route::get('resources/{resource_id}/quizzes/{id}/show_answer/{attempt_id}', ['as' => 'resources.quizzes.quiz_attempts.show_answer', 'uses' => 'QuizzesController@show_answer']);
		Route::post('resources/{resource_id}/quizzes/{id}/submit_answer', ['as' => 'resources.quizzes.submit_answer', 'uses' => 'QuizzesController@submit_answer']);

		Route::resource('quizzes.questions', 'QuestionsController');
		Route::resource('photos', 'PhotosController', array("only" => array('index', 'show', 'store', 'destroy')));
		Route::get('resources/{resources}/remove_photos/{photos}', array('as' => 'remove_photos', 'uses' => 'ResourcesController@remove_photos'));
		Route::get('addphotos', array('as' => 'addphotos', 'uses' => 'ResourcesController@addphotos'));

		Route::get('tagPhotos', array('as' => 'tagphotos', 'uses' => 'PhotosController@tagphotos'));
		Route::post('tagPhoto/{id}', 'PhotosController@tagPhoto');
	
		
		Route::post('tagphotos.store', ['as' => 'tagsphotos.store', 'uses' => 'PhotosController@storephotoTag']);
		Route::get('photo/{id}', ['as' => 'photo/{id}', 'uses' => 'PhotosController@photoTagged']);

		Route::get('tagresources', array('as' => 'tagresources', 'uses' => 'TagsController@tagsResources'));
		Route::get('tagresources/available', array('as' => 'available', 'uses' => 'TagsController@filterResources'));
		Route::get('galleries', 'ResourcesController@galleries');
		Route::get('profile','UserController@viewProfile');

		Route::get('Posters.html', ['as' => 'posters', 'uses' => 'PostersController@index']);
		Route::get('Create-Poster.html', ['as' => 'createposters', 'uses' => 'PostersController@create']);
		Route::get('poster/{id}/edit', 'PostersController@edit');
		Route::post('poster.store', 'PostersController@store');
		Route::put('poster/{id}', ['as' => 'poster.update', 'uses' =>'PostersController@update']);
		Route::delete('deleteposter/{id}', 'PostersController@destroy');		
	
	
	
	Route::get('posts', array('before' => 'auth.admin', 'uses' => 'PostsController@index'), function() {});
	Route::get('posts/create', array('before' => 'auth.admin', 'uses' => 'PostsController@create'), function() {});
	Route::get('tags', array('before' => 'auth.admin', 'uses' => 'TagsController@index'), function() {});
	Route::get('tags/create', array('before' => 'auth.admin', 'uses' => 'TagsController@create'), function() {});
	Route::get('resources/create', array('before' => 'auth.admin', 'uses' => 'ResourcesController@create'), function() {});

	Route::get('/', function()
	{
		if(Auth::check()){
			//return View::make("dashboard.index");
			$action = 'index'; 
        	return App::make('DashboardController')->$action();
		}else{
			return View::make("session.create");
		}
	});
	Route::any('/contact_us', function()
    {
        return View::make("contact.dash");
	});
	Route::resource('users','UserController');
	Route::resource('session','SessionController');
	Route::get('login','SessionController@create');
	Route::get('logout','SessionController@destroy');


	}
	Route::get('profile/{username}', 'SessionController@profile');
	Route::resource('userProfilePhoto','userProfilePhotoController');
	
	Route::get('/res', function()
		{
			return View::make("resources.student_view");
		});

	Route::get('/resource/{resourceId}/default/{id}','admin\ResourcesController@defaultPhoto');
	
Route::get('login/fb','fbloginController@login'); 
Route::get('login/fb/callback', 'fbloginController@getfbUser'); 
