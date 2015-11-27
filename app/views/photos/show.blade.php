@extends('layouts.master')

@section('content')
	
<div class="row" style="margin-top: 30px;">
<div class="col-md-4">

	{{HTML::image($photo->url , $alt=$photo->name, array('width' => 300, 'height' => 200)) }}

	{{ HTML::ul($errors->all(), array('class' => 'text-danger')) }}		

		{{ Form::open(array('url' => 'tagPhoto/'.$photo->id, 'class' => 'tagging-block'))}}
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
			@foreach ($tagged_photo as $tag)
			<div class="tag-wrapper pull-left">
				   	<div data-original-title= '{{$tag->description }}'class="btn btn-default tag_tooltip" data-id='{{$tag->id}}' type="button">
						<a href="<?php echo URL::to('tags/' . $tag->id); ?>" class="tagname" target="_blank">
							{{ $tag->name }}
						</a>
	                </div>
				</div>
			@endforeach
		<div id="tagname"></div>
		</div>
		{{Form::hidden('tag_ids', null, array('class' => 'tag_ids'))}}

		<button type="submit" class="btn btn-success">
			<span class="glyphicon glyphicon-plus"></span>
			Add
		</button>
		<a class="btn btn-default" href="{{ URL::to('tagPhotos/') }}">Cancel</a>
		{{ Form::close() }}

		@include('partials/_autocomplete')
</div>
</div>
@stop




