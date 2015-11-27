<?php

use Laracasts\TestDummy\Factory;
use Laracasts\TestDummy\DbTestCase;

class PostTest extends DbTestCase
{

	#validation should fail with blank body
	public function test_validation_of_post_with_blank_desc()
    {
    	$post_params = array("title" => "New Post", "body" => "");
    	$validator   = Post::validate($post_params);
		$this->assertTrue($validator->fails());
    }

    #validation should fail with blank title
    public function test_validation_of_post_with_blank_name()
    {
    	$post_params = array("title" => "", "body" => "Some desc");
    	$validator   = Post::validate($post_params);
    	$this->assertEquals($validator->fails(), true);
    }

    #validation should fail with title of length less than 2
    public function test_validation_of_post_with_min_title_length()
    {
        $post_params = array("title" => "h", "body" => "this is test description");
        $validator   = Post::validate($post_params);
        $this->assertTrue($validator->fails());
    }
	
    #validation should pass with valid parameters
    public function test_validation_of_post_with_valid_parameters()
    {
    	$post_params = array("title" => "My blog is live now", "body" => "Some desc");
    	$validator   = Post::validate($post_params);
    	$this->assertFalse($validator->fails(), false);
    }

    #should create a post with valid paramaters
    public function test_creation_of_post_with_valid_parameters()
    {
        $post = Factory::build("Post");
        $this->assertNotEmpty($post->title);
        $this->assertNotEmpty($post->body);
    }

    #should create multiple posts with valid parameters
    public function  test_creation_of_multiple_posts_with_valid_parameters()
    {
        Factory::times(3)->create("Post");
        $this->assertCount(3, Post::all());
    }

}
