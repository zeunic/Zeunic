$(function(){ 
	$('footer').find('q').tweets({
		tweets: 1,
		username: "zeunic"
	});
	
	$('textarea').autoResize({
	    // Quite slow animation:
	    animateDuration : 300,
	    // More extra space:
	    extraSpace : 20,
	    limit: 999999999
	}).bind('click', function(){
		$(this).trigger('keyup');
	});;
	
	$('#ContactForm_name').bind('blur', function(){
		var name = $(this).val();
		var sig = $('#signature');
		if(name == ''){
			sig.html('Thanks.').animate({height:30},300);
		} else {
			sig.animate({height:70}, 300).html('Thanks,<br />'+name);
		}
	});
	
	
	// temp animation for portfolio testing code
	
	$('.left-thumb').bind('mouseenter', function(){
		var that = $(this);
		var sm_thumb = that.children('.sm-thumb');
		var lg_thumb = that.children('.lg-thumb');
		
		setTimeout(function(){
			lg_thumb.animate({ opacity: 1});
			that.animate({ width: 590 }, 800);
		}, 500);
				
	});
	
	$('.left-thumb').bind('mouseleave', function(){
		var that = $(this);
		var sm_thumb = that.children('.sm-thumb');
		var lg_thumb = that.children('.lg-thumb');
		
		lg_thumb.animate({ opacity: 0});
		
		that.animate({ width: 190 })
		
	});
	
});