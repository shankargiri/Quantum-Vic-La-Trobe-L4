
@include('session.header')

	<div class="container">
	     <div class="row">
	     	<div class="container" style="margin-top:50px">
	     		@include('flash::message')
	     	</div>
	        <div class="green-full-width Sign In">   
	            <div class="content-body" style="padding:90px 20px 50px;margin-top:-20px">
	            	{{Form::open(['route' => 'session.store','class' => 'form-horizontal'])}}
		            	<p class="form-row form-row-wide">
		                    {{Form::label('username','Username ')}}
		                    {{Form::input('text','username','',array('class' => 'form-control username'))}}
		                </p>
		                <p class="form-row form-row-wide">
		                    {{Form::label('password','Password ')}}

		                    {{Form::input('password','password','',array('class' => 'form-control password'))}}
		                </p>
		                <p class="form-row login_form">
		                	<button type="submit" class="btn btn-danger login">Log In</button>
		                	
		                </p>
	                 {{Form::close()}}
	            </div>
	        </div>
	     </div>
	</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-4">
			<h3 style="color:#A70000">Student Program</h3>
				<p>
					At Quantum Victoria we believe that all children can excel in STEM disciplines, including computer science, which they will need to work in the multi-disciplinary
				</p>
		</div>

		<div class="col-sm-12 col-md-4">
			<h3  style="color:#A70000">Student Showcase</h3>
          <div style="height:;">
          	<p>
          		The current works of students involved in our programs will be highlighted - Check regularly for photo's, video's, games and other examples of amazing work being produced
          	</p>
          </div>
		</div>

		<div class="col-sm-12 col-md-4">
			<h3 style="color:#A70000">Teacher Development</h3>
              <div style="height:140px;">
              		<p>
              			New and innovative forms of teacher professional development are the cornerstone to building teacher capacity in the 21st century. To excite the next generation
              		</p>
              </div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
	    <div class="col-sm-12 md-col-md-8 col-md-offset-4">
	        Copyright &copy; 2014  <a href="http://quantumvictoria.vic.edu.au">Quantum Victoria</a>. All Rights Reserved.
	        QV Resource portal is designed efficiently for easy access	        
	    </div>
	</div>
</div>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery.ui.shake.js"></script>
	<script>
			$(document).ready(function() {
			$(".username").keyup(function{
				var usn= $(".username").val();
				console.log(usn);
			});
			$('#login').click(function()
			{
			var username=$(".username").val();
			var password=$(".password").val();
		    var dataString = 'username='+username+'&password='+password;
			if($.trim(username).length>0 && $.trim(password).length>0)
			{
			
 
			$.ajax({
            type: "POST",
            url: "ajaxLogin.php",
            data: dataString,
            cache: false,
            beforeSend: function(){ $("#login").val('Connecting...');},
            success: function(data){
            if(data)
            {
            $("body").load("home.php").hide().fadeIn(1500).delay(6000);
            }
            else
            {
             $('#box').shake();
			 $("#login").val('Login')
			 $("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
            }
            }
            });
			
			}
			return false;
			});
			
				
			});
		</script>
</body>
</html>