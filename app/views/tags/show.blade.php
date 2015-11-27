@extends('layouts.master')

@section('content')
	<div class="page-heading">
		{{$tag->name}}
	</div>
	<div class="section-content">
		{{$tag->description}}
	</div>
@stop