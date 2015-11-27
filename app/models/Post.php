<?php

class Post extends Eloquent {
	protected $fillable = array("title", "body");

	public static function latestPosts()
    {
    	return DB::table('posts')->orderBy('created_at','desc')->take(5);
    }

    public static function validate($input)
    {
    	$rules = array(
	  		'title' => 'required|between:2,200',
            'body' => 'required'
		);
        return Validator::make($input, $rules);
    }
}