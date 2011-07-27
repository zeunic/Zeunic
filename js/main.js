zeunic = {};
zeunic.logo = {};

$(function(){ 
	// nav links functionality
	var navLinks = $('nav li a'),
		navContainer = $('#main-nav'),
		nav = $('#nav');
		
	navContainer.css({ backgroundPosition: '-40px 0px' });

	navLinks.bind('mouseenter', function(){
		$('nav h1').text( $(this).attr('title') );
	});
	
	navLinks.bind('mouseleave', function(){
		var def = $('#nav').find('a.active').text();
		def = (!def)? 'welcome' : def;
		$('nav h1').text( def );
	});

	$('footer').find('q').tweets({
		tweets: 1,
		username: "zeunic"
	});
	
	navLinks.bind('click', function(){
		var that = $(this),
			parent = that.parent(),
			pos =  (parent.position().left - 38) + 'px 0px';
		nav.find('.active').removeClass('active');
		parent.addClass('active');
		console.log(pos);
		console.log(navContainer);
		console.log(navContainer.css('background-position'));
		navContainer.animate({ 'background-position' : pos });
		
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
	
	//Open external links in a new browser window
	$('a').not('a[href*="localhost"]').not('a[href^="/"]').attr('target', 'new');
	
	//Dynamic AJAX Navigation
	$('a[href*="localhost"], a[href^="/"]').live('click', function(){
		var that = $(this);
		if(that.parents('#admin').length > 0){
			return true;
		}
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
		
		// loader gif init
		$('#nav').append('<div class="loader">loading...</div>');
		var position = $('#nav h1').position();
		$('.loader').css({ top: position.top+45, left: position.left+50 });
		
		$.ajax({
		  url: ajaxLink,
		  cache: false,
		  success: function(html){
			$('#main').animate({opacity:0, queue:false}, 500, function(){
				container = $('#container');
				var bodyHeight = $('#container').css('height');
				container.css({height:bodyHeight});
				var main = $(this);
				
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
				
				$('.loader').remove();
			});
		  }
		});
		return false;
	});
	
});
