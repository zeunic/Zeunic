$(function(){ 
	// -- Login Page Form Submit Capture
	
	$('#admin .row.submit a').bind('click', function(){
		$('#login_form').submit();
		return false;
	});
	
});