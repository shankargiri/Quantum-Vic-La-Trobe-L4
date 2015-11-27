<?php

class Photo extends \Eloquent {
	protected $fillable = ["name", "size", "url", "type", "user_id", "tag_ids"];
    public static $thumbnailSizes = array(
        "small"  => array("height" => 80, "width" => 80),
        "medium" => array("height" => 150, "width" => 150),
       // "large"  => array("height" => 300, "width" => 300)
    );
    public function resources()
    {
        return $this->belongsToMany('Resource');
    }

    public function scopeOwned($query, $user_id)
    {
        return $query->where('user_id', '=', $user_id);
    }

    public function resource()
    {
        return $this->belongsTo('Resource');
    }

	public function find_in_json(){
		return array( 
        	"name"         => $this->name,
        	"size"         => $this->size,
    		"url"          => $this->url,
    		"thumbnailUrl" => $this->thumbnailUrl("small"),
    		"deleteUrl"    => url("photos/".$this->id),
    		"deleteType"   => "DELETE"
    	);
	}

    public function thumbnailUrl($thumbSize="small"){
        return str_replace($this->name, $thumbSize."-".$this->name, $this->url);
    }

    public static function getThumbnailSizes()
    {
        return self::$thumbnailSizes;
    }

    public function tags(){
        return $this->morphToMany('Tag', 'taggable');
    }

}