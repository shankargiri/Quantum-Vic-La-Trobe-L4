@extends('layouts.master')
@section('content')
 {{HTML::script("js/jquery-ui-1.11.1.js")}}
 {{HTML::style("css/jquery-ui-1.11.1.css")}}
<div class="row">
	<div class="col-md-12">
		<div class="page-heading">
			Add photos to resource gallery
		</div>
		<div class="section-content">
		<div class="instruction-panel">
			<ul class="instructions">
				<?php if(sizeof($photos) == 0): ?>
					<li>Add some photos into your gallery by clicking <a href="{{URL::to('photos')}}">here</a></li>
				<?php endif ?>
				<li>Search relevant resources and pictures at search box</li>
				<li>Select pictures and then drag & drop those pictures into relevant resources</li>
				<div class="visible-sm visible xs">
					<li>Please scroll on left panel as scrolling won't work on right panel </li>	
				</div>
				<li>Your pictures will appear in the resource after admin's approval</li>
			</ul>
		</div>
		</div>
	</div>
</div>
<div class="section-content">
<div class="resource-photo-wrapp">
	<div class="row">
		<div class="col-md-6 col-xs-6 vertical-separator">
		<div class="search-wrapp">
			<input type="text" name="searchResrc" class="form-control" id="search-rescr" placeholder="Search resources">
		</div>
			<div class="row">
				@foreach($resources as $resource)
					<div id ="resrc" data-keyword="{{$resource->name}}" class="col-md-6 col-xs-12">
        				<a href="{{URL::to('resources/'.$resource->id)}}">
            	    		<div class="jumbotron block-item" ondrop="drop(event)" ondragover="allowDrop(event)" data-id="{{$resource->id}}" id="resource-{{$resource->id}}">
            	    			<?php 
            	    				$resourcePhotos = $resource->photos()->get();
            	    				$photoIds = array(); 
            	    				foreach($resourcePhotos as $photo){
            	    					$photoIds[] = $photo->id;
            	    				}

            	    			?>

            	    			<input type="hidden" value="{{implode(',', $photoIds)}}" id="photos-{{$resource->id}}" class="photo_ids">
            	        		<i class="fa fa-thumb-tack fa-2x"></i>
            	        		<div class="description">
            	        			{{$resource->name}}
            	        		</div>
            	    		</div>
            			</a>
					</div>
				@endforeach
			</div>	
		</div>
		<div class="col-md-6 col-xs-6">
			<div class="search-wrapp">
				<input type="text" class="form-control col-md-6" id="search-photo" placeholder="Search pictures">
			</div>
			<div class="row" id="all-photos">
				@foreach($photos as $photo)
					<div class="col-md-4 col-xs-12 col-sm-6">
						<div class="thumb-wrapp text-center">
							<img src="{{$photo->thumbnailUrl('medium')}}" draggable="true" ondragstart="drag(event)" class="draggable thumbnail img-responsive"  id="photo-{{$photo->id}}" data-id="{{$photo->id}}">
							<div class="caption-image">
								<small>
									<a href="{{$photo->url}}">Full image</a>
								</small>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
</div>
<script>
function makePhotosSelectable() {
	$target = $('.thumb-wrapp');
    $target.click(function(e) {
    	$(this).toggleClass('active');
    });
}
function clearSelectedPhoto()
{
	$(".thumb-wrapp").removeClass("active");
}

function makePhotosDraggable() {
  $("#all-photos .thumb-wrapp").draggable({
   appendTo: "body",
    helper: function() {
      var selectedPhotos = $("#all-photos .thumb-wrapp.active");
      var left = 0, top = 0;
      var html = $('<div class="multi-photo-drag-wrapper" style="width:160px 160px;"></div>')
      for(var i=0; i < selectedPhotos.length; i++) {
        html.append($(selectedPhotos[i]).clone());
        if(i > 2) {
          $(html).find(".thumb-wrapp:last").hide();
        } else {
          $(html).find(".thumb-wrapp:last").css("left", left).css("top", top);
          left -= 10;
          top -= 10;
        }
      }
      if(selectedPhotos.length > 1) {
        $(html).find(".thumb-wrapp .inner h3").html(selectedPhotos.length + " photos");
      }
      return html;
    },
    start: function(e, ui) {
      clearSelectedPhoto();
    },
    containment: '#content'
  });
}
makePhotosSelectable();
//makePhotosDraggable();


$('#search-rescr').keyup(function(e)
{
		e.preventDefault();
		var current_query = $(this).val();
		if(current_query == "")
		{
			$(".vertical-separator #resrc").fadeIn();	
		}
		$(".vertical-separator #resrc").hide();
		$(".vertical-separator #resrc").each(function(){
			var current_keyword = $(this).attr("data-keyword");
			if(current_keyword.toLowerCase().indexOf(current_query) >= 0)
			{
				$(this).fadeIn();
			}
		});
	
		
});
function allowDrop(ev)
{
	ev.preventDefault();
	ev.dataTransfer.effectAllowed = 'copy';
}

function drag(ev)
{
	ev.dataTransfer.effectAllowed = 'copy';
    ev.dataTransfer.setData("Text", ev.target.id);
}

function drop(ev)
{
   ev.preventDefault();
   var data = ev.dataTransfer.getData("Text");
   var photoDiv = $("#"+data);
   var resourceDiv = $("#"+ev.target.id);
   var photoId = photoDiv.data("id").toString();
   var existingIds = resourceDiv.find(".photo_ids").val().split(",")
   if(existingIds.indexOf(photoId) != -1 )
   {
   	alert("This photo is already dragged into this resource");
   }
   else
   {
   		existingIds.push(photoId);
   		resourceDiv.find(".photo_ids").val(existingIds.join(","));
		var resourceId = resourceDiv.data("id");
   		if(resourceId != null && photoId != null){
   			$.ajax({
   				url: document.URL,
   				data: 'photo_id=' + photoId + '&resource_id=' + resourceId,
   				success:function(res){
   					alert("Successfully droped photos in that resource");
   				}
   			});
   		}
   	}
}
</script>
@stop