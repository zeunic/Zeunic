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
		
		$('#portfolio_display').quicksand( $('#data li'), 
			{ adjustHeight: 'dynamic'
			 , attribute: function(v) { console.log( $(v) ); return $(v).find('li').attr('data-id'); }
             , duration: 750
             , easing: 'swing'
             , useScaling: true
			}); // end quicksand()
		
		return false;
	});

	$('#portfolio_display').quicksand( $('#data li') );

});