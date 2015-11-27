<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Resource Portal</title>
	{{HTML::style('css/bootstrap.css')}}
	{{HTML::style('css/main.css')}}
</head>
<body>
	
		
		{{Form::open(['route' => 'users.store','class' => 'form-horizontal'])}}
		
		
		
<div class="container col-sm-8" style="text-align:center ; ">
  <div class="hero-unit" style="margin-left:0px ; margin-bottom:40px;padding-left:100px">
	<h1>The One stop-resource portal</h1>
	<p class="tagline">Fill in the details and press Sign Up to register and start exploring the website
	to continue</p>
  </div>
  <div class="col-sm-offset-2">
	<hr style="margin-bottom:40px">
  </div>
  <div class=" col-sm-10  col-sm-offset-1" >
		<div class="form-group">
			{{$errors->first('error')}}
		</div>
		 
	  <div class="form-group">
		{{Form::label('username','Username/Email: ',array('class' => 'col-sm-3 control-label'))}}
		<div class="col-sm-8">
			{{Form::input('text','username','',array('class' => 'form-control'))}}
			
	  	</div>
	  	<div class="col-sm-8 col-sm-offset-3">{{{$errors->first('username')}}}</div>
	  </div>

	  <div class="form-group">
		{{Form::label('name','Full name: ',array('class' => 'col-sm-3 control-label'))}}
		<div class="col-sm-8">
			{{Form::input('text','name','',array('class' => 'form-control'))}}		
	  	</div>
	  </div>

	  <div class="form-group">
		{{Form::label('email','Email: ',array('class' => 'col-sm-3 control-label'))}}
		<div class="col-sm-8">
			{{Form::input('text','email','',array('class' => 'form-control'))}}		
	  	</div>
	  </div>

	   <div class="form-group">
		{{Form::label('password','Password: ',array('class' => 'col-sm-3 control-label'))}}
		<div class="col-sm-8">
			{{Form::input('password','password','',array('class' => 'form-control'))}}
			{{$errors->first('password')}}
		</div>
		</div>

		<div class="col-sm-12">
			{{Form::submit('Sign Up',array('class'=> 'btn btn-success col-sm-offset-2'))}}
         	
        </div>
	</div>
</div>
{{Form::close()}}
	
</body>
</html>
