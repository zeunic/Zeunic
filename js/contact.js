$(function(){
	$('textarea').autoResize({
	    // Quite slow animation:
	    animateDuration : 300,
	    // More extra space:
	    extraSpace : 20,
	    limit: 999999999
	}).bind('click', function(){
		$(this).trigger('keyup');
	});;
	
	$('#ContactForm_name').bind('blur', function(){
		var name = $(this).val();
		var sig = $('#signature');
		if(name == ''){
			sig.html('Thanks.').animate({height:30},300);
		} else {
			sig.animate({height:70}, 300).html('Thanks,<br />'+name);
		}
	});
	
	$('#submit').bind('click', function(){
		var form = $('#contactform');
		name = form.find('#ContactForm_name').val();
		contact = form.find('#ContactForm_email').val();
		body = form.find('#ContactForm_body').val();
		var submitURL = baseUrl+'/index.php/site/contactAjax';
		$.ajax({
			url: submitURL,
			type: 'POST',
			data: 'ContactForm[name]='+name+'&ContactForm[email]='+contact+'&ContactForm[body]='+body,
			dataType: 'html',
			success: function(response){
				$('#main').animate({opacity:0, queue:false}, 500, function(){
					main = $(this);
					main.html(response);
					$('#contactsuccess').find('address:first').html(name+'<br />'+contact);
					setTimeout(function(){
						main.animate({opacity:1,queue:false}, 500, function(){
							var success = $('#contactsuccess');
							//animate contact form out!
							if(success.length > 0){
								setTimeout(function(){
									var bezier_params = {
									start: { 
									  x: 0, 
									  y: 0, 
									  angle: 0
									},  
									end: { 
									  x:500,
									  y:-750, 
									  angle: 150, 
									  length: -1.5
									}
								  }
																	$('#main').css({overflow:'visible'}).parent().css({overflow:'visible'}); success.animate({path: new $.path.bezier(bezier_params)}, 2500, function(){
															 $('#main').css({overflow:'hidden'}).parent().css({overflow:'hidden'}).remove('#contactsuccess'); 
								 });
								}, 2000);
							 }
						});
					}, 500);
				});
			}
		});
		return false;
	});
});
