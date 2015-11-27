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
<div class="page-heading">
	Resource Report
</div>
<div class="section-content">
<table id="data-table" class="table table-bordered table-hover table-responsive">
  		<colgroup>
       		<col span="1" style="width: 40%;">
       		<col span="1" style="width: 20%;">
       		<col span="1" style="width: 20%;">
       		<col span="1" style="width: 20%;">
    	</colgroup>
	<thead>
		<tr>
			<th>Resource Name</th>
			<th>Number of Views </th>
			<th>Number of Quizzes </th>
			<th>Number of Photos </th>
		</tr>
	</thead>
	<tbody>
		@foreach($resources as $resource)
		<tr>
			<td>
				<a href="{{URL::to('resources/' . $resource->id) }}">
					{{$resource->name}}
				</a>
			</td>
			<td>{{sizeof($resource->views()->get())}}</td>
			<td>{{sizeof($resource->quizzes()->get())}}</td>
			<td>{{sizeof($resource->photos()->get())}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@stop