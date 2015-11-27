<?php

class QuizAttempt extends \Eloquent {
	protected $fillable = ['user_id'];

	public function quiz()
	{
		return $this->belongsTo("Quiz");
	}

	public function answers()
	{
		return $this->hasMany("QuizAttemptAnswer");
	}

	public static function scopeOwned($query, $user_id)
    {
        return $query->where('user_id', '=', $user_id);
    }

    public static function ownedAttempts($user_id)
    {
    	return DB::table('quiz_attempts')
			->join('quizzes','quizzes.id','=','quiz_attempts.quiz_id')
			->join('resources','resources.id','=','quizzes.resource_id')
			->select('quiz_attempts.*', 'quizzes.title as quiz_title', 'resources.name as resource_name', 'quizzes.resource_id')
			->where("quiz_attempts.user_id",'=',$user_id)
			->orderBy('quiz_attempts.created_at', 'DESC');
			
    }

	public static function validate($input) {

        $rules = array(
	  		'user_id' => 'required'
		);
        return Validator::make($input, $rules);
	}
}