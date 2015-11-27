<?php

use Laracasts\TestDummy\Factory;
use Laracasts\TestDummy\DbTestCase;

class TagTest extends DbTestCase
{
	#validation should fail while passing blank description
	public function test_validation_of_tag_with_blank_desc()
    {
    	$tag_params = array("name" => "Computer Science", "description" => "");
    	$validator  = Tag::validate($tag_params);
		$this->assertTrue($validator->fails());
    }

    #validation should fail while passing blank name
    public function test_validation_of_tag_with_blank_name()
    {
    	$tag_params = array("name" => "", "description" => "Some desc");
    	$validator  = Tag::validate($tag_params);
    	$this->assertEquals($validator->fails(), true);
    }

	#validation should pass when passing valid parameters
    public function test_validation_of_tag_with_valid_parameters()
    {
    	$tag_params = array("name" => "Computer science", "description" => "Some desc");
    	$validator  = Tag::validate($tag_params);
    	$this->assertFalse($validator->fails());
    }

    #test creation of Tag
    public function test_creation_of_tag_with_valid_parameters()
    {
        $tag = Factory::build('Tag');
        $this->assertNotEmpty($tag->name);
        $this->assertNotEmpty($tag->description);
    }

    #should create multiple tags with valid parameters
    public function  test_creation_of_multiple_tags_with_valid_parameters()
    {
        Factory::times(5)->create("Tag");
        $this->assertCount(5, Tag::all());
    }
}
