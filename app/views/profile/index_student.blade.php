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
        {{ HTML::script("js/jquery-1.11.1.min.js")}}
		{{ HTML::script("js/snap.svg-min.js")}}
		{{ HTML::script("js/modernizr.custom.js")}}
		{{ HTML::script("js/uisearch.js")}}
		{{ HTML::style("css/profileStyle.css")}}
		<script>
			$(function(){
				$(".frame").hide();
				$(".overRide").hide();
				$(".edit").click(function(){
					$(".frame").fadeIn();
					$(".overRide").fadeIn();
					
				});
				$(".btn-danger").click(function(){
					$(".frame").fadeOut();
					$(".overRide").fadeOut();
				});
			});
			 function readURL(input) {
	            if (input.files && input.files[0]) {
	                var reader = new FileReader();

	                reader.onload = function (e) {
	                    $('#blah').attr('src', e.target.result);
	                }

	                reader.readAsDataURL(input.files[0]);
	            }
	         }
		</script>
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

<?php date_default_timezone_set('Australia/Melbourne'); ?>

<div class="overRide"></div>
<div class="frame row">
	<div class="row">
		<div class="col-sm-6"><h3>Select an image here</h3></div>
		<div class="col-sm-6"><h3>Preview</h3></div>
	</div>
	<div class="row">
		<div class="form-group col-sm-6">
			{{ Form::open(array('action' => 'userProfilePhotoController@store','files'=>'true')) }}
		  		{{ Form::file('image',array('onchange' => 'readURL(this);'))}}
		  		{{Form::submit('Upload Pic' ,array('class' => 'btn btn-primary'))}}
		  		{{Form::button('cancel',array('class'=>'btn btn-danger'))}}
			{{ Form::close() }}
		</div>
		<div class="col-sm-6 preview">
			<img id="blah" src="#" alt="your image" />
		</div>
	</div>
</div>
   <div class="page-heading">
        <div class="control-group clearfix">
            <div class="pull-left" style="padding-top: 8px;">My Profile</div></div></div><br/>

 


<div class="panel-body">
	<div class="pull-left">
		<strong>UserName: </strong><?php echo $user -> user_login ?><br>
		<strong>Full Name: </strong> <?php echo $user -> user_nicename ?><br>
		<strong>Nickname: </strong> <?php echo $user -> display_name ?><br>
		<strong>Email: </strong> <?php echo $user -> user_email ?><br>
	</div>
	<div class="pull-right">
		<?
		if(empty($photoUrl))
		{
			$photoUrl = 'http://localhost:8000/img/def.jpg';
		}
		?>
		<div class="profilePic"><span class="edit">Edit pic</span>{{HTML::image($photoUrl, '', array( "class"=> "profilePic"))}}</div>
	</div>
</div>

   <div class="page-heading">
        <div class="control-group clearfix">
            <div class="pull-left" >Recent Activity</div></div></div><br/>


<div class="panel-body">
	<?php if (sizeof($views) > 0 || sizeof($quiz_attempts) > 0): ?>
		<?php if (sizeof($quiz_attempts) > 0 ): ?>
			<h3>Quiz Attempts</h3>
			@foreach($quiz_attempts as $quiz_attempt)
				You attempted 

				<a href="{{URL::to('resources/'.$quiz_attempt->resource_id . '/quizzes/'.$quiz_attempt->quiz_id. '/show_answer/' .$quiz_attempt->id)}}">
					{{$quiz_attempt->quiz_title}}
				</a>
				 of 
				<a href="{{URL::to('resources/'. $quiz_attempt->resource_id)}}">
					{{$quiz_attempt->resource_name}}
				</a> 
				<?php $date = date_create($quiz_attempt->created_at); ?>
				at {{date_format($date,'g:i a F j, Y')}}
				<br>
			@endforeach
		<?php endif ?>
		<h3>Viewed Resource</h3>
		@foreach($views as $view)
			You viewed resource 
			<a target="_blank" href="{{URL::to('/resources/'.$view -> resource_id)}}">
				<?php echo $view -> resource_name ?>
				<?php $date = date_create($view->updated_at); ?>
			</a> at {{date_format($date,'g:i a F j, Y')}}
			<br>
		@endforeach
	<?php else: ?>
		No recent activity found.
	<?php endif ?>
</div>
</body>
</html>