$(function(){
	$('#gallery').zSlide({
		direction: 'horizontal',
		width: 590,
		duration: 1800,
		height: 180,
		easing: 'easeOutQuad',
		transition: 'fade',
		slideshow: {
			duration: 800,
			pause: 4000,
			direction: 'next'
		}
	});
});