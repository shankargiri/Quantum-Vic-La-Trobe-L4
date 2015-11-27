<?php

class Resource extends \Eloquent {
	protected $fillable = ["name", "description", "url", "level", "faculty"];
	
	public function photos()
	{
		return $this->belongsToMany('Photo');
	}
    public function photoIds()
    {
        return $this->hasMany("photoResource","resource_id");
    }

    public function quizzes()
    {
        return $this->hasMany("Quiz");
    }

    public function views()
    {
        return $this->hasMany('Viewable');
    }

    public function approvedPhotos()
    {
         return $this->belongsToMany('Photo')->wherePivot('is_approved', '=', true);
    }

    public function devices()
    {
        return $this->hasMany('Device');
    }

	public static function validate($input) {

        $rules = array(
	  		'name' => 'required|between:4,200',
            'description' => 'required',
            'url' => 'required',
	  		'level' => 'required',
	  		'faculty' => 'required'
		);
        return Validator::make($input, $rules);
	}

    public static function scopeUnPublished($query)
    {
        return $query->where('is_publish', '=', true);
    }
    public static function latestPublished()
    {
       return DB::table('resources')->where('is_publish' , '1')->orderBy('created_at','desc')->take(3);
    }
    public static function comingSoon()
    {
       return DB::table('resources')->where('is_publish' , '0')->orderBy('id','desc')->take(3);
    }
    
	public function tags(){
	 
		return $this->morphToMany('Tag', 'taggable');
	}

	public static function unApprovedResourcePhotos()
	{
		return DB::table('resources')
            ->join('photo_resource', 'resources.id', '=', 'photo_resource.resource_id')
            ->join('photos', 'photos.id', '=', 'photo_resource.photo_id')
            ->select('photo_resource.*', 'photos.url', 'photos.name as photo_name', 'resources.name as resource_name')
            ->where("photo_resource.is_approved", '=', '0')
            ->distinct()
            ->get();
	}
    
    public function unApprovedPhotos($id)
    {
		return DB::table('resources')
            ->join('photo_resource', 'resources.id', '=', 'photo_resource.resource_id')
            ->join('photos', 'photos.id', '=', 'photo_resource.photo_id')
            ->select('photo_resource.*', 'photos.url', 'photos.name as photo_name', 'resources.name as resource_name')
            ->where("photo_resource.is_approved", '=', '0')
            ->where("resources.id", '=', $id)
            ->distinct()
            ->get();
    }

    public function approve_photos($photoId)
    {
    	DB::table('photo_resource')->where('resource_id', '=', $this->id)->where('photo_id', '=', $photoId)->update(array('is_approved' => '1')); 
    }
}