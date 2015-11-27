@extends('layouts.master')
@section('content')
<div class="page-heading">
	<?php $created_at = new DateTime($quiz_attempt->created_at); ?>
	Your Answers for {{$quiz->title}} attempted at {{$created_at->format('g:ia \o\n l jS F Y')}}
	<a href="{{URL::to('resources/'.$resource->id.'/quizzes/'.$quiz->id.'/previous_attempts')}}" class="btn btn-default pull-right">
		All Attempts
	</a>	
</div>
<div class="section-content">

<?php 
$answers = array();
foreach($quiz_answers as $answer){
	$answers[$answer->question_id][] = $answer->option_id;
}
?>
@foreach($questions as $key => $question)
	<div class="question-wrapp">
		<div class="question-label">
			{{($key+1). ". " .$question->name}} 
		</div>
		<?php $answer = $answers[$question->id]; ?>
		@foreach($question->options()->get() as $option)
			<?php 

			if ($option->is_correct):
				$option_class = 'text-success';
			else:
				$option_class = in_array($option->id, $answer) ? 'text-danger' : '';
			endif;

			 ?>
			
			<div class="option-item {{$option_class}}">
				{{$option->name}}
			</div>
		@endforeach
	</div>
@endforeach
</div>
@stop