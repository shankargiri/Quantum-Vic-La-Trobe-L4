@extends('layouts.master')
@section('content')
<div class="page-heading">
	Edit Resource
</div>
<div class="section-content">
<div class="row">
	<div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all(), array('class' => 'text-danger')) }}	

{{ Form::model($resource, array('route' => array('resources.update', $resource->id), 'method' => 'PUT', 'class' => 'tagging-block')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description') }}
		{{ Form::textarea('description', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('level', 'Level') }}
		{{Form::select('level', getAusLevels(), null, array('class' => 'form-control'))}}
	</div>
	
	<div class="form-group">
		{{ Form::label('faculty', 'Faculty') }}
		{{Form::select('faculty', getFaculties(), null, array('class' => 'form-checkedrol'))}}	
	</div>
	<div class="form-group">
		{{ Form::label('Url', 'Link for resource') }}
		{{ Form::url('url', Input::old('url'),  array('class' => 'form-control', "cols" => 100, "rows" => 10)) }}
	</div>
	<div class="form-group">
		<h4>Select Devices</h4>
			<?php $existingDevice = array(); ?>
			@foreach($resourceDevice as $resource_device)
				<? $existingDevice[] = $resource_device->device_type; ?>
			@endforeach
			@foreach(getDevices() as $device)
				<?php $checked = in_array($device, $existingDevice) ? "checked" : "" ?>
				<input type="checkbox" name="device[]" id="{{$device}}" value="{{$device}}", {{$checked}}>
				{{Form::label($device)}}
				<br>
			@endforeach
		</div>
	<div class="form-group tag_input_field">
		{{ Form::label('tag','Tagname') }}
		{{ Form::text('tagname', null, array('class' => 'form-control tag_inputs')) }}
	</div>
		<div class="control-group clearfix tagnames">
			<?php $resourceTagIds = array(); ?>
			@foreach ($resourcetags as $tag)
				<?php $resourceTagIds[] = $tag->id; ?>
				<div class="tag-wrapper pull-left">
				   	<div data-original-title= '{{$tag->description }}'class="btn btn-default tag_tooltip" data-id='{{$tag->id}}' type="button">
						<a href="<?php echo URL::to('tags/' . $tag->id); ?>" class="tagname" target="_blank">
							{{ $tag->name }}
						</a>
						<i class='fa fa-times cancel'></i>
	                </div>
				</div>
			@endforeach
			{{Form::hidden('tag_ids', $value = implode(",", $resourceTagIds), array('class' => 'tag_ids'))}}
				
		</div>
	<br/>
	<button type="submit" class="btn btn-primary submit_button">
		<span class="fa fa-pencil-square-o"></span>
		Update
	</button>
	
	<a class="btn btn-default" href="{{ URL::to('resources/') }}">Cancel</a>

{{ Form::close() }}


@include('partials/._autocomplete')

</div>
</div>
 </div>
@stop




