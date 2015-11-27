@extends('layouts.master')
@section('content')
<div class="page-heading">
	Add questions for {{$quiz->title}}
</div>
<div class="quick-tip">
	<ul>
		<li> Input question with at least 2 options for answer</li>
		<li> Click on checkbox to indicate correct answer </li>
		<li> You can choose more than one correct answer</li>
		<li> Click on <span class="fa fa-times"></span> to remove an option</li>
	</ul>
</div>
<div class="section-content">
{{ Form::open(array('url' => 'quizzes/' . $quiz->id .'/questions')) }}
	@for($i = 0; $i < $quiz->no_of_questions; $i++)
		<div class="question-wrapp">
			<label for="question">Question {{$i+1}}</label>
			<input type="text" name="question[{{$i}}][name]" class="form-control" value="name {{$i}}" required="true">
			<div class="option-wrapp" id="question-{{$i}}">
				@for($j = 0; $j < 3; $j++)
					<div class="option-item">
						<div class="row">
							<div class="col-xs-11">
								<span class="option-label"> Option {{$j+1}} </span>
								<input type="text" name="question[{{$i}}][options][{{$j}}][name]" class="form-control option-input" value="option {{$j}}" required="true">		
							</div>
							<div class="col-xs-1">
								<br>
								<input class="is-correct-input" type="checkbox" name="question[{{$i}}][options][{{$j}}][is_correct]" validate="required:true, minlength:1">
								<span class="fa-times fa remove-option">&nbsp;</span>
							</div>							
						</div>
					</div>					
				@endfor				
			</div>
			<div class="add-option-wrapp">
				<div class="btn btn-default btn-sm add-option">Add Option</div>
			</div>
		</div>	
	@endfor
	<button type="submit" class="btn btn-success submit-btn">
		<span class="glyphicon glyphicon-plus"></span>
		Save Questions
	</button>
{{Form::close()}}
</div>
<script>
	function balance_label(option_wrapp, option)
	{
		var questionId = $(option_wrapp).attr("id").split("-")[1];
		$.each(option_wrapp.find('.option-item'), function(index, value){
			var optionId   = index;
			var label     = "Option " + (optionId + 1);
			var name       = "question[" + questionId + "][options][" + optionId + "][name]";
			var is_correct = "question[" + questionId + "][options][" + optionId + "][is_correct]";
			$(this).find(".option-label").html(label);
			$(this).find(".option-input").attr("name", name);
			$(this).find(".is-correct-input").attr("name", is_correct);
		});
	}

	//code to remove an option
	$(document).on("click", ".remove-option", function(){
		var option_wrapp = $(this).parents(".option-wrapp");
		if(option_wrapp.find(".option-item").length == 2){
			alert("You need to provide at least 2 options");
		}else{
			$(this).parents(".option-item").remove();
			balance_label(option_wrapp);			
		}
	});

	//code to add an option
	$(document).on("click", ".add-option", function(){
		var $parent_option_wrapp = $(this).parents(".question-wrapp").find(".option-wrapp");
		var new_option = $parent_option_wrapp.find(".option-item:last").clone();
		$parent_option_wrapp.append(new_option);
		balance_label($parent_option_wrapp);
	});

	//validation to choose at least one correct option
	$(document).on("click", ".submit-btn", function(e){
		e.preventDefault();
		submit_btn = $(this);
		validation = true;
		$.each($(".option-wrapp"), function(index, value){
			var option_wrapp = $(this);
			var questionId = Number(option_wrapp.attr("id").split("-")[1]) + 1;
			var option_checked = false;
			$.each(option_wrapp.find('.is-correct-input'), function(inIndex, inValue){
				if($(this).is(':checked') == true)
				{
					option_checked = true;
				}
			});
			if(option_checked == false)
			{
				option_wrapp.parents(".question-wrapp:first").addClass("red");
				alert("Please choose at least one correct option for question no " + questionId);
				validation = false;
				return false;
			}else{
				option_wrapp.parents(".question-wrapp:first").removeClass("red");
			}
		});
		if(validation == true)
		{
			submit_btn.removeClass("submit-btn");
			submit_btn.parents("form").submit();
		}		
		return true;
	});
</script>
@stop
