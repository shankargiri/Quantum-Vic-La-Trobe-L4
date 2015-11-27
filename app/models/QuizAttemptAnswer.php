<?php

class QuizAttemptAnswer extends \Eloquent {
	protected $fillable = ['question_id', 'option_id'];

	public function quiz()
	{
		return $this->belongsTo("Quiz");
	}

	public static function validate($input) {

        $rules = array(
	  		'question_id' => 'required',
	  		'option_id' => 'required'
		);
        return Validator::make($input, $rules);
	}

}