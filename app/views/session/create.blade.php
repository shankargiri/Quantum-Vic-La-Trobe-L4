<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/loginPageStyle.css">
<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript">
	$(function(){
		
		$(".gridLogin").click(function(){
			$(this).effect("highlight","slow");
			$(".loginForm").hide();
			$(".contactForm").css("visibility","hidden");
			$(".loginForm").css("visibility","visible");
			$(".loginForm").slideDown(800);
		});
		$(".gridContact").click(function(){
			$(this).effect("highlight","slow");
			$(".contactForm").hide();
			$(".loginForm").fadeOut();
			$(".loginForm").css("visibility","hidden");
			$(".contactForm").css("visibility","visible");
			$(".contactForm").slideDown(800);

		});
	});

	</script>
</head>
<body>
	<div class="row logo">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 quantum">RESOURCE PORTAL</div>
		
	</div>
	
	<div  style="text-align:center; width:100%; margin-bottom:-20px">
		@include('flash::message')
	</div>
<div class="row grids">
	<div class="col-md-2">
		<div class="sticky-container">
			<ul class="sticky">
				
				<li>
					<p>Facebook
					{{HTML::image('img/fb1.png','facebook')}}
					</p>
				</li>
				<li>
					<p>Twitter
					{{HTML::image('img/tw1.png','twitter')}}
					</p>
				</li>
				<li>
					<p>Google+
					{{HTML::image('img/g1.png','google+')}}
					</p>
				</li>
				<li>
					<p>Linkedin
					{{HTML::image('img/li1.png','linked')}}
					</p>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-md-10 contain">
		<div class="col-lg-6 col-md-6 col-sm-12">
			<div class="gridLogin col-md-5 col-sm-4 col-xs-11">
				<img src="img/users.png">
				<p class="descp"><b>Login</b></p>
			</div>
			<div class="col-lg-6 col-md-7 col-sm-6 col-xs-12 loginForm">
				<div class="account-wall">
	                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
	                    alt="">
	                {{Form::open(['route' => 'session.store','class' => 'form-signin'])}}
	                {{Form::input('text','username','',array('class' => 'form-control','placeholder' => 'username','required'))}}
	                {{Form::input('password','password','',array('class' => 'form-control','placeholder' => 'password', 'required'))}}
	                <button class="btn btn-lg btn-success " type="submit">Login</button>
	                    <a style="float:right" href="{{URL::to('login/fb')}}">{{HTML::image('img/fb.png','fb Login',['style' => 'height:47px; width:90px'])}}</a>
	                {{Form::close()}}
	            </div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 col-sm-12 contact">
			<div class="col-lg-6 col-md-7 col-sm-6 col-xs-12 contactForm">
				<div class="account-wall">
	                <img class="contact-img" src="img/contact.png" alt="Contact Form">
	                <form class="form-signin">
	                <input type="email" class="form-control" placeholder="Email" required autofocus>
	                <textarea style="resize:none" class="form-control" placeholder="Your message here" required></textarea>
	                <button class="btn btn-lg btn-success btn-block" type="submit">
	                    Send</button>
	                </form>
	            </div>
			</div>
			<div class="gridContact col-md-5 col-sm-4 col-xs-11">
				<img src="img/contact.png">
				<p class="descp"><b>Contact</b></p>
			</div>
			
		</div>
	</div>
</div>
	<div class="row siteInfo">
		
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
	            <h3 style="color:#A70000">Student Program</h3>
	            <div style="min-height:80px; margin-bottom:18px"><p>At Quantum Victoria we believe that all children can excel in STEM disciplines, including computer science, which they will need to work in the multi-disciplinary...</p></div>
	            <p><a href="#" title="" class="buttn" >Read More</a></p>
          	</div>	

          	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
              <h3>Student Showcase</h3>
              <div style="min-height:80px; margin-bottom:18px"><p>The current works of students involved in our programs will be highlighted - Check regularly for photo's, video's, games and other examples of amazing work being produced...</p></div>
              <p><a href="#" title="" class="buttn" >Read More</a></p>
          	</div>

         	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 info">
              <h3 style="color:#A70000">Teacher Development</h3>
              <div style="min-height:80px; margin-bottom:18px"><p>New and innovative forms of teacher professional development are the cornerstone to building teacher capacity in the 21st century. To excite the next generation...</p></div>
              <p><a href="#" title="" class="buttn" >Read More</a></p>
          	</div>
	</div>
	<div class="row footer">
		<p>This website is maintained by <img style="height:120px; width:180px" src="img/quantum.svg"><span> All rights Reserved.</span></p>
	</div>
	
</body>
</html>