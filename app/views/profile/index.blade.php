@extends('layouts.master')
<?php date_default_timezone_set('Australia/Melbourne'); ?>
@section('head')

@section('content') 
<?php if (Auth::user()->role == 'admin'): ?>
	<div class="panel-heading">My Profile</div><br/>
 <?php else: ?>
             <div class="panel panel-danger"><div class="panel-heading">My Profile
             	<p>Assign Aus Level: </p>
             {{Form::open() }}
			 	{{ Form::select('aus_level', array('1' => '1.0', '2' => '2.0', '3' => '3.0', '4' => '4.0', '5' => '5.0')) }}
			 {{Form::close()}}
             </div></div>
 <?php endif ?>

<div class="panel-body">
	<div class="pull-left">
		<strong>UserName: </strong><?php echo $user -> user_login ?><br>
		<strong>Full Name: </strong> <?php echo $user -> user_nicename ?><br>
		<strong>Nickname: </strong> <?php echo $user -> display_name ?><br>
		<strong>Email: </strong> <?php echo $user -> user_email ?><br>
	</div>
	<div class="pull-right">
		{{HTML::image('/img/profilepic.png', '', array( 'width' => 140, 'height' => 140 ))}}
	</div>
</div>

<br>
<?php if (Auth::user()->role == 'admin'): ?>
	<div class="panel-heading">Recent Activity</div><br/>
 <?php else: ?>
             <div class="panel panel-danger"><div class="panel-heading">Recent Activity</div></div>
 <?php endif ?>

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
@stop