<head>
	<title>
		Work
	</title>
	{{HTML::style('css/bootstrap.css')}}
	{{HTML::style('css/main.css')}}
	{{HTML::style('css/styleWebsite2.css')}}
</head>
<body>
	<div class="container">
		<div>
			<div class="row headerr">
				<div class="col-sm-6 logo"></div>
				<div class="col-sm-5 col-sm-offset-1 menu">
					<nav>
						<ul class="nav nav-tabs">
							<li class=""><a href="{{URL::to('/')}}">Home</a></li>
							<li class=""><a href="{{URL::to('contac_us')}}">Contact</a></li>
							<li class=""><a href="#">Our Services</a></li>
							<li class=""><a href="#">About Us</a></li>
							<li class=""><a href="#">Gallery</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 img1">	</div>
			<div class="col-sm-6 img2"></div>
		</div>


		<div>
			<form role="form" class="form-inline">
				<div class="row">
					<div class="form-group col-sm-12" style="text-align:center">
						<label class="" for="email"><h1>You are logged in the website</h1></label>
						
					</div>
				</div>
				<div style="text-align:center">
				<a href="logout" role="button" class="btn btn-danger">Log Out</a>
				</div>
			</form>
		</div>
		</div>
		</body>
