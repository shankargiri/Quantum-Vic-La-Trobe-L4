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
	All tags
</div>

<div class="section-content">
	<a href="{{ URL::to('tags/create') }}" style="padding-bottom: 5px;" >
		<button class="btn btn-link"><i class="fa fa-plus">&nbsp;</i>Add New Tag</button>
	</a>

<table id="data-table" class="table table-bordered table-hover table-responsive tag_table">
	<colgroup>
       		<col span="1" style="width: 20%;">
       		<col span="1" style="width: 55%;">
       		<col span="1" style="width: 25%;">
    	</colgroup>

	<thead>
		<tr class="row_headlines">
			<th>Title</th>
			<th>Description</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tag as $key => $value)
		<tr>
			<td>{{ $value->name }}</td>
			<td style="text-align:justify">{{ $value->description }}</td>
			<td>
				<a class="btn btn-primary" href="{{ URL::to('tags/' . $value->
					id . '/edit') }}"> <i class="fa fa-pencil-square-o"></i>
					Edit
				</a>
				{{ Form::open(array(
   		         			'url' => 'tags/' . $value->id,
            					'method' => 'delete',
            					'style' => 'display:inline' ))
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