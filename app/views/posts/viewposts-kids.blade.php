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
                        <a href="{{URL::to('/')}}"><h2 class="">{{HTML::image('img/logoShogo.png', $alt = 'Resource Portal')}}</h2></a>
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
				
		
				<script>
			new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
		</script>
	@foreach($posts as $key => $value)
	<div class="instruction-panel">
		<?php if (Auth::user()->role == 'admin'): ?>
			<div class="panel panel-primary">
    			<div class="panel-heading">
			<a style="color:#FFFFFF" href="{{ URL::to('posts/'.$value->id) }}">{{$value->title}}</a>
			</div>
			</div>
		<?php else: ?>
			<div class="panel panel-danger">
			<div class="panel-heading">
			<a href="{{ URL::to('posts/'.$value->id) }}">{{$value->title}}</a>
			</div>
			</div>
		<?php endif ?>
		
		<div class="panel-body">
			<p>
				<i class="fa fa-clock-o"></i> {{ $value->created_at->format("g:i a F j, Y") }}
			</p>	
			{{ $value->body }} <br>
		
			<h4> Share This</h4>		
			<a target="_blank" href="{{ Share::load(Request::url(), 'check this -> '.$value->title)->twitter() }}" ><i class="fa fa-lg fa-twitter btn btn-sm btn-primary"></i></a>
			<a target="_blank" href="{{ Share::load(Request::url(), 'check this -> '.$value->title)->facebook() }}" ><i class="fa fa-lg fa-facebook btn btn-sm btn-primary"></i></a>
			<a target="_blank" href="{{ Share::load(Request::url(), 'check this -> '.$value->title)->gplus() }}" ><i class="fa fa-lg fa-google-plus btn btn-sm btn-primary"></i></a>
			<a target="_blank" href="{{ Share::load(Request::url(), 'check this -> '.$value->title)->linkedin() }}" ><i class="fa fa-lg fa-linkedin btn btn-sm btn-primary"></i></a>
			<div style="padding-top:10px;"  class="fb-like" data-href={{Request::url()}} data-layout="standard" data-action="like" data-show-faces="true" >
			</div>
		</div>
	</div>
	@endforeach
</body>
</html>
