@extends('layouts.master')
@section('content')
<div class="page-heading">
	Edit Post
</div>
<div class="section-content">
<div class="row">
	<div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all(), array('class' => 'text-danger')) }}

{{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('title', 'Title') }}
		{{ Form::text('title', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('body', 'Body') }}
		{{ Form::textarea('body', null, array('class' => 'form-control')) }}
	</div>

	<button type="submit" class="btn btn-primary">
		<span class="fa fa-pencil-square-o"></span>
		Update
	</button>
	
	<a class="btn btn-default" href="{{ URL::to('posts/') }}">Cancel</a>

{{ Form::close() }}
</div>
</div></div>
@stop