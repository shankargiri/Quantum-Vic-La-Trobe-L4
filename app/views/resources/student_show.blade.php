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
        {{ HTML::style("css/main_style.css") }}
        {{ HTML::style("css/admin_style.css") }}
        {{ HTML::style("css/font-awesome.min.css")}} 
        {{ HTML::script("js/snap.svg-min.js")}}
        {{ HTML::script("js/modernizr.custom.js")}}
        {{ HTML::script("js/uisearch.js")}}
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style type="text/css">
h2{
    margin: 0;     
    color: #666;
    padding-top: 90px;
    font-size: 52px;
    font-family: "trebuchet ms", sans-serif;    
}
.item{
    background: #333;    
    text-align: center;
    height: 300px !important;
}
.carousel{
    margin-top: 20px;
}
.bs-example{
    margin: 20px;
}
</style>
</head>
<body style="background:#D8D8D8">
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

                {{ HTML::script("js/classie.js")}}
                {{ HTML::script("js/mlpushmenu.js")}}
                
        
                <script>new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );</script>

<div id="fb-root"></div>
<div class="page-heading">
    <div class="control-group clearfix">
        <div class="pull-left" style="padding-top: 8px;">
            {{$resource->name}}
        </div>
        <div class="pull-right hidden-print hidden-xs">
        <button class="btn btn-link"><input type="button" value="Print this page" onClick="window.print()"></button>
    </div>
        <div class="pull-right" style="padding-top:8px; margin-right: 10px;">
            <a class="white-link hidden-print" href="{{ URL::to('resources/') }}">Back to Resources</a>
        </div>
    </div>
</div>
<div class="section-content">
<div class="panel-body">
    <div class="form-item">
        {{$resource->description}}     
    </div>

    <div class="form-item">
        <strong>Level: </strong>
        {{$resource->level}}
    </div>

    <div class="form-item">
        <strong>
            Faculty:
        </strong>
            {{$resource->faculty}}
    </div>
    <div class="form-item">
        <a target="_blank" href={{$resource->url}}>{{$resource->url}}</a>
    </div>
        <div class="fb-like hidden-print" data-href={{Request::url()}} data-layout="standard" data-action="like" data-show-faces="true" ></div>
        <div class="form-item hidden-print">
        <h4> Share </h4>        
            <a target="_blank" href="{{ Share::load(Request::url(), 'check this '.$resource->name)->twitter() }}" >
                <i class="fa fa-lg fa-twitter btn btn-sm btn-primary"></i>
            </a>
            <a target="_blank" href="{{ Share::load(Request::url(), 'check this '.$resource->name)->facebook() }}" >
                <i class="fa fa-lg fa-facebook btn btn-sm btn-primary"></i>
            </a>
            <a target="_blank" href="{{ Share::load(Request::url(), 'check this '.$resource->name)->gplus() }}" >
                <i class="fa fa-lg fa-google-plus btn btn-sm btn-primary"></i>
            </a>
            <a target="_blank" href="{{ Share::load(Request::url(), 'check this '.$resource->name)->linkedin() }}" >
                <i class="fa fa-lg fa-linkedin btn btn-sm btn-primary"></i>
            </a>
    </div>
    <div class="photo-container">
        <div class="row">
            @foreach($photos as $photo)
                <img src="{{$photo->url}}">
            @endforeach
        </div>
    </div>
    <div class="number-hits hidden-print">
        Number of hits : <?php echo sizeof($views); ?>
    </div>
    <div class="form-item hidden-print" style="margin-top: 40px;">
        <a class="btn btn-info" href="{{URL::to('resources/' . $resource->id . '/quizzes')}}" style="background: rgb(45, 108, 162); font-size: 25px;">Quizzes</a>
    </div>
    
</div>
   
          
</div>
</div>
</div>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
</body>
