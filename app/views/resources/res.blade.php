<html>
<head>
	<title>Online Resource Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		{{ HTML::style("css/componentResGall.css") }}
        {{ HTML::style("css/style.css") }}
        {{ HTML::style("css/componentImages.css") }}
        {{HTML::style("css/resourceResponsive.css")}}
        {{ HTML::style("css/search.css")}} 
        {{HTML::style("css/bootstrap.min.css")}}
        {{ HTML::style("css/componentMenu.css")}}

    	<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="../favicon.ico"> 
		
		{{ HTML::script("js/snap.svg-min.js")}}
		{{HTML::script("//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js")}}
		{{ HTML::script("js/modernizr.custom.js")}}
		{{ HTML::script("js/uisearch.js")}}
		{{ HTML::script("js/jquery-searchFilter.js")}}
		{{ HTML::script("js/script.js")}}
		
</head>
<body>
	<div class="mp-pusher" id="mp-pusher">
				<!-- mp-menu -->
				<nav id="mp-menu" class="mp-menu">
					  <div class="mp-level">
					            

                        <a href="{{URL::to('/')}}"><h2 class="">{{HTML::image('img/quantum_logo.png') }}</h2></a>
                        <a class="mp-back" href="#">back</a>
                        <ul>
                            <li >
                                <a  href="{{ URL::to('resources') }}">Resources</a>
                            </li>
                            <li><a href="{{ URL::to('resources') }}">View All Resources</a></li>
                            <li ><a href="{{ URL::to('viewposts') }}">View All Posts</a></li>
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
				
		
				<script>new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );</script>


				<div id="intro" class="row" >
		                <h1 id="title" class="col-md-6">
					<span id="title-line1" class="title-line">Resource</span>
					<span id="title-line3" class="title-line">Gallery</span>
				</h1>
				<div class="col-md-3 search">
				<p>
				Lost???<br/>
				Search here<br/>
				</p>
				<div class="column">
					<div id="sb-search" class="sb-search">
						{{ Form::open(['method' => 'GET']) }}
							
							<input class="sb-search-input" placeholder="Search here..." type="text" value="" name="search" id="txtSearche">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"> 
							{{HTML::image('img/search.png', $alt = 'Search Image', array('class' => 'img responsive'))}}
							</span>
						{{ Form::close() }}
					</div>
				</div>
		
		
		<script>new UISearch( document.getElementById( 'sb-search' ) );</script>
			</div>
			<div class="col-md-3 confused" style="margin:-0.5% auto auto -5%;">
				{{HTML::image('img/searchCartoon.png', $alt = 'Cartoon Image', array('class' => 'img responsive'))}}
			</div>

	</div>


			<section id="grid" class="grid clearfix">
				@if($resources->count())
					@foreach($resources as $key => $resource)
					<?php 
						$id = $resource->id;
						$photo_id = $resource ->def_photo_id;
						if ($photo_id == 0) 
						{
							$photoResId = $resource -> photoIds()->first();
							if (empty($photoResId)) {
								$photoUrl = 'img/8.png';
							}
							else
							{
								$photoId = $photoResId->photo_id;
								$photoUrl = Photo::find($photoId)->url;
							}
							if (empty($photoUrl)) {
								$photoUrl = 'img/8.png';
							}
						}
						else
						{
							$photoUrl = Photo::find($photo_id) ->url;
						}
					?>
						<a href="{{ URL::to('resources/' . $resource->id) }}" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
							<figure>
							
							{{HTML::image($photoUrl, $alt = 'Second image', array('class' => 'img responsive'))}}
								<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
								<figcaption>
									<h2>{{ $resource->name }}</h2>
									<p>{{substr($resource->description,0,50)."....."}}</p>
									
								</figcaption>
							</figure>
						</a>
					@endforeach
				@else
				<p><b><h2>No results for the search were returned</h2></b></p>
				@endif
				
			</section>
			
		<script>
			(function() {
	
				function init() {
					var speed = 330,
						easing = mina.backout;

					[].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-hover' )
							};

						el.addEventListener( 'mouseenter', function() {
							path.animate( { 'path' : pathConfig.to }, speed, easing );
						} );

						el.addEventListener( 'mouseleave', function() {
							path.animate( { 'path' : pathConfig.from }, speed, easing );
						} );
					} );
				}

				init();

			})();
			</script>
			<script type="text/javascript" src="js/TweenMax.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  	<script>window.jQuery || document.write('<script src="js/jquery-1.9\.1.min.js"><\/script>')</script>
  	<script src="js/jquery.lettering-0.6.1.min.js"></script>
	
	<script>
		$(document).ready(function() {
			// set rotation of flash
			TweenMax.set("#newversion", {rotation: 15});

			$('body').css('visibility','visible');

			// hide content until after title animation
			$('#content-wrapper').css('display','none');
			
			// lettering.js to split up letters for animation
			$('#title-line1').lettering();
			$('#title-line2').lettering();
			$('#title-line3').lettering();
			
			// TimelineLite for title animation, then start up superscrollorama when complete
			(new TimelineLite({onComplete:initScrollAnimations}))
				.from( $('#title-line1 span'), .4, {delay: 1, css:{right:'1000px'}, ease:Back.easeOut})
				.from( $('#title-line2'), .4, {css:{top:'1000px',opacity:'0'}, ease:Expo.easeOut})
				.append([
					TweenMax.from( $('#title-line3 .char1'), .25+Math.random(), {css:{top: '-200px', right:'1000px'}, ease:Elastic.easeOut}),
					TweenMax.from( $('#title-line3 .char2'), .25+Math.random(), {css:{top: '300px', right:'1000px'}, ease:Elastic.easeOut}),
					TweenMax.from( $('#title-line3 .char3'), .25+Math.random(), {css:{top: '-400px', right:'1000px'}, ease:Elastic.easeOut}),
					TweenMax.from( $('#title-line3 .char4'), .25+Math.random(), {css:{top: '-200px', left:'1000px'}, ease:Elastic.easeOut}),
					TweenMax.from( $('#title-line3 .char5'), .25+Math.random(), {css:{top: '200px', left:'1000px'}, ease:Elastic.easeOut}),
					TweenMax.from( $('#title-line3 .char6'), .25+Math.random(), {css:{top: '200px', left:'1000px'}, ease:Elastic.easeOut}),
					TweenMax.from( $('#title-line3 .char7'), .25+Math.random(), {css:{top: '-200px', left:'1000px'}, ease:Elastic.easeOut})
				])
				.from("#newversion", .4, {scale: 5, autoAlpha: 0, ease: Elastic.easeOut})
				.to( $('#title-info'), .5, {css:{opacity:.99, 'margin-top':0}, delay:-1, ease:Quad.easeOut});
			
			function initScrollAnimations() {
				$('#content-wrapper').css('display','block');
				var controller = $.superscrollorama();
			
				// title tweens
				$('.title-line span').each(function() {
					controller.addTween(10, TweenMax.to(this, .5, {css:{top: Math.random()*-200-600, left: (Math.random()*1000)-500, rotation:Math.random()*720-360, 'font-size': Math.random()*300+150}, ease:Quad.easeOut}),200);
				});
				controller.addTween(10, TweenMax.to($('#title-line1'), .75, {css:{top: 600}, ease:Quad.easeOut}),200);
				controller.addTween(10, TweenMax.to($('#title-line2'), .75, {css:{top: 200}, ease:Quad.easeOut}),200);
				controller.addTween(10, TweenMax.to($('#title-line3'), .75, {css:{top: -100}, ease:Quad.easeOut},200));
				
			}
		});
	
		</script>
			</div><!-- /pusher -->
	
		
</body>
</html>
