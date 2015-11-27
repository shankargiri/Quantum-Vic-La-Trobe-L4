@extends('layouts.master')
@section('content')
<div class="page-heading">
	Add a new post	
</div>
<div class="section-content">
<div class="row">
	<div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
	
	
	<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all(), array('class' => 'text-danger')) }}

	{{ Form::open(array('url' => 'posts')) }}

		<div class="form-group">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('body', 'Body') }}
			{{ Form::textarea('body', Input::old('body'),  array('class' => 'form-control', "cols" => 100, "rows" => 10)) }}
		</div>

		<button type="submit" class="btn btn-primary">
		<span class="fa fa-plus"></span>
			Create
		</button>
		<a class="btn btn-default" href="{{ URL::to('posts/') }}">Cancel</a>

	{{ Form::close() }}
</div>
</div></div>
@stop