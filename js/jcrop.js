$(function(){
	
	$('.jcrop').Jcrop({
		aspectRatio: 590/180,
		minSize: [590,180]
	});
	
	$('.saveThumb').bind('click', function(){
		var that = $(this);
		var crop = that.siblings('div').children('div');
		src = that.siblings('img').attr('src');
		top = crop.css('top');
		left = crop.css('left');
		width = crop.css('width');
		height = crop.css('height');
		period = src.lastIndexOf('.');
		filename = src.substring(src.lastIndexOf('/')+1, period);
		fileext = src.substring(period, src.length);
		src = fullUrl+'/images/projects/gallery/'+filename+fileext;
		console.log(src);
		console.log(top);
		console.log(left);
		return false;
	});
});
