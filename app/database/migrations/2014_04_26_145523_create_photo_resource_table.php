<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotoResourceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photo_resource', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('photo_id')->unsigned()->index();
			$table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
			$table->integer('resource_id')->unsigned()->index();
			$table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade');
			$table->boolean('is_approved')->default(false);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('photo_resource');
	}

}
