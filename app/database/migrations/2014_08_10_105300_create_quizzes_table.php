<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizzesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quizzes', function(Blueprint $table) {
			$table->increments('id');
			$table->string("title");
			$table->text('description');
			$table->integer('resource_id')->unsigned()->index();
			$table->foreign('resource_id')->references('id')->on('resources')->onDelete('cascade');
			$table->integer("user_id");
			$table->integer("no_of_questions");
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
		Schema::drop('quizzes');
	}

}
