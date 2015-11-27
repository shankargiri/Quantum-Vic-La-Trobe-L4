<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	{{HTML::style('css/bootstrap.css')}}
	{{HTML::style('css/main.css')}}
</head>
<body>
	
		
		{{Form::open(['route' => 'session.store','class' => 'form-horizontal'])}}
		
		
		
<div class="container col-sm-8" style="text-align:center ; ">
  <div class="hero-unit" style="margin-left:0px ; margin-bottom:40px;padding-left:80px">
	<h1>Welcome to resource portal</h1>
	<p class="tagline">Thanks for visiting our website. You can either login or register 
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
		{{Form::label('password','Password: ',array('class' => 'col-sm-3 control-label'))}}
		<div class="col-sm-8">
			{{Form::input('password','password','',array('class' => 'form-control'))}}
			{{$errors->first('password')}}
		</div>
		</div>
		<div class="col-sm-12">
			{{Form::submit('Login',array('class'=> 'btn btn-primary col-sm-offset-2'))}}
         	<a href="users/create" role="button" data-toggle="modal" class="col-sm-offset-4 btn btn-info">Register</a>
        </div>
	</div>
</div>
{{Form::close()}}
	
</body>
</html>
