<?php

class Option extends \Eloquent {
	protected $fillable = ['name', 'is_correct'];

	public function question()
	{
		return $this->belongsTo('Question');
	}

	public static function validate($input) {

        $rules = array(
	  		'name' => 'required|between:1,250',
	  		'is_correct' => 'required'	  		
		);
        return Validator::make($input, $rules);
	}
}