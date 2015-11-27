<?php

class Quiz extends Eloquent {
	protected $fillable = array("title", "description", "user_id", "no_of_questions");

	public function resource()
	{
		return $this->belongsTo('Resource');
	}

	public function questions()
	{
		return $this->hasMany('Question');
	}

	public function quiz_attempts()
	{
		return $this->hasMany("QuizAttempt");
	}

    public static function validate($input) {

        $rules = array(
	  		'title' => 'required|between:4,250',
	  		'no_of_questions' => 'required|integer|between:3,20',
	  		'description' => 'required'	  		
		);
        return Validator::make($input, $rules);
	}

	public function delete()
	{
		$this->questions()->delete();
		return parent::delete();
	}
}