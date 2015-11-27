<?php 
use Laracasts\TestDummy\Factory;
use Laracasts\TestDummy\DbTestCase;

class ResourceTest extends DbTestCase
{
 	#test creation of Resource
    public function test_creation_of_resource_with_valid_parameters()
    {
        $resource = Factory::build('Resource');
        $this->assertNotEmpty($resource->name);
        $this->assertNotEmpty($resource->description);
    }
}