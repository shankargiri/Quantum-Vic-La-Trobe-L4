@extends('layouts.master')

@section('content')
<div class="page-heading">
	Tag Photo
</div>
<style>
	.right-content{border: none;}
	table th{text-align: center;background: rgba(119, 119, 134, 0.14);}	
	tbody{text-align: center;}
</style>
<div class="section-content">
	<div class="row">
		@foreach($photos as $photo)
			<div class="col-md-4 col-sm-6">
				{{HTML::image($photo->url , $alt=$photo->name, array('class' => 'img-responsive')) }} 
				<div>
					<a href="{{ URL::to('photos/'.$photo->id) }}">Tag this photo</a>
				</div>
				<?php $photoTags = $photo->tags()->get(); ?>
				<?php if(sizeof($photoTags) > 0): ?>
					<div class="control-group clearfix">
					<div class="pull-left">
						<strong>Existing tags </strong> :
					</div>
					<div class="clearfix"></div>
					@foreach($photoTags as $tag)
						<div class="tag-wrapper pull-left">
						   	<div data-original-title= '{{$tag->description }}'class="btn btn-default tag_tooltip" data-id='{{$tag->id}}' type="button">
								<a href="<?php echo URL::to('tags/' . $tag->id); ?>" class="tagname" target="_blank">
									{{ $tag->name }}
								</a>
			                </div>			              
						</div>					
					@endforeach
					</div>
				<?php endif ?>				
			</div>
		@endforeach
	</div>
</div>
@stop




