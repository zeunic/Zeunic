zeunic = {};
zeunic.logo = {};

$(function(){ 

	$('nav li a').bind('mouseenter', function(){
		$('nav h1').text( $(this).attr('title') );
	});
	
	$('nav li a').bind('mouseleave', function(){
		var def = $('#nav').find('.active').text();
		def = (!def)? 'welcome' : def;
		$('nav h1').text( def );
	});

	$('footer').find('q').tweets({
		tweets: 1,
		username: "zeunic"
	});
	
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
	
	// Logo Flicker & Hover Animation
	var logo = $('#logo');
	logo.bind('mouseenter', function(){
		if(zeunic.logo) {
			clearInterval( zeunic.logo.interval );
		}
		logo.children('img').stop().animate({opacity: 1});
	});
	logo.bind('mouseleave', function(){
		zeunic.logo.interval = setInterval(logoPulse, 10000);
		logo.children('img').animate({opacity: 0});
	});
	var logoPulse = function(){
	
		if(!zeunic.logo.interval) {
			return false;
		}
	
		$('#logo img').animate({ opacity: 1 }, 1750, function(){
			$(this).animate({opacity: 0}, 1750);
		});
	}
	
	zeunic.logo.interval = setInterval(logoPulse, 10000);
	
	// Navigation StickyFloat
	$('#content #nav').stickyfloat({ duration: 900, tartOffset: 200, offsetY: 0 });
	
	//AJAX Navigation
	$('a').live('click', function(){
		var that = $(this);
		if(that.attr('data-external') != true){
			var linkID = that.parent().attr('id');
			console.log(linkID);
			var ajaxLink = that.attr('href');
			if(ajaxLink.substring(ajaxLink.length-1, ajaxLink.length) == '/'){
				ajaxLink = ajaxLink.substring(0, ajaxLink.length-1);
			}
			ajaxLink = ajaxLink + 'Ajax';
			console.log(ajaxLink);
			$.ajax({
			  url: ajaxLink,
			  cache: false,
			  success: function(html){
			  	$('#main').animate({opacity:0}, 1000, function(){
			  		var nav = $('#nav');
			  		nav.find('.active').removeClass('active');
			  		nav.find('#'+linkID).addClass('active');
			    	$('#main').html(html).animate({opacity:1}, 1000);
			  	});
			  }
			});
			return false;
		}
	});
	/*
$('#nav').find('#about').live('click',function(){
		$.ajax({
		  url: baseUrl + "/index.php/site/aboutAjax",
		  cache: false,
		  success: function(html){
		  	$('#main').animate({opacity:0}, 1000, function(){
		  		$('#nav').find('.active').removeClass('active').parent().find('#about').addClass('active');
		    	$('#main').html(html).animate({opacity:1}, 1000);
		  	});
		  }
		});
		return false;
	});
*/
	
});