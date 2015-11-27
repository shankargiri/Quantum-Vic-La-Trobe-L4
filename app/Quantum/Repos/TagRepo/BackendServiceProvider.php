<?php

namespace Quantum\Repos\TagRepo;

 use Illuminate\Support\ServiceProvider;

 class BackendServiceProvider extends ServiceProvider
 {
 	public function register()
 	{
 		 $this->app->bind('Quantum\Repos\TagRepo\TagInterface', 'Quantum\Repos\TagRepo\TagRepository');
 	}
 }