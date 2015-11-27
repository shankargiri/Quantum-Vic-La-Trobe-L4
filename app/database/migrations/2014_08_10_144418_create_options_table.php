<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('options', function(Blueprint $table) {
			$table->increments('id');
			$table->string("name");
			$table->boolean("is_correct")->default(false);
			$table->integer("question_id")->unsigned()->index();
			$table->foreign("question_id")->references("id")->on("questions")->onDelete("cascade");
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
		Schema::drop('options');
	}

}
