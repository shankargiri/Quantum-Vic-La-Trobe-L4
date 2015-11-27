<?php

class Viewable extends \Eloquent {
	protected $fillable = ['ip_address', 'user_id'];
	
	public function Resource()
	{
		return $this->belongsTo('Resource');
	}

	public static function viewedResource($id)
	{
		return DB::table('viewables')
		->join('resources','resources.id','=','viewables.resource_id')
		->select('resources.id as resource_id', 'resources.name as resource_name', 'viewables.updated_at')
		->where("viewables.user_id",'=',$id)
		->orderBy('viewables.updated_at', 'DESC')
		->take(3)
		->get();
	}

	public static function popularResource()
	{
		return DB::table('viewables')
		->join('resources','resources.id','=','viewables.resource_id')
		->where('resources.is_publish','=',1)
		->groupBy('viewables.resource_id')
		->orderBy('count','desc')
		->take(3)
		->get(array('viewables.resource_id','resources.name','resources.description',DB::raw('count(*) as count')));
	}
}