<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizAttemptAnswers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quiz_attempt_answers', function(Blueprint $table) {
			$table->increments('id');
			$table->integer("question_id")->unsigned()->index();
			$table->foreign("question_id")->references("id")->on("questions")->onDelete("cascade");
			$table->integer('option_id')->unsigned()->index();
			$table->foreign("option_id")->references("id")->on("options")->onDelete("cascade");	
			$table->integer('quiz_attempt_id')->unsigned()->index();
			$table->foreign("quiz_attempt_id")->references("id")->on("quiz_attempts")->onDelete("cascade");	
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
		Schema::drop('quiz_attempt_answers');
	}

}
