<?php 

class QuizzesController extends \BaseController {

	protected $layout = 'layouts.master';

	public function index($resource_id)
	{
		$resource = Resource::find($resource_id);
		$quizzes  = $resource->quizzes()->get();
		if (Auth::user()->role == 'student') {
			return View::make("quizzes.student_index")->with(array("resource" => $resource, 'quizzes' => $quizzes));
		}else{
			$this->layout->content = View::make('quizzes.index')->with(array('resource' => $resource, 'quizzes' => $quizzes));	
		}
		
	}

	public function create($resource_id)
	{
		$resource = Resource::find($resource_id);
		$this->layout->content = View::make("quizzes.create")->with(array('resource' => $resource));
	}

	public function store($resource_id)
	{
		$resource = Resource::find($resource_id);
		$validator = Quiz::validate(Input::all());
		if($validator->fails()){
			return Redirect::to('resources/'.$resource->id.'/quizzes/create')
							->withErrors($validator)
							->withInput(Input::all());
		}else{		
			$quiz_params = array("title" => Input::get("title"), "description" => Input::get("description"), "user_id" => Auth::user()->ID, 'no_of_questions' => Input::get('no_of_questions'));
			$quiz = new Quiz($quiz_params);
		if($resource->quizzes()->save($quiz))
			return Redirect::to('quizzes/'.$quiz->id.'/questions/create');
		}
	}

	public function show($resource_id, $id)
	{
		$photos  = array();
        $resource = Resource::find($resource_id);        
	}
	public function edit($resource_id, $id)
	{
		$resource = Resource::find($resource_id);
		$quiz = Quiz::find($id);
		return View::make('quizzes.edit', compact('resource', 'quiz'));
	}

	

	public function update($resource_id, $quiz_id)
	{		
		$resource = Resource::find($resource_id);
		$validator = Quiz::validate(Input::all());
		if($validator->fails()){
			return Redirect::to('resources/'.$resource->id.'/quizzes/'.$quiz_id.'/edit')
							->withErrors($validator)
							->withInput(Input::all());
		}else{		
			
			$quiz = $resource->quizzes()->find($quiz_id);
			$quiz->title       = Input::get("title");
			$quiz->description = Input::get('description');
			$quiz->no_of_questions = Input::get('no_of_questions');
			$quiz->save();
			return Redirect::to('resources/'.$resource->id.'/quizzes')->with('success', 'you have succesfully updated the quiz');
		}
	}

	public function destroy($resource_id, $quiz_id)
	{
		try{
			DB::beginTransaction();
			$resource = Resource::find($resource_id);
			$quiz = $resource->quizzes()->find($quiz_id);
			$quiz->delete();
			DB::commit();
			return Redirect::to("resources/".$resource->id.'/quizzes')->with("success", "You have successfully deleted the quiz.");
		}catch(Exception $e){
			//throw new Exception($e);
			DB::rollback();
		}
				
	}

	public function attempt($resource_id, $quiz_id)
	{
		$resource            = Resource::find($resource_id);
		$quiz                = $resource->quizzes()->find($quiz_id);
		$no_of_quiz_attempts = sizeof($quiz->quiz_attempts()->get());
		$questions           = $quiz->questions()->get();
		$this->layout->content = View::make('quizzes.attempt', compact('resource', 'quiz', 'questions','no_of_quiz_attempts'));
	}

	public function previous_attempts($resource_id, $quiz_id)
	{
		$resource        = Resource::find($resource_id);
		$quiz            = $resource->quizzes()->find($quiz_id);
		$quiz_attempts   = $quiz->quiz_attempts()->owned(Auth::user()->ID)->get();
		$this->layout->content = View::make('quizzes.previous_attempts', compact('resource', 'quiz', 'quiz_attempts'));
	}

	public function show_answer($resource_id, $quiz_id, $attempt_id)
	{
		$resource        = Resource::find($resource_id);
		$quiz            = $resource->quizzes()->find($quiz_id);
		$quiz_attempt    = $quiz->quiz_attempts()->owned(Auth::user()->ID)->find($attempt_id);
		$questions       = $quiz->questions()->get();
		$quiz_answers    = $quiz_attempt->answers()->get();
		$this->layout->content = View::make('quizzes.show_answer', compact('resource', 'quiz', 'quiz_attempt', 'questions', 'quiz_answers'));
	}

	public function submit_answer($resource_id, $quiz_id)
	{
		try{
			DB::beginTransaction();
			$resource = Resource::find($resource_id);
			$quiz     = $resource->quizzes()->find($quiz_id);
			$quiz_attempt_params = array("user_id" => Auth::user()->ID);
			$attempt_validator = QuizAttempt::validate($quiz_attempt_params);
			if($attempt_validator->fails()){
				throw new Exception("Your attempt can't be recorded");
			}
			$quiz_attempt = new QuizAttempt($quiz_attempt_params);
			$quiz_attempt = $quiz->quiz_attempts()->save($quiz_attempt);
			
			foreach(Input::get("answers") as $key => $answer){
				foreach($answer['options'] as $option){
					$option_params = array("option_id" => $option, 'question_id' => $answer['question_id']);
					$option_validator = QuizAttemptAnswer::validate($option_params);	
					if($option_validator->fails()){
						throw new Exception("Your answers can't be saved");
					}
					$answer = new QuizAttemptAnswer($option_params);
					$answer = $quiz_attempt->answers()->save($answer);
				}				
			}	
			DB::commit();
			return Redirect::to("resources/".$resource->id.'/quizzes/'. $quiz->id. '/show_answer/'.$quiz_attempt->id)->with("success", "You have successfully completed the quiz."); 						
		}catch(Exception $e){
			DB::rollback();
		}		
	}
}

