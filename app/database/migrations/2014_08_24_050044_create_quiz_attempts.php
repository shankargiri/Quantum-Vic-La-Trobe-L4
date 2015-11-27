<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizAttempts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quiz_attempts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('quiz_id')->unsigned()->index();
			$table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
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
		Schema::drop('quiz_attempts');
	}

}
