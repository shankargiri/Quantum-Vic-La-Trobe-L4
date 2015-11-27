@extends('layouts.master')
@section('content')
<div class="page-heading">
	Questions for {{$quiz->title}}
	 <a class="btn btn-default pull-right" href="{{URL::to('resources/'. $quiz->resource_id. '/quizzes')}}">Back</a>
</div>
<div class="section-content">
@foreach($questions as $key => $question)
	<div class="question-wrapp">
		<div class="question-label">
			{{($key+1). ". " .$question->name}} 
		</div>
		@foreach($question->options()->get() as $option)
			<div class="option-item {{($option->is_correct) ? 'text-success' : 'text-danger'}}">
				{{$option->name}} 
			</div>
		@endforeach
	</div>
@endforeach
</div>
@stop