@extends('layouts.master')
@section('content')
<div class="page-heading">
	Attempt {{$quiz->title}}
</div>
<div class="quick-tip">
	Tick on the right answer. A question may have more than one right answer.<br>
	<?php if ($no_of_quiz_attempts > 0): ?>
		<a href="{{URL::to('resources/'.$resource->id.'/quizzes/'.$quiz->id.'/previous_attempts')}}" class="btn btn-link">
			Previous attempts ({{$no_of_quiz_attempts}})
		</a>	
	<?php endif ?>
</div>
<div class="section-content">
	
	{{Form::model($quiz, ['method' => 'POST', 'url' => 'resources/'.$resource->id. '/quizzes/'.$quiz->id.'/submit_answer']) }}
		@foreach($questions as $key => $question)
			<div class="question-wrapp"  id="question-{{($key)}}">
				<div class="question-label">
					{{($key+1). ". " .$question->name}} 
					<input type="hidden" name="answers[{{$question->id}}][question_id]" value="{{$question->id}}">
				</div>
				@foreach($question->options()->get() as $option)
					<div class="option-item">
						<div class="checkbox">
							<input class="check-option-input" type="checkbox" name="answers[{{$question->id}}][options][]" value="{{$option->id}}">
							{{$option->name}} 
						</div>
					</div>
				@endforeach
			</div>
		@endforeach
		<button type="submit" class="btn btn-primary submit-quiz">
			Submit Answers
		</button>
		
		<a class="btn btn-default" href="{{ URL::to('resources/'.$resource->id.'/quizzes') }}">
			Cancel
		</a>

	{{Form::close()}}
</div>
<script>
	//validation to choose at least one correct option
	$(document).on("click", ".submit-quiz", function(e){
		e.preventDefault();
		submit_btn = $(this);
		validation = true;
		$.each($(".question-wrapp"), function(index, value){
			var question = $(this);
			var questionId = Number(question.attr("id").split("-")[1]) + 1;
			var option_checked = false;
			$.each(question.find('.check-option-input'), function(inIndex, inValue){
				if($(this).is(':checked') == true)
				{
					option_checked = true;
				}
			});
			if(option_checked == false)
			{
				alert("Please choose at least one correct option for question no " + questionId);
				validation = false;
				return false;
			}
		});
		if(validation == true)
		{
			submit_btn.removeClass("submit-quiz");
			submit_btn.parents("form").submit();
		}		
		return true;
	});
</script>
@stop
