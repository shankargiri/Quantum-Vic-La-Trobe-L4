@extends('layouts.master')
@section('content')
@foreach($posts as $key => $value)
	<div class="instruction-panel">
		<?php if (Auth::user()->role == 'admin'): ?>
			<div class="panel-heading">
			{{$value->title}}
			</div>
		<?php else: ?>
			<div class="panel panel-danger"><div class="panel-heading">
			{{$value->title}}
			</div></div>
		<?php endif ?>
		
		<div class="panel-body">
			{{$value->body}} <br>
			<em>
				Published on <?php echo $value->created_at->format("g:i a F j, Y") ?>
			</em>			
		
			<h4> Share This</h4>		
			<a target="_blank" href="{{ Share::load(Request::url(), 'check this -> '.$value->title)->twitter() }}" ><i class="fa fa-lg fa-twitter btn btn-sm btn-primary"></i></a>
			<a target="_blank" href="{{ Share::load(Request::url(), 'check this -> '.$value->title)->facebook() }}" ><i class="fa fa-lg fa-facebook btn btn-sm btn-primary"></i></a>
			<a target="_blank" href="{{ Share::load(Request::url(), 'check this -> '.$value->title)->gplus() }}" ><i class="fa fa-lg fa-google-plus btn btn-sm btn-primary"></i></a>
			<a target="_blank" href="{{ Share::load(Request::url(), 'check this -> '.$value->title)->linkedin() }}" ><i class="fa fa-lg fa-linkedin btn btn-sm btn-primary"></i></a>
			<a target="_blank" ><i class="fa fa-lg fa-linkedin btn btn-sm btn-primary"></i></a><div style="padding-top:10px;"  class="fb-like" data-href={{Request::url()}} data-layout="standard" data-action="like" data-show-faces="true" >
			</div>
		</div>
	</div>
@endforeach
@stop