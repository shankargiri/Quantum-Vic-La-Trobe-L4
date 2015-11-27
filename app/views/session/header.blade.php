<!doctype html>
<html lang="en">
<head>
  <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta charset="UTF-8">
  <title>Login</title>
  {{HTML::style('css/bootstrap.css')}}
  {{HTML::style('css/loginStyle.css')}}
  {{HTML::script("js/jquery-1.9.1.min.js")}}
  {{HTML::script("js/bootstrap.min.js")}}
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top"role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{URL::to('/')}}">Online Resource portal</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        
        <li class="active"><a href="{{URL::to('/')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="{{URL::to('contact_us')}}"><span class="glyphicon glyphicon-book"></span> Contact Us</a></li>
      
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>