<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Resource Portal</title>
  <!-- Force latest IE rendering engine or ChromeFrame if installed -->
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      @section('head')
        {{ HTML::style("css/main_style.css") }}
        {{ HTML::style("css/admin_style.css") }}
        {{ HTML::style("css/responsive_style.css") }}
        {{ HTML::style("css/bootstrap.min.css")}}
        {{ HTML::style("css/bootstrap-theme.min.css")}}
        {{ HTML::style("css/font-awesome.min.css")}} 
        {{ HTML::style("css/jquery.dataTables.css")}}
        {{ HTML::style("css/jquery-ui.css")}}
        {{ HTML::script("js/jquery.min.js")}}
        {{ HTML::script("js/jquery.dataTables.js")}}
        {{ HTML::script("js/bootstrap.min.js")}}
        {{ HTML::script("js/custom.js")}}
      @stop
      @yield('head')
</head>
<body>
<div id="container">
  <div class="top-banner hidden-xs">
    <a class="navbar-brand logo" href="{{URL::to('/')}}"> {{HTML::image('img/quantum_logo.png', $alt = "logo", array("class" => "logo-img", "width" => 81)) }} </a>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{URL::to('profile')}}"><i class="fa fa-cog"></i> My Profile</a></li>
            <li><a href="{{URL::to('logout')}}"><i class="fa fa-power-off"></i>  Logout</a></li>
          </ul>
        </li>        
      </ul>
  </div>
  <div id="main-content">
    <div class="top-pad hidden-xs"></div>
    <div class="row" style="margin-left:0px;margin-right:0px;">
      <div class="col-md-2 col-sm-3 padding-zero">
        <div class="sidebar-nav" id="sidebar-nav">
          <div class="navbar" role="navigation" id="navbar">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <span class="visible-xs navbar-brand">

    <a href="{{URL::to('/')}}"> {{HTML::image('img/quantum_logo.png', $alt = "logo", array("class" => "logo-img", "width" => 81))}} </a></span>
            </div>
            <div class="navbar-collapse collapse sidebar-navbar-collapse">
              <ul class="nav navbar-nav" style="background:#f8f8f8;">
              <?php if (Auth::user()->role == 'admin'): ?>
                      @include("layouts.admin_header")
            <?php else: ?>
                      @include("layouts.teacher_header")
            <?php endif ?>
                            
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>
      <div class="col-md-10 col-sm-9 padding-zero">
          <div class="right-content">
            @include('layouts._flashMsg')
            @yield('content')
          </div>
      </div>
    </div> 
  
    <footer>
            <p align="center">Copyright &copy; 2014, Team Firebird</p>      
    </footer>
  </div>
</div>
</body>
</html>