
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js" type="text/javascript"></script>
   
 <script>
    $(document).ready(function(){        

        function insertIntoTagIds(tagBlock, tagIds){
            tagBlock.find(".tag_ids").val(tagIds.join(","));   
        }
        function getCurrentTagIds(tagBlock)
        {
            var currentIds = tagBlock.find(".tag_ids").val();
            var tagIds = new Array();
            if(currentIds != ''){
                tagIds = currentIds.split(",");
            }
            return tagIds;
        }

    	var tagsArray = new Array();
        var tagHash = {};
    	<?php foreach($tags as $tag): ?>
    		tagHash["<?php echo $tag->name ?>"] = "<?php echo $tag->id; ?>";
    		tagsArray.push("<?php echo $tag->name; ?>");
    	<?php endforeach; ?>

    	$(".tag_inputs").autocomplete({
    		source:tagsArray,
    		Select: function (event, ui){
    			$(".tag_inputs").val(ui.item.label);

    		}
    	});

        $('.tag_inputs').on('autocompleteselect', function (e, ui) {
            var currentId = tagHash[ui.item.value];
            var tagBlock = $(this).parents(".tagging-block:first");
            var tagIds = getCurrentTagIds(tagBlock);
            if($.inArray(currentId, tagIds) == -1){
                var tagSpan = "<div class='btn btn-default tag_tooltip' data-id='" + currentId + "'><a target='_blank' href='<?php echo Url::to('tags/'.$tag->id); ?>' class='tagname'>" + ui.item.value + "&nbsp;</a><i class='fa fa-times'></i></div>";                
        	    tagBlock.find('.tagnames').append(tagSpan);
                tagIds.push(currentId);
                insertIntoTagIds(tagBlock, tagIds);
            }
            $(this).val('');
            return false;
         });

        $(document).on("click", ".tag_tooltip .fa-times", function(){
            var tag_tooltip = $(this).parents(".tag_tooltip:first");
            var tagIdToBeRemoved = tag_tooltip.data("id").toString();
            var tagBlock = $(this).parents(".tagging-block:first");
            var tagIds = getCurrentTagIds(tagBlock); 
            tag_tooltip.remove();
            var index = tagIds.indexOf(tagIdToBeRemoved)
            if (index > -1) {
                tagIds.splice(index, 1);
                console.log(tagIds);
                insertIntoTagIds(tagBlock, tagIds);
            }
            
        });
    });
</script>



