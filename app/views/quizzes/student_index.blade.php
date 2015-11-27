@extends('layouts.master')
@section('content')
<div class="page-heading">
	Quizes for {{$resource->name}}
	<a class="btn btn-default pull-right" href="{{URL::to('resources/'. $resource->id)}}">Back</a>
</div>
<div class="section-content">
	<div class="row">
		@foreach($quizzes as $quiz)
			<?php if (sizeof($quiz->questions()->get()) > 0): ?>				
			<div class="col-md-4 col-sm-6">
				<div class="quiz-attempt-wrapp">
					<div class="quiz-title">
						{{$quiz->title}}
					</div>
					<div class="quiz-desc-wrapp">
						<div class="quiz-desc">
							{{$quiz->description}}
						</div>
					
						<div class="no-questions">
							no of questions : {{$quiz->no_of_questions}}<br>
							<a href="{{URL::to('resources/' . $resource->id . '/quizzes/' . $quiz->id . '/attempt')}}" class="btn btn-primary">Attempt</a>
						</div>
					</div>
				</div>
			</div>
			<?php endif ?>
		@endforeach
	</div>
</div>
@stop