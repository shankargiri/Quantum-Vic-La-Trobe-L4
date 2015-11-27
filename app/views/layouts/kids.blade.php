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
		@yield('head')
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
		@yield('content')
	<footer>
            		<p align="center">Copyright &copy; 2014, Team Firebird</p>      
    	</footer>
</body>
</html>