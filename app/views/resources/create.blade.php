@extends('layouts.master')
@section('content')
<div class="page-heading">
	Add new resource
</div>
<div class="section-content">
<div class="row">
	<div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">		
		{{ HTML::ul($errors->all(), array('class' => 'text-danger')) }}		
		{{ Form::open(array('url' => 'resources', 'class' => 'tagging-block'))}}

		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('description', 'Description') }}
			{{ Form::textarea('description', Input::old('description'),  array('class' => 'form-control', "cols" => 100, "rows" => 10)) }}
		</div>

		<div class="form-group">
			{{ Form::label('level', 'Level') }}
			{{Form::select('level', getAusLevels(), null, array('class' => 'form-control'))}}
		</div>
	
		<div class="form-group">
			{{ Form::label('faculty', 'Faculty') }}
			{{Form::select('faculty', getFaculties(), null, array('class' => 'form-control'))}}	
		</div>
		
		<div class="form-group">
			{{ Form::label('Url', 'Link for resource') }}
			{{ Form::url('url', Input::old('url'),  array('class' => 'form-control', "cols" => 100, "rows" => 10)) }}
		</div>
		<div class="form-group">
		<h4>Select Devices</h4>
			@foreach(getDevices() as $device)
				{{ Form::checkbox('devices[]', $device) }}
				{{Form::label('phone', $device)}}
				<br>
			@endforeach
		</div>
		<div class="form-group">
			{{ Form::label('tag','Tagname') }}
			{{ Form::text('tagname', null, array('class' => 'form-control tag_inputs')) }}
		</div>

		<div class="tagnames control-group clearfix">

			@foreach ($tags as $tag)
				<?php $resourcetags[] = $tag->name ?>

				<div class="tag-wrapper pull-left">
							
				</div>
			@endforeach
			
		<div id="tagname"></div>
		</div>
		{{Form::hidden('tag_ids', null, array('class' => 'tag_ids'))}}
		<br/>
		<button type="submit" class="btn btn-success">
			<span class="glyphicon glyphicon-plus"></span>
			Add
		</button>
		<a class="btn btn-default" href="{{ URL::to('resources/') }}">Cancel</a>
		{{ Form::close() }}

		@include('partials/_autocomplete')

	</div>
</div>
</div>
@stop