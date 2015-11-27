@extends('layouts.master')
@section('content')
<div class="page-heading">
	Add New Tag
</div>
<div class="section-content">
<div class="row">
	<div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">		
		{{ HTML::ul($errors->all(), array('class' => 'text-danger')) }}

	{{ Form::open(array('url' => 'tags')) }}
		<div class="form-group">
			{{ Form::label('name', 'Title') }}
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('description', 'Description') }}
			{{ Form::textarea('description', Input::old('description'),  array('class' => 'form-control', "cols" => 100, "rows" => 10)) }}
		</div>
		<button type="submit" class="btn btn-success">
			<span class="glyphicon glyphicon-plus"></span>
			Create Tag
		</button>
		<a class="btn btn-default" href="{{ URL::to('tags/') }}">Cancel</a>
		{{ Form::close() }}
	</div>
</div>
</div>
@stop