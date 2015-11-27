<?php

class TagsControllerTest extends TestCase {

	/**
	 * creating tag
	 *
	 * @return void
	 */
	public function test_create_tags()
	{
		$this->call('GET', 'tags/create');

		//$this->assertResponseOk();
	}

}