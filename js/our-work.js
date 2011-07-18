/*
 *
 * JS Specifics for the Our-Work List and Detail View Pages
 * Author: Zeunic
 *
 */


$(function(){

	$('.button-row a').bind('click', function(){
		$(this).toggleClass('selected');
		// add in AJAX calls to repopulate #data
		return false;
	});

	$('#portfolio_display').quicksand( $('#data li') );

});