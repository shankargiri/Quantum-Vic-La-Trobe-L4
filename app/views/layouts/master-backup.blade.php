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
        
 
      @stop
      
      @yield('head')

</head>

<body>
    @section('header')
        @include('layouts.header')        
    @show
    <div class="container">
        <div id="content-wrapp">
            <div class="row">
                @include('layouts._flashMsg')
            </div>
            @yield('content')
        </div>
    </div>
    <footer>
        <p align="center">Copyright &copy; 2014, Team Firebird</p>
        
    </footer>
    </body>
</html>