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
			dataList = $('#data');
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
		var that = $(this);
		console.log(that);
	});

});