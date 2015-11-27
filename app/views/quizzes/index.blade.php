@extends('layouts.master')
@section('content')

<style>
	thead td{text-align: center;background: rgba(119, 119, 134, 0.14);}	
	
	.right-content{border: none;}
</style>

<div class="page-heading">
	Quizes for {{$resource->name}}
	<a class="btn btn-default pull-right" href="{{ URL::to('resources/'.$resource->id) }}">View Resource</a>
</div>
<div class="section-content">
	<a class="btn btn-link" href="{{ URL::to('resources/'.$resource->id.'/quizzes/create') }}">
		<i class="fa fa-plus">&nbsp;</i>
		Add a new quiz
	</a>

<?php if (sizeof($quizzes) > 0): ?>
	<table class="table table-stripped">
	   <thead>
			<tr>
				<td>
					Quiz title
				</td>
				<td>
					Quiz description
				</td>
				<td>
					No of questions
				</td>
				<td>
					Actions
				</td>
				<td>
					<!-- Action -->
				</td>
				<!-- <td>
					Detail
				</td> -->
			</tr>
		</thead>
	    <tbody>
			@foreach($quizzes as $quiz)
				<tr>
					<td>
						{{$quiz->title}}
					</td>
					<td>
						{{Str::limit ( $quiz->description, 150)}} 
						<a href="{{ URL::to('quizzes/'.$quiz->id .'/questions') }}">View Questions</a>
					</td>
					<td>
						{{$quiz->no_of_questions}}
					</td>
					<td>
						<a class="btn btn-primary pull-right" href="{{ URL::to('resources/'.$resource->id.'/quizzes/'.$quiz->
							id .'/edit') }}"> <i class="fa fa-pencil-square-o"></i>
							Edit
						</a>
					</td>
					<td>
						<!-- resources/{resource}/quizz/{id} -->

						{{Form::open(array('url' => 'resources/'.$resource->id.'/quizzes/'.$quiz->id, 'method' => 'delete', 'style' => 'display:inline')) }}
							@include ('partials/_delete')
						{{Form::close()}}

					</td>
					<!-- <td>
						<a href="{{URL::to('quizzes/'. $quiz->id.'/questions')}}">Detail</a>
					</td> -->
				</tr>
			@endforeach
		</tbody>
   </table>
<?php endif ?>
</div> 

@stop








