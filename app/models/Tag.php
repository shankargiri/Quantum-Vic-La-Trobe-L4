<?php

class Tag extends \Eloquent {
	protected $fillable = ['name', 'description'];


	public static function validate($input) {

        $rules = array(
	  		'name' => 'required',
	  		'description' => 'required'
		);
        return Validator::make($input, $rules);
	}

	public function resources()
	{
	    return $this->morphedByMany('Resource', 'taggable');
	}

    // videos
    public function photos()
    {
        return $this->morphedByMany('Photo', 'taggable');
    }
}