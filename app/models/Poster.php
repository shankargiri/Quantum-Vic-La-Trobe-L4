<?php

class Poster extends \Eloquent {
	protected $fillable = ['title', 'description', 'release_date'];

	protected $table = "posters";
	
	public static function validate($input) {

        $rules = array(
	  		'title' => 'required',
	  		'description' => 'required', 
	  		'release_date' => 'required'
		);
        return Validator::make($input, $rules);
	}
	public function getDates()
	{
		date_default_timezone_set('Australia/Melbourne');
		$date = date('Y/m/d', time());
		return DB::table('posters')->where('release_date', '!=', $date);
	}
}