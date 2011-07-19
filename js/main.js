$(function(){ 

	$('nav li a').bind('mouseenter', function(){
		$('nav h1').text( $(this).attr('title') );
	});
	
	$('nav li a').bind('mouseleave', function(){
		$('nav h1').text( $('nav li.active').text() );
	});

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
	
});