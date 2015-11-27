@extends('layouts.master')
@section('content')
<div class="page-heading">
	Previous attemtps on {{$quiz->title}}
	<a href="{{URL::to('resources/' . $resource->id . '/quizzes/' . $quiz->id . '/attempt')}}" class="btn btn-default pull-right">		Attempt test
	</a>
</div>
<div class="section-content">
	<ul >
		@foreach($quiz_attempts as $attempt)
			<li>
				<?php $created_at = new DateTime($attempt->created_at); ?>
				<a class="btn btn-link" href="{{URL::to('resources/'.$resource->id . '/quizzes/'.$quiz->id. '/show_answer/' .$attempt->id)}}">Attempt at {{$created_at->format('g:ia \o\n l jS F Y')}}</a>
			</li>		
		@endforeach
	</ul>
</div>
@stop
