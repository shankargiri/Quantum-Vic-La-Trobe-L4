@extends('layouts.master')

@section('content')
<div class="page-heading">
	Edit Tag
</div>
<div class="section-content">
<div class="row">
	<div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
{{ HTML::ul($errors->all(), array('class' => 'text-danger')) }}
{{ Form::model($tag, array('route' => array('tags.update', $tag->id), 'method' => 'PUT')) }}
	
	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description') }}
		{{ Form::textarea('description', Input::old('description'),  array('class' => 'form-control', "cols" => 100, "rows" => 10)) }}
	</div>

	<button type="submit" class="btn btn-primary">
			<span class="fa fa-pencil-square-o"></span>
			Edit Tag
		</button>
	<a class="btn btn-default" href="{{ URL::to('tags/') }}">Cancel</a>

{{ Form::close() }}
</div>
</div>
</div>
@stop