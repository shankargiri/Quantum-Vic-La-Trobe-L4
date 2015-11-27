<?php

class Device extends \Eloquent {
	protected $fillable = ["device_type"];

	public function resources()
	{
		return $this->hasOne('Resource');
	}
}