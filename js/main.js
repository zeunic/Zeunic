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
	
	//Fade in hover class
	$('a').live('mouseover',function(){
		$(this).animate({color:'#B90226'}, 1000).bind('mouseleave', function(){
			$(this).animate({color:'#EC1559'}, 1000);
		});
	});
	
	//Open external links in a new browser window
	$('a').not('a[href*="localhost"]').not('a[href^="/"]').attr('target', 'new');
	
	//Dynamic AJAX Navigation
	$('a[href*="localhost"], a[href^="/"]').live('click', function(){
		var that = $(this);
		if(that.parents('#admin').length > 0){
			return true;
		}
		var linkID = that.parent().attr('id');
		var ajaxLink = that.attr('href');
		if(ajaxLink.substring(ajaxLink.length-1, ajaxLink.length) == '/'){
			ajaxLink = ajaxLink.substring(0, ajaxLink.length-1);
		}
		if(Number(ajaxLink.substring(ajaxLink.length-1, ajaxLink.length))){
			//GENERATE ID AJAX LINK
			slashIndex = ajaxLink.lastIndexOf('/');
			id = ajaxLink.substring(slashIndex, ajaxLink.length);
			ajaxLink = ajaxLink.substring(0, slashIndex) + 'Ajax' + id;
		} else {
			//GENERATE NORMAL AJAX LINK
			ajaxLink = ajaxLink + 'Ajax';
		}
		$.ajax({
		  url: ajaxLink,
		  cache: false,
		  success: function(html){
			$('#main').animate({opacity:0, queue:false}, 500, function(){
				container = $('#container');
				var bodyHeight = $('#container').css('height');
				container.css({height:bodyHeight});
				var nav = $('#nav');
				var main = $(this);
				nav.find('.active').removeClass('active');
				if(linkID){
					nav.find('#'+linkID).addClass('active');
				} else {
					nav.find('#portfolio').addClass('active');
				}
				var h1 = $('#nav').find('h1').text();
				$('head title').text('Zeunic :: ' + h1);
				main.html(html);
				//Open external links in a new browser window
				$('a').not('a[href*="localhost"]').not('a[href^="/"]').attr('target', 'new');
				setTimeout(function(){
					main.animate({opacity:1,queue:false}, 500);
				}, 500);
				contentHeight = $('#content').css('height');
				container.animate({height:contentHeight}, 1000, 'easeInOutQuad', function(){
					container.css({height:'auto'});
					$('#content #nav').stickyfloat({ duration: 900, tartOffset: 200, offsetY: 0 });
				});
			});
		  }
		});
		return false;
	});
	
});
