$(function()
{
	var current_li;

	function setImg(src,id){
		$("#main").attr("src", src); //look for image tag in the main and sets its src value to variable source
	}

	$("#portfolio img").click(function()
	{
		var src = $(this).attr("src"); //grab the source of the image 'attr' means attribute
		var id = $(this).attr("id");
		current_li = $(this).parent(); // grab the parent of selected image(i.e li)
		setImg(src,id);
		$("#frame").fadeIn();
		$("#overlay").fadeIn();
	});
		
	$("#overlay").click(function(){
		$(this).fadeOut();
		$("#frame").fadeOut();
	});
	$("#right").click(function(){
		if(current_li.is(":last-child")) //check if the selected li is the last in the list
		{
			var next_li = $("#portfolio li").first(); //if yes then set the next li to the first li in the list
		}	
		else
		{
			var next_li = current_li.next();
		}
		var next_src= next_li.children("img").attr("src"); //get the source of the children of the li
		var id= next_li.children("img").attr("id");
		setImg(next_src,id);
		current_li = next_li; // set the current li to the next li
	});
	$("#left").click(function()
	{
		if(current_li.is(":first-child"))
		{
			var prev_li = $("#portfolio li").last();
		}
		else
		{
			var prev_li = current_li.prev();
		}
		var prev_src= prev_li.children("img").attr("src");
		$("#main").attr("src",prev_src);
		current_li = prev_li;
	});
	$("#right, #left").mouseover(function()
	{
		$(this).css("opacity","0.9");
	});
	$("#right, #left").mouseleave(function()
	{
		$(this).css("opacity","0.6");
	});

});