<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Resource Portal</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    	@section('head')
		{{ HTML::style("css/componentResGall.css") }}
        {{ HTML::style("css/style1.css") }}
        {{ HTML::style("css/componentImages.css") }}
        {{ HTML::style("css/resourceResponsive.css")}}
        {{ HTML::style("css/search.css")}} 
        {{ HTML::style("css/bootstrap.min.css")}}
        {{ HTML::style("css/componentMenu.css")}}
        {{ HTML::style("css/main_style.css") }}
    	{{ HTML::style("css/admin_style.css") }}
    	{{ HTML::style("css/userHomeStyle.css") }}
    	{{ HTML::style("css/userHomeResponsive.css ") }}
        {{ HTML::style("css/font-awesome.min.css")}} 
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="../favicon.ico"> 
		{{ HTML::script("js/snap.svg-min.js")}}
		{{ HTML::script("js/modernizr.custom.js")}}
		{{ HTML::script("js/uisearch.js")}}
		@stop
		@yield('head')
</head>
<body>
	<div class="mp-pusher" id="mp-pusher">
	<!-- mp-menu -->
		<nav id="mp-menu" class="mp-menu">
			<div class="mp-level">
                <a href="{{URL::to('/')}}"><h2 class="">{{HTML::image('img/quantum_logo.png') }}</h2></a>
                <a class="mp-back" href="#">back</a>
                 	<ul>
                        <li><a  href="{{ URL::to('resources') }}">Resources</a></li>
                        <li><a href="{{ URL::to('resources') }}">View All Resources</a></li>
                        <li><a href="{{ URL::to('photos') }}">Photos Gallery</a></li>
                        <li><a href="{{ URL::to('addphotos') }}">Add Photos to Resource</a></li>
                        <li><a href="{{ URL::to('photos') }}">Upload Photos</a></li>
                    </ul>
            </div>
		</nav>
	<!-- /mp-menu -->
		<div class="block block-40 ">
			<p>
				<a href="#" id="trigger" class="menu-trigger">Menu</a>
				<a style="font-size:.8em;float:right" href="{{URL::to('logout')}}">Logout</a>
            	<a style="font-size:.8em;float:right;margin-right: 20px" href="{{URL::to('profile')}}">My Profile</a>
			</p>	
		</div>
		
          <div>
            @include('layouts._flashMsg')
            @yield('content')
          </div>
      


	{{ HTML::script("js/classie.js")}}
	{{ HTML::script("js/mlpushmenu.js")}}
	<script>new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );</script>
	
	</div>
</body>
</html>