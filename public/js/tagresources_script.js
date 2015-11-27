$(document).ready(function(){
	$('#tag').keyup(function(){
		$('#output').html('');
		var tag = $('#tag').val();
		tag = $.trim(tag);
		if(tag){
			$.ajax({
					type: 'get',
					url: 'tagresources/available',
					data: 'tag='+tag,
					success: function (msg) {
						$('#output').append("<ul><li>" + msg+ "</li></ul>");
						//console.log('hello');
						
					}
				});
		}
	});
	 // $("#myTag").popover();
});