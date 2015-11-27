@extends('layouts.master')
@section('content')
<div class="page-heading">
	Edit Quiz
</div>
<div class="section-content">
	{{Form::model($quiz, ['method' => 'PUT', 'url' => 'resources/'.$resource->id. '/quizzes/'.$quiz->id]) }}
	<div class="form-group">
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title', Input::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description') }}
		{{ Form::textarea('description', Input::old('description'),  array('class' => 'form-control', "cols" => 100, "rows" => 10)) }}
	</div>
	
	<div class="form-group">
		{{ Form::label('no_of_questions', 'No of questions') }}
		{{ Form::text('no_of_questions', Input::old('no_of_questions'),  array('class' => 'form-control')) }}
	</div>
	<button type="submit" class="btn btn-primary">
			<span class="fa fa-pencil-square-o"></span>
			Submit
		</button>
	<a class="btn btn-default" href="{{ URL::to('resources/'.$resource->id.'/quizzes') }}">Cancel</a>

	{{Form::close()}}
</div>
@stop
