$(function(){
	
	$('.jcrop').Jcrop({
		aspectRatio: 590/180,
		minSize: [590,180]
	});
	
	$('.saveThumb').bind('click', function(){
		that = $(this);
		var crop = $(this).siblings('div').children('div');
		src = $(this).siblings('img').attr('src');
		thetop = crop.position().top;
		left = crop.position().left;
		width = crop.width();
		height = crop.height();
		period = src.lastIndexOf('.');
		filename = src.substring(src.lastIndexOf('/')+1, period);
		fileext = src.substring(period, src.length);
		src = fullUrl+'/images/projects/gallery/'+filename+fileext;
		$.ajax({
			url: baseUrl+'/index.php/project/savethumb',
			type: 'POST',
			data: 'src='+src+'&top='+thetop+'&left='+left+'&width='+width+'&height='+height+'&filename='+filename+'&fileext='+fileext,
			success: function(response){
				that.parent().append('<span class="saved"> Saved!</span>');
				setTimeout(function(){
					$('.saved').remove();
				}, 5000);
			}
		});
		return false;
	});
});
