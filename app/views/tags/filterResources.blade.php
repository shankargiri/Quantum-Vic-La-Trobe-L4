@extends('layouts.master')

@section('content')
	{{ $input_tag = $_REQUEST['tag'] }}
	@foreach ($tag as $value)
		{{ $value->name }}
	@endforeach
@stop

