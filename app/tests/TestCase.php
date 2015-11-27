<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	public function setup()
	{
		parent::setUp();	
		Session::start();

		//enable filters as filters are disabled by default
 		Route::enableFilters();
        $this->prepareForTests();
	}

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}

	 private function prepareForTests()
    {
        Artisan::call('migrate');
        Mail::pretend(true);
    }

}
