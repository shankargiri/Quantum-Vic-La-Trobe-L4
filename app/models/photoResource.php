<?php

	 class photoResource extends Eloquent {
			protected $table = 'photo_resource';
			public static function photo()
			{
				return $this->belongsTo('Photo','photo_id');
			}
		}
?>