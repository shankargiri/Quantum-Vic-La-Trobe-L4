<html>
<head>
	<title>Online Resource Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
{{ HTML::style("css/componentResGall.css") }}
        {{ HTML::style("css/style.css") }}
        {{ HTML::style("css/componentImages.css") }}
        {{HTML::style("css/resourceResponsive.css")}}
        {{ HTML::style("css/search.css")}} 
        {{ HTML::style("css/componentMenu.css")}}

        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="../favicon.ico"> 
        {{ HTML::script("js/snap.svg-min.js")}}
        {{ HTML::script("js/modernizr.custom.js")}}
        {{ HTML::script("js/uisearch.js")}}
        <!--  -->
    {{ HTML::style("css/main_style.css") }}
        {{ HTML::style("css/admin_style.css") }}
        {{ HTML::style("css/responsive_style.css") }}
        {{HTML::style("css/bootstrap.min.css")}}
        {{HTML::style("css/bootstrap-theme.min.css")}}
        {{ HTML::style("css/font-awesome.min.css")}} 
        {{ HTML::style("css/jquery.dataTables.css")}}
        {{ HTML::style("css/jquery-ui.css")}}
        {{ HTML::script("js/jquery.min.js")}}
        {{ HTML::script("js/jquery.dataTables.js")}}
        {{HTML::script("js/bootstrap.min.js")}}
        {{ HTML::script("js/custom.js")}}
    {{HTML::style("css/jquery.fileupload.css")}}
    {{HTML::script("js/vendor/jquery.ui.widget.js")}}
    {{HTML::script("js/jquery.iframe-transport.js")}}
    {{HTML::script("js/jquery.fileupload.js")}}
    
    	<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="../favicon.ico"> 
		{{ HTML::script("js/snap.svg-min.js")}}
		{{ HTML::script("js/modernizr.custom.js")}}
		{{ HTML::script("js/uisearch.js")}}
</head>
<body>
	<div class="mp-pusher" id="mp-pusher">
				<!-- mp-menu -->
				<nav id="mp-menu" class="mp-menu">
					  <div class="mp-level">
                        <a href="{{URL::to('/')}}"><h2 class="">Resouce Portal</h2></a>
                        <a class="mp-back" href="#">back</a>
                        <ul>
                            <li >
                                <a  href="{{ URL::to('resources') }}">Resources</a>
                            </li>
                            <li><a href="{{ URL::to('resources') }}">View All Resources</a></li>
                            <li ><a href="{{ URL::to('photos') }}">Photos Gallery</a></li>
                            <li><a href="{{ URL::to('addphotos') }}">Add Photos to Resource</a></li>
                            <li><a href="{{ URL::to('photos') }}">Upload Photos</a></li>
                        </ul>
                            
                    </div>
				</nav>
				<!-- /mp-menu -->
				<div>
				<div class="block block-40 ">
					<p>
						<a href="#" id="trigger" class="menu-trigger">Menu</a>
						<a style="font-size:.8em;float:right" href="{{URL::to('logout')}}">Logout</a>
					</p>	
				</div>

				{{ HTML::script("js/classie.js")}}
				{{ HTML::script("js/mlpushmenu.js")}}
				
		
				<script>
			new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
		</script>

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
			<div class="row">
				@foreach($photos as $photo)
					<div class="col-md-4 col-xs-12 col-sm-6">
						<div class="thumb-wrapp text-center">
							<img src="{{$photo->thumbnailUrl('medium')}}" draggable="true" class="draggable thumbnail img-responsive" ondragstart="drag(event)" id="photo-{{$photo->id}}" data-id="{{$photo->id}}">
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
   var photoId = photoDiv.data("id");
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
</script>
</body>
</html>