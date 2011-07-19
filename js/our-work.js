/*
 *
 * JS Specifics for the Our-Work List and Detail View Pages
 * Author: Zeunic
 *
 */


$(function(){

	var portfolioDisplay = $('.portfolio_display');
	
	$('.portfolio_display').quicksand( $('#data li') );

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
		
		portfolioDisplay.quicksand($displayData);
		
		// add in AJAX calls to repopulate #data
		
		return false;
	});

});