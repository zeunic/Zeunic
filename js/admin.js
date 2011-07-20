$(function(){ 
	
	var addFileInputEvent = function(){
		$('#project-form').find('input[type=file]:last').bind('change', function(){
			var that = $(this);
			currentID = that.attr('id');
			currentID = currentID.substring(currentID.length-1, currentID.length);
			nextID = Number(currentID)+1;
			that.parent().parent().append('<div class="row"><label for="Gallery_image">Image</label><br /><input id="ytGallery_image_'+nextID+'" type="hidden" value="" name="Gallery[image]['+nextID+']" /><input size="50" maxlength="50" name="Gallery[image]['+nextID+']" id="Gallery_image_'+nextID+'" type="file" /></div>');
			that.unbind('change');
			addFileInputEvent();
		});
	}
	
	var addTestimonialInputEvent = function(){
		$('#project-form').find('fieldset:last input').bind('keyup', function(){
			hasVal = true;
			$('#project-form').find('fieldset:last input').each(function(index, elem){
				var that = $(this);
				if(that.val() != '' && hasVal == true){
					hasVal = true;
				} else hasVal = false;
			});
			if(hasVal){
				var that = $(this);
				currentID = that.attr('id');
				currentID = currentID.substring(currentID.length-1, currentID.length);
				nextID = Number(currentID)+1;
				$('<fieldset><div class="row"><label for="Testimonial_testimonial_'+nextID+'">Testimonial (use &lt;pull&gt;&lt;/pull&gt; to identify pull quote)</label><br /><textarea rows="6" cols="50" name="Testimonial[testimonial]['+nextID+']" id="Testimonial_testimonial_'+nextID+'"></textarea></div><div class="row"><label for="Testimonial_author_'+nextID+'">Author</label><br /><input size="40" maxlength="40" name="Testimonial[author]['+nextID+']" id="Testimonial_author_'+nextID+'" type="text" value="" /></div><div class="row"><label for="Testimonial_authorTitle_'+nextID+'">Author Title</label><br /><input size="40" maxlength="40" name="Testimonial[authorTitle]['+nextID+']" id="Testimonial_authorTitle_'+nextID+'" type="text" /></div></fieldset>').insertBefore('.buttons');
				that.unbind('keyup');
				addTestimonialInputEvent();
			}
		});
	}
	
	addFileInputEvent();
	addTestimonialInputEvent();
});