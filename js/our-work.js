/*
 *
 * JS Specifics for the Our-Work List and Detail View Pages
 * Author: Zeunic
 *
 */

// Filter Quicksand list by custom tags	
filterProjects = function(tag){
	$('#data li[data-type=search]').remove();
	$.ajax({
		url: baseUrl+'/index.php/site/getprojectsbytag/tag/'+tag,
		cache: false,
		success: function(response){
			$('#data').append(response);
			$('.button-row a[data-value=search]').trigger('click');
		}
	});
};

$(function(){

	// Definte Portfolio Display list, Fill it with data from #data li list (populated later from DB)
	var portfolioDisplay = $('.portfolio_display');
	$('.portfolio_display').quicksand( $('#data li') );
	
	//Quicksand Preferences
	var $preferences = {
		duration: 800
		, easing: 'easeOutQuad'
		, adjustHeight: 'dynamic'
		, attribute: 'data-id'
		, useScaling: true
	};

	// Filter Function when toggling between top 4 tag filters
	$('.button-row a').not('#searchbutton').bind('click', function(){
		
		$('.selected').toggleClass('selected'); // grab the selected filter, and turn it off.
		
		var that = $(this);
		that.toggleClass('selected'); // make this the current selected filter
		
		var filter = that.attr('data-value'),
			dataList = $('#data')
		;
		
		//remove searched elements
		if (filter != 'search'){
			$('#data li[data-type=search]').remove();
		}
		
		// Gather elements from the dataList based on the filter type
		// so that QuickSand can be used on the #portfolio_display
		if (filter == 'all') {
			var $displayData = dataList.find('li');
		} else {
			var $displayData = dataList.find('li[data-type=' + filter + ']');
		}
		
		portfolioDisplay.quicksand($displayData, $preferences);
		
		// add in AJAX calls to repopulate #data
		
		return false;
	});
	
	//Searchbutton onClick event
	$('#searchbutton').bind('click', function(){
		filterProjects($(this).siblings('input').val());
	});
	
	// Hover event binding
	$('.portfolio_display li').live('mouseenter', function(){
		
		if (zeunic.portfolio) {
			clearTimeout( zeunic.portfolio.timeout );
		}
	
		var that = $(this),
			parentOffset = that.parent('.portfolio_display').offset(),
			offset = that.offset(),
			col = Math.floor( (offset.left - parentOffset.left) / 200 ),
			thumbSrc = that.children().children('img').attr('data-extended'),
			thumbHref = that.children('a').attr('href');
		;
		
		zeunic.portfolio = {}
		
		zeunic.portfolio.col = col;
		zeunic.portfolio.top = offset.top - 177;
		zeunic.portfolio.src = thumbSrc;
		zeunic.portfolio.timeout = setTimeout( extendThumbnail, 600 );
		zeunic.portfolio.href = thumbHref;
		
		var extThumb = $('.extend-thumb');
		extThumb.children('a').attr({href:zeunic.portfolio.href}).children('img').attr({ src: baseUrl + '/images/projects/thumbs/' + zeunic.portfolio.src });
		
		return false;
	});
	
	$('.portfolio_display li').live('mouseleave', function(){
		if (zeunic.portfolio) {
			clearTimeout( zeunic.portfolio.timeout );
		}
	});
	
	// Hover leave for .extend-thumb
	$('.extend-thumb').live('mouseleave', function(){
		var that = $(this),
			src = String(that.find('img').attr('src')); //,
			//parent = $('.portfolio_display li a img[data-extended="' + src.substring(src.indexOf('thumbs/')+7,src.length) +'"]').parent().parent();
			
		switch( zeunic.portfolio.col ) {
			case 0: 
				that.animate({opacity: 0, width:0}, 300);
				break;
			case 1: 
				that.animate({opacity: 0, width: 0, left: 295},300);
				break;
			case 2: 
				that.animate({opacity: 0, width: 0, left: 590},300);
				break;
		}
		// $(this).animate({ opacity: 0, width: 0 }, 300);
	});
	
	var extendThumbnail = function() {
		var extThumb = $('.extend-thumb');
		extThumb.css({ top: zeunic.portfolio.top, display: 'block', zIndex: 900 });
		
		switch( zeunic.portfolio.col ) {
			case 0:
				extThumb.css({ left: 0, width: 190 }).animate({ width: 588, opacity: 1 }, { queue: false });
				break;
			case 1:
				extThumb.css({ left: 190, width: 190 }).animate({ width: 588, left: 0, opacity: 1}, { queue: false });
				break;
			case 2:
				extThumb.css({ left: 400, width: 190 }).animate({ width: 588, opacity: 1, left: 0}, { queue: false });
				break;
		}
	}
	
	var search = $('#search');
	
	//AUTOCOMPLETE FUNCTIONALITY
	search.autocomplete({
		source: tags,
		select: function(event, ui){
			filterProjects(ui.item.value);
		}
	});
});
