@extends('layouts.master')

@section('head')
@parent
{{ HTML::script("js/DataTables/datatable.js") }}
{{ HTML::script("js/DataTables/ZeroClipboard.js") }}
{{ HTML::script("js/DataTables/TableTools.js") }}
{{ HTML::style("css/TableTools/demo_table.css") }}
{{ HTML::style("css/TableTools/TableTools.css") }}

@stop

@section('content')

<style>
	table th{text-align: center;background: rgba(119, 119, 134, 0.14);}	
	tbody{text-align: center;}

</style>

<div class="page-heading">
	All posts
</div>
<div class="section-content">
<?php if (Auth::user()->role == 'admin'): ?>
	<a href="{{ URL::to('posts/create') }}"><button class="btn btn-link"><i class="fa fa-plus">&nbsp;</i>Add New Post</button></a>
<?php endif ?>


<table id="data-table" class="table table-bordered table-hover table-responsive tag_table">
	<colgroup>
       		<col span="1" style="width: 40%;">
       		<col span="1" style="width: 40%;">
       		<col span="1" style="width: 20%;">
    	</colgroup>

	<thead>
		<tr>
			<th>Title</th>
			<th>Published On</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
			
	@foreach($posts as $key => $value)
		<tr>
			<td>
				<a href="{{ URL::to('posts/' . $value->id) }}">{{ $value->title }}</a>
			</td>
			<td>
				{{ $value->created_at->format("F j, Y g:i a")}}
			</td>
			<td>
				<a class="btn btn-primary" href="{{ URL::to('posts/' . $value->id . '/edit') }}"><i class="fa fa-pencil-square-o"></i> Edit</a>
			
				{{ Form::open(array(
	   		         	'url' => 'posts/' . $value->id,
            				'method' => 'delete',
            				'style' => 'display:inline'  ))
	    			}}

					@include ('partials/_delete')

				{{ Form::close() }}
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
</div>
@stop
