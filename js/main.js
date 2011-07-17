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
	
	$('.left-thumb, .right-thumb').bind('mouseenter', function(){
		var that = $(this);
		var lg_thumb = that.children('.lg-thumb');
		
		setTimeout(function(){
			lg_thumb.animate({ opacity: 1});
			that.css({ zIndex: 2 });
			that.animate({ width: 590 }, 800);
		}, 500);
				
	});
	
	$('.left-thumb, .right-thumb').bind('mouseleave', function(){
		var that = $(this);
		var lg_thumb = that.children('.lg-thumb');
		
		lg_thumb.animate({ opacity: 0});
		that.css({ zIndex: 0 });
		that.animate({ width: 190 });
		
	});
	
	$('.center-thumb').bind('mouseenter', function(){
		var that = $(this);
		var lg_thumb = that.children('.lg-thumb');
		var sm_thumb = that.children('.sm-thumb');
		
		setTimeout(function(){
			lg_thumb.animate({ opacity: 1});
			that.css({ zIndex: 2 });
			that.animate({ width: 590, left: 0 }, 800);
			sm_thumb.animate({ left: 200 }, 800);
		}, 500);
				
	});
	
	$('.center-thumb').bind('mouseleave', function(){
		var that = $(this);
		var lg_thumb = that.children('.lg-thumb');
		var sm_thumb = that.children('.sm-thumb');
		
		lg_thumb.animate({ opacity: 0});
		that.css({ zIndex: 0 });
		that.animate({ width: 190, left: 200 });
		sm_thumb.animate({ left: 0 });
		
	});
	
});