<?php

class QuestionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $layout = 'layouts.master';
	public function index($quiz_id)
	{
		$quiz = Quiz::find($quiz_id);
		$questions = $quiz->questions()->get();
		$this->layout->content = View::make("questions.index")->with(array('quiz' => $quiz, 'questions' => $questions));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($quiz_id)
	{
		$quiz = Quiz::find($quiz_id);
		$questions = $quiz->questions()->get();	
		if(sizeof($questions) > 0 ){
			return Redirect::to('quizzes/'.$quiz->id.'/questions');
		}else{
			$this->layout->content = View::make("questions.create")->with(array('quiz' => $quiz));	
		}	
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($quiz_id)
	{	
		try{	
			DB::beginTransaction();
			$quiz = Quiz::find($quiz_id);
			foreach(Input::get('question') as $input_question){
				$question_params = array("name" => $input_question['name']);
				$question_validator = Question::validate($question_params);
				if($question_validator->fails()){
					throw new Exception("Question can't be saved");
				}
				$question = new Question($question_params);
				
				$question = $quiz->questions()->save($question);
				foreach($input_question['options'] as $value){
					$option_params = array("name" => $value['name'], "is_correct" => array_key_exists("is_correct", $value) ? true : false);
					$option_validator = Option::validate($option_params);	
					if($option_validator->fails()){
						throw new Exception("Option can't be saved");
					}
					$option = new Option($option_params);
					$option = $question->options()->save($option);
				}
			}
			DB::commit();
			return Redirect::to("quizzes/".$quiz->id.'/questions');			
		}catch(Exception $e){
			DB::rollback();
			//throw new Exception($e);
			return Redirect::to('quizzes/'.$quiz->id.'/questions/create');
		}	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($quiz_id, $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($quiz_id, $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($quiz_id, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($quiz_id, $id)
	{
		//
	}

}