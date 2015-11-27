@extends('layouts.master')
@section('content')
@foreach($resources as $key => $resource)
	 <div class="col-md-3 col-sm-4 col-xs-6">
        	<a href="{{URL::to("resources/".$resource->id.'/photos')}}">
                <div class="jumbotron block-item">
                    <i class="fa fa-thumb-tack fa-2x"></i>
                    <div class="description">
                       {{$resource->name}}
                    </div>
                </div>
            </a>
	</div>
@endforeach

@stop