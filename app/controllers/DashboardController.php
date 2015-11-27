<?php

class DashboardController extends BaseController {

	public $layout = 'layouts.master';
	public function index()
	{
		
		$poster = new Poster;
		$coming_soon = $poster->getDates()->first();
		$releasing_date = $coming_soon->release_date;

		$latestResources = Resource::latestPublished()->get();
		$comingSoon = Resource::comingSoon()->get();
		$latestPosts = Post::latestPosts()->get();

		$popularResources = Viewable::popularResource();
		if(Auth::user()->role == 'admin' || Auth::user()->role == 'teacher')
		{
			return View::make('dashboard.index_backup')->with(array('popularResources' => $popularResources, 'latestPosts' => $latestPosts, 
				'latestResources' => $latestResources, 'comingSoon' => $comingSoon, 'releasing_date' => $releasing_date));
		}
		else{
			return View::make('dashboard.index')->with('latestRes',$latestResources)->with('comingSoon', $comingSoon)->with('latestPosts',$latestPosts);
		}
	}

}