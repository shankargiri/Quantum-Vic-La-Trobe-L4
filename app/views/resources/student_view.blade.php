	<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/demoMenu.css" />
		<link rel="stylesheet" type="text/css" href="css/demo1.css" />
		<link rel="stylesheet" type="text/css" href="css/componentMenu.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/resStyle.css">
		<link rel="stylesheet" href="css/odometer-theme-car.css" />
		<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400italic' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="css/demo22.css" />
			<link rel="stylesheet" type="text/css" href="css/styleCar.css" />
			<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
			<link rel="stylesheet" type="text/css" href="css/odometer1-theme-digital.css">


	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-darkness/jquery-ui.css" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.2.6.css" />
		<script>
			window.odometerOptions = {
			  format: '(ddd).dd'
			};
		</script>
		
				<style>
					.es-carousel ul{
						display:block;
					}
					.resName{
						font-family: 'Libre';
					}
				</style>
			
			<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
				<div class="rg-image-wrapper">
					if (itemsCount > 1)
						<div class="rg-image-nav">
							<a href="#" class="rg-image-nav-prev">Previous Image</a>
							<a href="#" class="rg-image-nav-next">Next Image</a>
						</div>
					 </if>
					<div class="rg-image"></div>
					<div class="rg-loading"></div>
					<div class="rg-caption-wrapper">
						<div class="rg-caption" style="display:none;">
							<p></p>
						</div>
					</div>
				</div>
			</script>


	</head>
	<body>
		<div class="mp-pusher" id="mp-pusher">
			<div id="overlay"></div>
					<!-- mp-menu -->
					<nav id="mp-menu" class="mp-menu">
						<div class="mp-level">
							<h2 class="">All Categories</h2>
							<a class="mp-back" href="#">back</a>
							<ul>
								<li >
									<a  href="#">Devices</a>
									
								</li>
								<li><a href="#">Magazines</a></li>
								<li ><a href="#">Store</a></li>
								<li><a href="#">Collections</a></li>
								<li><a href="#">Credits</a></li>
							</ul>
								
						</div>
					</nav>
					<!-- /mp-menu -->
					<div class="block block-40 ">
						<p><a href="#" id="trigger" class="menu-trigger">Menu</a></p>	
					</div>
					<div class="row dash">
						<div class="col-lg-7 col-md-7 col-sm-7">
							<div class= "resName">Mathematics</div>
							<div class="row hits">
								<div class="col-ls-6 col-md-6 col-sm-6 nHits"><p>Number of Hits</div>
								
								<div class="col-ls-6 col-md-6 col-sm-6 meter">
								<div class="odometer chits">900</div>
								<script>
								  setTimeout(function(){
								    $('.odometer').html(240);
								  }, 1000);
								</script>

								</div>
							</div>
							<div class=" level">
								This Resource will help gain a deeper understanding in the concepts of mathematics and help students learn more stuff
							</div>
							<div class="row faculty">
								<div class="col-md-12 col-sm-12 col-xs-12 ">
								Faculty : Mathematics
								</div>
							</div>
							<div class="row faculty">
								<div class="col-md-12 col-sm-12 col-xs-12 ">
								Level : 7
								<img style="" src="img/like.png" alt="like">
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 ">

							<div id="gallery">
	    
							<div id="pic-1" class="pic ui-draggable" style="top:75px;left:103px;background:url(img/thumbs/1-california-surfing.jpg) no-repeat 50% 50%; -moz-transform:rotate(24deg); -webkit-transform:rotate(24deg);">
							<a class="fancybox" rel="fncbx" target="_blank">1-california-surfing</a>
							</div>
							<div id="pic-2" class="pic ui-draggable" style="top:262px;left:262px;background:url(img/thumbs/2-breast-stroke.jpg) no-repeat 50% 50%; -moz-transform:rotate(37deg); -webkit-transform:rotate(37deg);">
							<a class="fancybox" rel="fncbx" target="_blank">2-breast-stroke</a>
							</div>
							<div id="pic-3" class="pic ui-draggable" style="top:209px;left:243px;background:url(img/thumbs/4-green-beach.jpg) no-repeat 50% 50%; -moz-transform:rotate(34deg); -webkit-transform:rotate(34deg);">
							<a class="fancybox" rel="fncbx" target="_blank">4-green-beach</a>
							</div>
							
							<div id="pic-5" class="pic ui-draggable" style="top:27px;left:214px;background:url(img/thumbs/bamboo.jpg) no-repeat 50% 50%; -moz-transform:rotate(-4deg); -webkit-transform:rotate(-4deg);">
							<a class="fancybox" rel="fncbx" target="_blank">bamboo</a>
							</div>
							<div id="pic-6" class="pic ui-draggable" style="top:182px;left:65px;background:url(img/thumbs/blue-green-nature.jpg) no-repeat 50% 50%; -moz-transform:rotate(-32deg); -webkit-transform:rotate(-32deg);">
							<a class="fancybox" rel="fncbx" target="_blank">blue-green-nature</a>
							</div>
							<div id="pic-7" class="pic ui-draggable" style="top:50px;left:167px;background:url(img/thumbs/colosseum.jpg) no-repeat 50% 50%; -moz-transform:rotate(-28deg); -webkit-transform:rotate(-28deg);">
							<a class="fancybox" rel="fncbx" target="_blank">colosseum</a>
							</div>
							<div id="pic-8" class="pic ui-draggable" style="top:86px;left:31px;background:url(img/thumbs/endurance.jpg) no-repeat 50% 50%; -moz-transform:rotate(-29deg); -webkit-transform:rotate(-29deg);">
							<a class="fancybox" rel="fncbx" target="_blank">endurance</a>
							</div>
							<div id="pic-9" class="pic ui-draggable" style="top:237px;left:243px;background:url(img/thumbs/farm.jpg) no-repeat 50% 50%; -moz-transform:rotate(5deg); -webkit-transform:rotate(5deg);">
							<a class="fancybox" rel="fncbx" target="_blank">farm</a>
							</div>
							<div id="pic-10" class="pic ui-draggable" style="top:109px;left:221px;background:url(img/thumbs/industrial-mech.jpg) no-repeat 50% 50%; -moz-transform:rotate(19deg); -webkit-transform:rotate(19deg);">
							<a class="fancybox" rel="fncbx" target="_blank">industrial-mech</a>
							</div>
							<div id="pic-11" class="pic ui-draggable" style="top:81px;left:266px;background:url(img/thumbs/sahale-wa.jpg) no-repeat 50% 50%; -moz-transform:rotate(-30deg); -webkit-transform:rotate(-30deg);">
							<a class="fancybox" rel="fncbx" target="_blank">sahale-wa</a>
							</div>
							<div id="pic-12" class="pic ui-draggable" style="top:101px;left:42px;background:url(img/thumbs/sands-of-life.jpg) no-repeat 50% 50%; -moz-transform:rotate(-5deg); -webkit-transform:rotate(-5deg);">
							<a class="fancybox" rel="fncbx" target="_blank">sands-of-life</a>
							</div>
							<div id="pic-13" class="pic ui-draggable" style="top:68px;left:22px;background:url(img/thumbs/spice.jpg) no-repeat 50% 50%; -moz-transform:rotate(4deg); -webkit-transform:rotate(4deg);">
							<a class="fancybox" rel="fncbx" target="_blank">spice</a>
							</div>
							<div id="pic-14" class="pic ui-draggable" style="top:304px;left:41px;background:url(img/thumbs/sports-car.jpg) no-repeat 50% 50%; -moz-transform:rotate(-9deg); -webkit-transform:rotate(-9deg);">
							<a class="fancybox" rel="fncbx" target="_blank">sports-car</a>
							</div>
							<div id="pic-15" class="pic ui-draggable" style="top:215px;left:101px;background:url(img/thumbs/tonemapped.jpg) no-repeat 50% 50%; -moz-transform:rotate(39deg); -webkit-transform:rotate(39deg);">
							<a class="fancybox" rel="fncbx" target="_blank">tonemapped</a>
							</div>
							<div id="pic-16" class="pic ui-draggable" style="top:241px;left:0px;background:url(img/thumbs/whoooosh.jpg) no-repeat 50% 50%; -moz-transform:rotate(7deg); -webkit-transform:rotate(7deg);">
							<a class="fancybox" rel="fncbx" target="_blank">whoooosh</a>
							</div>
							</div>
						</div>
						<div class="col-sm-2 col-md-2 col-lg-2">
							<div class="sticky-container">
								<ul class="sticky">
									<li class="share">
										
										<p>Share</p>
									</li>
									<li>
										<img width="32" height="32" title="" alt="" src="img/fb1.png" />
										<p>Facebook</p>
									</li>
									<li>
										<img width="32" height="32" title="" alt="" src="img/tw1.png" />
										<p>Twitter</p>
									</li>
									<li>
										<img width="32" height="32" title="" alt="" src="img/g1.png" />
										<p>Google+</p>
									</li>
									<li>
										<img width="32" height="32" title="" alt="" src="img/li1.png" />
										<p>Linkedin</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
							

	<div class="row gallery">
					<div class="container">
				
				<div class="content">
					
					<div id="rg-gallery" class="rg-gallery">
						<div class="rg-thumbs">
							<!-- Elastislide Carousel Thumbnail Viewer -->
							<div class="es-carousel-wrapper">
								<div class="es-nav">
									<span class="es-nav-prev">Previous</span>
									<span class="es-nav-next">Next</span>
								</div>
								<div class="es-carousel">
									<ul>
										<li><a href="#"><img src="img/thumbs/1.jpg" data-large="img/1.jpg" alt="image01" data-description="From off a hill whose concave womb reworded" /></a></li>
										<li><a href="#"><img src="img/thumbs/2.jpg" data-large="img/2.jpg" alt="image02" data-description="A plaintful story from a sistering vale" /></a></li>
										<li><a href="#"><img src="img/thumbs/3.jpg" data-large="img/3.jpg" alt="image03" data-description="A plaintful story from a sistering vale" /></a></li>
										<li><a href="#"><img src="img/thumbs/4.jpg" data-large="img/4.jpg" alt="image04" data-description="My spirits to attend this double voice accorded" /></a></li>
										<li><a href="#"><img src="img/thumbs/5.jpg" data-large="img/5.jpg" alt="image05" data-description="And down I laid to list the sad-tuned tale" /></a></li>
										<li><a href="#"><img src="img/thumbs/6.jpg" data-large="img/6.jpg" alt="image06" data-description="Ere long espied a fickle maid full pale" /></a></li>
										<li><a href="#"><img src="img/thumbs/7.jpg" data-large="img/7.jpg" alt="image07" data-description="Tearing of papers, breaking rings a-twain" /></a></li>
										<li><a href="#"><img src="img/thumbs/8.jpg" data-large="img/8.jpg" alt="image08" data-description="Storming her world with sorrow's wind and rain" /></a></li>
										<li><a href="#"><img src="img/thumbs/9.jpg" data-large="img/9.jpg" alt="image09" data-description="Upon her head a platted hive of straw" /></a></li>
										<li><a href="#"><img src="img/thumbs/10.jpg" data-large="img/10.jpg" alt="image10" data-description="Which fortified her visage from the sun" /></a></li>
										<li><a href="#"><img src="img/thumbs/11.jpg" data-large="img/11.jpg" alt="image11" data-description="Whereon the thought might think sometime it saw" /></a></li>
										<li><a href="#"><img src="img/thumbs/12.jpg" data-large="img/12.jpg" alt="image12" data-description="The carcass of beauty spent and done" /></a></li>
										<li><a href="#"><img src="img/thumbs/13.jpg" data-large="img/13.jpg" alt="image13" data-description="Time had not scythed all that youth begun" /></a></li>
										<li><a href="#"><img src="img/thumbs/14.jpg" data-large="img/14.jpg" alt="image14" data-description="Nor youth all quit; but, spite of heaven's fell rage" /></a></li>
										<li><a href="#"><img src="img/thumbs/15.jpg" data-large="img/15.jpg" alt="image15" data-description="Some beauty peep'd through lattice of sear'd age" /></a></li>
										<li><a href="#"><img src="img/thumbs/16.jpg" data-large="img/16.jpg" alt="image16" data-description="Oft did she heave her napkin to her eyne" /></a></li>
										<li><a href="#"><img src="img/thumbs/17.jpg" data-large="img/17.jpg" alt="image17" data-description="Which on it had conceited characters" /></a></li>
										<li><a href="#"><img src="img/thumbs/18.jpg" data-large="img/18.jpg" alt="image18" data-description="Laundering the silken figures in the brine" /></a></li>
										<li><a href="#"><img src="img/thumbs/19.jpg" data-large="img/19.jpg" alt="image19" data-description="That season'd woe had pelleted in tears" /></a></li>
										<li><a href="#"><img src="img/thumbs/20.jpg" data-large="img/20.jpg" alt="image20" data-description="And often reading what contents it bears" /></a></li>
										<li><a href="#"><img src="img/thumbs/21.jpg" data-large="img/21.jpg" alt="image21" data-description="As often shrieking undistinguish'd woe" /></a></li>
										<li><a href="#"><img src="img/thumbs/22.jpg" data-large="img/22.jpg" alt="image22" data-description="In clamours of all size, both high and low" /></a></li>
										<li><a href="#"><img src="img/thumbs/23.jpg" data-large="img/23.jpg" alt="image23" data-description="Sometimes her levell'd eyes their carriage ride" /></a></li>
										<li><a href="#"><img src="img/thumbs/24.jpg" data-large="img/24.jpg" alt="image24" data-description="As they did battery to the spheres intend" /></a></li>
									</ul>
								</div>
							</div>
							<!-- End Elastislide Carousel Thumbnail Viewer -->
						</div><!-- rg-thumbs -->
					</div><!-- rg-gallery -->
					
				</div><!-- content -->
			</div><!-- container -->
		</div>
			<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
			<script src="js/odometer.min.js"></script>
			<script src="js/modernizr.custom.js"></script>
			<script type="text/javascript" src="js/jquery.fancybox-12.6.pack.js"></script>
			<script type="text/javascript" src="js/jquery.tmpl.min.js"></script>
			<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
			<script type="text/javascript" src="js/jquery.elastislide.js"></script>
			<script type="text/javascript" src="js/gallery.js"></script>
			<script src="js/classie.js"></script>
			<script src="js/mlpushmenu.js"></script>
			<script>
				new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
			</script>

	</body>
	</html>