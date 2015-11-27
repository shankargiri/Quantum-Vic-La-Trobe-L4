<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/componentMenu.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/userHomeStyle.css">
    <link rel="stylesheet" type="text/css" href="css/userHomeResponsive.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
    <script type='text/javascript' src='js/jquery-1.5.2.js'></script>
    
    <script type='text/javascript' src='js/jquery.easing.1.2.js'></script>
    <script type='text/javascript' src='js/jquery.circulate.js'></script>
    <script type='text/javascript' src='js/example.js'></script>
    <script src="js/modernizr.custom.js"></script>
</head>
<body>
    <div class="mp-pusher" id="mp-pusher">
                <!-- mp-menu -->
                <nav id="mp-menu" class="mp-menu">
                    <div class="mp-level">
                        <div class="dash" style="background-color:#FFF; height:150px; width:250px;" >
                        <a  href="{{URL::to('/')}}"><h2 class="">{{HTML::image('img/quantum_logo.png') }}</h2></a>
                        </div>
                        <a class="mp-back" href="#">back</a>
                        <ul>
                            <li >
                                <a  href="{{ URL::to('resources') }}">Resources</a>
                            </li>
                            <li><a href="{{ URL::to('resources') }}">View All Resources</a></li>
                            <li ><a href="{{ URL::to('photos') }}">Photos Gallery</a></li>
                            <li><a href="{{ URL::to('addphotos') }}">Add Photos to Resource</a></li>
                            <li><a href="{{ URL::to('photos') }}">Upload Photos</a></li>
                        </ul>
                            
                    </div>
                </nav>
                <!-- /mp-menu -->
                <div class="block block-40 ">
                    <p>
                         <a href="#" id="trigger" class="menu-trigger">Menu</a><!--<span>Welcome <?php echo Session::get('username'); ?></span>  -->
                        <a style="font-size:.8em;float:right" href="{{URL::to('logout')}}">Logout</a>
                    </p>    
                </div>
            
    
        <script src="js/classie.js"></script>
        <script src="js/mlpushmenu.js"></script>
        <script>
            new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
        </script>
<div class="page1 row">
        <div class="col-md-1"></div>
        <div class="col-md-11 globe">
            <div class="col-md-6 links">
                <ul class="list-unstyled">
                    <li>
                        <div class=" col-md-12 col-sm-7 para"> Few Of the Features the Portal Provides</div>
                    </li>
                    <li>
                        <div class="col-md-12 col-sm-7">
                            <a href="{{ URL::to('resources') }}">
                                <div class="jumbo block-item">
                                    <div align="center" class="description">
                                        <img src="img/res-icon.png">View Resources
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div  class="fb-like"
                          data-share="true"
                          data-width="450"
                          data-show-faces="true">
                        </div>
                    </li>
                    <li>
                        <div class="col-md-12 col-sm-7">
                            <a href="{{ URL::to('photos') }}">
                                <div class="jumbo block-item">
                                    <div class="description">
                                        <img src="img/gall1-icon.png">Photo Gallery
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-12 col-sm-7">
                            <a href="{{ URL::to('addphotos') }}">
                                <div class="jumbo block-item">
                                    <div class="description">
                                        <img src="img/image-add-icon.png">Add Photos To Resources
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="col-md-12 col-sm-7">
                            <a href="{{URL::to('viewposts')}}">
                                <div class="jumbo block-item">
                                    <div class="description">
                                        <img src="img/post-icon.png">Checkout New Posts
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row newsUpdates">
        
        <div class="col-sm-4 latestNews">
            <h1><b>LATEST RESOURCES</b></h1>
            <ul>    
                @foreach($latestRes as $key => $latResource)
                <hr/>
                <li>
                    <div class="date">
                        <?php $createDate =  $latResource->created_at;
                            $date = date_create($createDate);
                            echo date_format($date,'M');
                        ?>
                        <br/>
                        <span>
                            <?php 
                                echo date_format($date,'d');
                            ?>
                        </span>
                    </div>
                    <div><h4>{{$latResource->name}}</h4>
                    <p>{{substr($latResource->description,0,70)."....."}}</p></div>
                </li>
                @endforeach
                
            </ul>
            <div class="row more">
                    <a href="#">Read More</a>
            </div>
        </div>
        <div class="col-sm-3 latestNews">
            <h1><b>COMING SOON</b></h1>
            <ul>    
                @foreach($comingSoon as $key => $comingSoon)
                <hr/>
                <li>
                    
                    <div><h4>{{$comingSoon->name}}</h4>
                    <p>{{substr($comingSoon->description,0,50)."....."}}</p></div>
                </li>
                @endforeach<hr/>
                
                <?php
                    if(empty($comingSoon))
                    {
                       echo "<h2 style='color:green'>"."Keep Checking for latest Info"."</h2>";
                    }
                ?>
            </ul>
            <div class="row more">
                    <a href="#">Read More</a>
            </div>
        </div>
        <div class="col-sm-4 latestNews">
            <h1><b>LATEST NEWS</b></h1>
            <ul>    
                @foreach($latestPosts as $key => $latPosts)
                <hr/>
                <li>
                    <div class="date">
                        <?php $createDate = $latPosts->created_at;
                            $date = date_create($createDate);
                            echo date_format($date,'M');
                        ?>
                        <br/>
                        <span>
                            <?php 
                                echo date_format($date,'d');
                            ?>
                        </span>
                    </div>
                    <div><h4>{{$latPosts->title}}</h4>
                    <p>{{substr($latPosts->body,0,70)."....."}}</p></div>
                </li>
                @endforeach
                
            </ul>
            <div class="row more">
                    <a href="#">Read More</a>
            </div>
        </div>
    </div>
    <div class="row footer">
    <div class="row margin"></div>
    <div class="row">
        <div class="col-md-4 game">
            Getting Bored????<br/> Lets Play with circles<br> Click On a circle to start
        </div>    

            <div align="center" class="col-md-4 balls top-demo group">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div class="hideInMobile"></div>
                <div class="hideInMobile mobSecond"></div>
                <div class="hidethem"></div>
                <div class="hidethem second"></div> 
            </div>
        
        <div class="col-md-4 share">
            <div class="row social">
                Find us on social media
            </div>
            <div class="row socialLinks">
                <ul class="list-unstyled" style="">
                    <li><a href="https://www.facebook.com/qv.online"><img src="img/fb-icon.png"></a></li>
                    <li><a href="http://twitter.com"><img src="img/twitter_icon.png"></a></li>
                    <li><a href="http://linkedin.com"><img src="img/in-icon.png"></a></li>
                </ul>
                
            </div>
        </div>
    </div>
    
</div>
     </div><!-- /pusher -->
</body>

</html>
