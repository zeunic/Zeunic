$(function(){ 
	
	var addFileInputEvent = function(){
		$('#project-form').find('input[type=file]:last').bind('change', function(){
			var that = $(this);
			currentID = that.attr('id');
			console.log(currentID);
			currentID = currentID.substring(currentID.length-1, currentID.length);
			console.log(currentID);
			nextID = Number(currentID)+1;
			that.parent().parent().append('<div class="row"><label for="Gallery_image">Image</label><input id="ytGallery_image_'+nextID+'" type="hidden" value="" name="Gallery[image]['+nextID+']" /><input size="50" maxlength="50" name="Gallery[image]['+nextID+']" id="Gallery_image_'+nextID+'" type="file" /></div>');
			that.unbind('change');
			addFileInputEvent();
		});
	}
	
	addFileInputEvent();
});