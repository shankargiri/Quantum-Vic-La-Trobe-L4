@extends('layouts.master')
@section('content')
<div class="page-heading">
	Add a new quiz for {{$resource->name}}
</div>
<div class="section-content">
<div class="row">
	<div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">		
		{{ HTML::ul($errors->all(), array('class' => 'text-danger')) }}

	{{ Form::open(array('url' => 'resources/' . $resource->id .'/quizzes')) }}
		<div class="form-group">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('description', 'Description') }}
			{{ Form::textarea('description', Input::old('description'),  array('class' => 'form-control', "cols" => 100, "rows" => 10)) }}
		</div>
		<div class="form-group">
			{{ Form::label('no_of_questions', 'No of questions') }}
			{{ Form::text('no_of_questions', Input::old('no_of_questions'),  array('class' => 'form-control')) }}
		</div>		
		<button type="submit" class="btn btn-success">
			<span class="glyphicon glyphicon-plus"></span>
			Create Quiz
		</button>
		<a class="btn btn-default" href="{{ URL::to('resources/'.$resource->id) }}">Cancel</a>
		{{ Form::close() }}
	</div>
</div>
</div>
@stop