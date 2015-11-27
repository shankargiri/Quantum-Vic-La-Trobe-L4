@extends('layouts.master')
<?php date_default_timezone_set('Australia/Melbourne'); ?>
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
	All resources
</div>
<div class="section-content">

<?php if (Auth::user()->role == 'admin'): ?>
	<a href="{{ URL::to('resources/create') }}"><button class="btn btn-link"><i class="fa fa-plus">&nbsp;</i>Add New Resource</button></a>
<?php endif ?>

<table id="data-table" class="table table-stripped table-hover table-responsive tag_table">
	<?php $colWidth = (Auth::user()->role == 'admin') ? "20%" : "30%"; ?>
		<colgroup>
			<col span="1" style="width:{{$colWidth}}">
			<col span="1" style="width:{{$colWidth}}">
			<col span="1" style="width:{{$colWidth}}">

			<?php if(Auth::user()->role == 'admin'): ?>

			<col span="1" style="width:{{$colWidth}}">
			<col span="1" style="width:{{$colWidth}}">

		<?php endif ?>

		</colgroup>
	<thead>
		<tr>
			<th>Title</th>
			<th>Level</th>
			<th>Faculty</th>
			<?php if(Auth::user()->role == 'admin'): ?>
			<th>Publish</th>
			<th>Action</th>
			<?php endif ?>
		</tr>
	</thead>
	<tbody>

	@foreach($resources as $key => $resource)
		<tr>
			<td>
			<a href="{{ URL::to('resources/' . $resource->id) }}">{{ $resource->name }}</a><br><br>
				<a class="btn btn-info" href="{{URL::to('resources/'.$resource->id.'/quizzes')}}">Manage Quiz</a>
			</td>
			<td>
				{{ $resource->level }}
			</td>
			<td>
				{{$resource->faculty}}
			</td>
			<?php if(Auth::user()->is_admin == 'Y'){ ?>
			<?php if(Auth::user()->role == 'admin'){ ?>

			<td>
				<?php if ($resource->is_publish): ?>
					<a class="btn btn-warning" href="{{ URL::to('admin/resources/' . $resource->id . '/unpublish_resource') }}">
					<i class="fa fa-times-circle"></i> Unpublish
					</a>
					<?php else: ?>
					<a class="btn btn-success" href="{{ URL::to('admin/resources/' . $resource->id . '/publish_resource') }}">
					<i class="fa fa-check-circle"></i> Publish
					</a>
				<?php endif ?>
			</td>
			<td>
				<a class="btn btn-info" href="{{ URL::to('resources/' . $resource->id . '/edit') }}">
				<i class="fa fa-pencil-square-o"></i> Edit
				</a>
				{{ Form::open(array(
				'url' => 'resources/' . $resource->id,
				'method' => 'delete',
				'style' => 'display:inline' ))
				}}
				@include('partials/_delete')
				{{ Form::close() }}
			</td>
		<?php } 
		} 
		?>
		</tr>
	@endforeach

	</tbody>
</table>
</div>
@stop