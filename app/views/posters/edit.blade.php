@extends('layouts.master')

@section('content')

<div class="page-heading">
	Update Poster	
</div>

<div class="section-content">
	<div class="row">
		<div class="col-sm-offset-2 col-sm-8 col-sm-offset-2">
			{{ HTML::ul($errors->all(), array('class' => 'text-danger')) }}


			{{ Form::model($poster, array('route' => array('poster.update', $poster->id), 'method' => 'PUT')) }}
				<div class="form-group">
					{{ Form::label('title', 'Title*') }}
					{{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
				</div>
				<div class="form-group">
					{{ Form::label('body', 'Description*') }}
					{{ Form::textarea('description', Input::old('body'),  array('class' => 'form-control', "cols" => 100, "rows" => 10)) }}
				</div>
				<div class="form-group">
					{{ Form::label('releasedate', 'Release Date*') }}
					{{Form::input('date', 'release_date', null, ['class' => 'form-control', 'placeholder' => 'Date'])}}
				</div>
					<button type="submit" class="btn btn-primary">
						<span class="fa fa-plus"></span>Submit
					</button>
						<a class="btn btn-default" href="{{ URL::route('posters') }}">Cancel</a>
			{{ Form::close() }}

		</div>
	</div>
</div>
@stop