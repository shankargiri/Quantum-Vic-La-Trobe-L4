<?php 

class PhotoTest extends TestCase
{
	#ensure uploads folder is created
	public function test_uploads_folder_is_created()
	{
		$this->assertFileExists(public_path(). "/uploads");
	}
}