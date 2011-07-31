zeunic = {};
zeunic.logo = {};

$(function(){ 

	$('footer').find('q').tweets({
		tweets: 1,
		username: "zeunic"
	});

	// nav links functionality
	var navLinks = $('nav li a'),
		navContainer = $('#main-nav'),
		nav = $('#nav'),
		activePage = $('#main-nav .active');
	
	$('nav a#logo').bind('click', function(){
		navContainer.animate({ backgroundPosition: '-40px 0' });
		nav.find('.active').removeClass('active');
		nav.find('h1').text('welcome');
	});

	navLinks.bind('mouseenter', function(){
		$('nav h1').text( $(this).attr('title') );
	});
	
	navLinks.bind('mouseleave', function(){
		var def = $('#nav').find('.active a').text();
		def = (!def)? 'welcome' : def;
		$('nav h1').text( def );
	});
	
	var moveActiveLink = function(obj) {
		var that = obj,
		parent = that.parent(),
		pos =  (parent.position().left - 38) + 'px 0px';
		nav.find('.active').removeClass('active');
		parent.addClass('active');
		navContainer.animate({ 'background-position' : pos });
	}
	
	navLinks.bind('click', function(){
		moveActiveLink($(this));
	});
	
	navContainer.css({ backgroundPosition: '-40px 0px' });
	
	// if the page was loaded directly without ajax, this code will animate the active
	// background image, the delay is to avoid being 5px off because the document ready
	// fires before the negative margin is applied (i think)
	setTimeout(function(){
		if (activePage.length != 0) {
			moveActiveLink(activePage.children('a'));
		}
	}, 500);
	
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
	
	//Open external links in a new browser window
	$('a').not('a[href*="localhost"]').not('a[href^="/"]').attr('target', 'new');
	
	//Dynamic AJAX Navigation
	$('a[href*="localhost"], a[href*="zeunic.com"], a[href^="/"]').live('click', function(e){
		var that = $(this);
		//Don't use AJAX for admin links
		if(that.parents('#admin').length > 0){
			return true;
		}
		
		// Don't use default AJAX for blog links
		if (that.attr('href').substring(0,26) == 'http://www.zeunic.com/blog') {
			getBlogContent();
			return false;
		}
		
		//Grab current HREF
		var ajaxLink = that.attr('href');
		//If it ends with a /, get rid of it
		if(ajaxLink.substring(ajaxLink.length-1, ajaxLink.length) == '/'){
			ajaxLink = ajaxLink.substring(0, ajaxLink.length-1);
		}
		//If it ends in a number, the number is an ID so Ajax must be placed before the last slash OR if the link has a ?, same thing goes NOTE: make sure to pass variables with a / before the ? in order to properly add the Ajax text
		if(Number(ajaxLink.substring(ajaxLink.length-1, ajaxLink.length)) || Number(ajaxLink.substring(ajaxLink.length-1, ajaxLink.length)) == 0 || ajaxLink.lastIndexOf('?') > 0){
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
				swapMainContent(html);
		  }
		});
		return false;
	});
	
	var swapMainContent = function(html) {
		$('#main').animate({opacity:0, queue:false}, 500, function(){
				container = $('#container');
				
				var bodyHeight = container.css('height');
				
				container.css({height:bodyHeight});
				
				var main = $(this);
				
				var h1 = $('#nav').find('h1').text();
				$('head title').text('Zeunic :: ' + h1);
				main.html(html);
				//Open external links in a new browser window
				$('a').not('a[href*="localhost"]').not('a[href^="/"]').attr('target', 'new');
				if(html.indexOf('<!-- portfolio -->' > -1)){
					var timeoutLength = 1000;
				} else var timeoutLength = 500;
				console.log(timeoutLength);
				setTimeout(function(){
					main.animate({opacity:1,queue:false}, 500);
					contentHeight = $('#content').css('height');
					container.animate({height:contentHeight}, 1000, 'easeInOutQuad', function(){
						container.css({height:'auto'});
						$('#content #nav').stickyfloat({ duration: 900, tartOffset: 200, offsetY: 0 });
					});
				}, timeoutLength);
				
				
				$('.loader').remove();
			});
	}
	
	
	var getBlogContent = function(){
		swapMainContent('<h1>Blog Post Incoming</h1>');
		
		return false;
	}
	
});
