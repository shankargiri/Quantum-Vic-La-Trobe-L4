<?php

class Question extends \Eloquent {
	protected $fillable = ['name'];

	public function quiz()
	{
		return $this->belongsTo('Quiz');
	}

	public function options()
	{
		return $this->hasMany('Option');
	}

    public static function validate($input) {

        $rules = array(
	  		'name' => 'required|between:4,250',	  		
		);
        return Validator::make($input, $rules);
	}

	public static function boot()
    {
        parent::boot();
 
        static::deleted(function($question)
        {
            Option::destroy($question->options()->lists('id'));
        });
    }
}