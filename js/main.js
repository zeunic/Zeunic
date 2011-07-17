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
	});
});