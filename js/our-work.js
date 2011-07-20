/*
 *
 * JS Specifics for the Our-Work List and Detail View Pages
 * Author: Zeunic
 *
 */


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
	$('.button-row a').bind('click', function(){
		$('.selected').toggleClass('selected'); // grab the selected filter, and turn it off.
		
		var that = $(this);
		that.toggleClass('selected'); // make this the current selected filter
		
		var filter = that.attr('data-value'),
			dataList = $('#data')
		;
		
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
	
	// Hover event binding
	$('.portfolio_display li').live('mouseenter', function(){
		var that = $(this),
			parentOffset = that.parent('.portfolio_display').offset(),
			offset = that.offset(),
			col = Math.floor( (offset.left - parentOffset.left) / 200 ),
			thumbSrc = that.children('img').attr('data-extended')
		;
		
		extendThumbnail(col, offset.top - 177 , thumbSrc);
		
		return false;
	});
	
	// Hover leave for .extend-thumb
	$('.extend-thumb').live('mouseleave', function(){
		$(this).animate({ opacity: 0, width: 0 }, 300);
	});
	
	var extendThumbnail = function(col, row, src) {
		var extThumb = $('.extend-thumb'); //.clone().appendTo('.our-work');
		extThumb.children('img').attr({ src: baseUrl + '/images/thumbs/' + src });
		
		extThumb.css({ top: row, display: 'block', zIndex: 900 });
		
		switch( col ) {
			case 0:
				extThumb.css({ left: 0, width: 190 }).animate({ width: 590, opacity: 1 }, { queue: false });
				break;
			case 1:
				extThumb.css({ left: 190, width: 190 }).animate({ width: 590, left: 0, opacity: 1}, { queue: false });
				break;
			case 2:
				extThumb.css({ left: 400, width: 190 }).animate({ width: 590, opacity: 1, left: 0}, { queue: false });
				break;
		}
		
		// extThumb.css({ top: row, display: 'block', zIndex: 50 }).animate({ opacity: 1 });
	}

});