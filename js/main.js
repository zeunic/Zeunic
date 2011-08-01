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
	
	var moveActiveLink = function(section) {
		if(typeof section === "object") {
			var that = section,
			parent = that.parent(),
			pos =  (parent.position().left - 38) + 'px 0px';
			nav.find('.active').removeClass('active');
			parent.addClass('active');
			$('#nav h1').text(that.attr('title'));
			navContainer.animate({ 'background-position' : pos });
			return;
		} else if (typeof section === "string") {
			var rc = section.substr(20, section.length).split('/', 2);			
			if(rc[0] == 'site') {
				switch (rc[1]) {
					case 'portfolio' :
						var section = $('#portfolio a');
						break;
					case 'about' :
						var section = $('#about a');
						break;
					case 'blog' :
						var section = $('#blog a');
						break;
					case 'contact' :
						var section = $('#contact a');
						break;
					case 'login' :
						var section = $('#login a');
						break;
				}
				
				moveActiveLink(section);
			}
			
		}
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
		// used to show that links clicking are being fired twice
		// not sure why but this could be a bug later
		
		var that = $(this);
		
		//Don't use AJAX for admin links
		if(that.parents('#admin').length > 0){
			return true;
		}
		
		// Don't use default AJAX for blog links
		// if (that.attr('href').substring(0,26) == 'http://www.zeunic.com/blog') {
		if (that.attr('href').indexOf('zeunic.com/blog') != -1) {
			getBlogContent(that.attr('href'));
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
		  		// if its not a nav link, but local and the ajax was a success
		  		// pass the href to the moveActiveLink function to determine which
		  		// appropriate section to activate
		  		if(that.parents('#nav').length == 0){
		  			moveActiveLink(that.attr('href'));
		  		}
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
				if(html.indexOf('<!-- portfolio -->') > -1){
					var timeoutLength = 1000;
				} else var timeoutLength = 500;
				// console.log(timeoutLength);
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
	
	var getBlogContent = function(ajaxUrl){
		// swapMainContent('<h1>Blog Post Incoming</h1>');
		
		if(ajaxUrl.indexOf('?') != -1) {
			ajaxUrl += "&json=1";
		} else {
			ajaxUrl += '?json=1';
		}
		
		$.ajax({
			url: ajaxUrl,
			cache: false,
			sucess: function(json){
				swapMainContent( buildPostHtml(json) );
			}
		});
		
		return false;
	}
	
	var buildPostHtml = function(json) {
		
		var postHtml = '';
	
		if (json.post) {
			// display one post
			postHtml = "<!-- Display the Title as a link to the Post's permalink. -->"
				+ '<h2><a href="' + json.post.url + '" rel="bookmark" title="'+ json.post.title +'" target="new">'+ json.post.title +'</a></h2>'
				+ "<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->"
				+ '<small>' + json.post.date + ' by <a href="http://zeunic.com/blog/?author=' + json.post.author.id + '" title="Posts by '+ json.post.author.name +'" rel="author">' + json.post.author.name + '</a></small>';
				+ "<!-- Display the Post's Content in a div box. -->"
			/*	
			<div class="entry">
			   <p>We had a lot of fun developing this site, we poured a lot of energy in to it over the last few weeks of development. As much time as we could spare outside client work and tying up loose ends for our flagship projects. (which start in August!) The last few weeks we logged no fewer than 8 afternoons that bled in to realizing it was 7am again and time for breakfast at Subway.</p>
			<p>Version 1 of Zeunic is hosted on its own VPS that allows us to maintain version control with Git. (as well as automatic deploying to different environments with git hooks!) We also tackled the project in a framework new to us, and decided to take Yii out for a spin. We were quite impressed with the framework, and can’t wait to tap in to it’s real abilities on future projects. In addition to that we implemented both a Javascript Ajax version as well as a No-JS alternative.</p>
			<p>We also took our own branding out for a test drive with its a new aesthetic campaign we’re calling Amp, and we updated all of our social media sites with the new look.</p>
			<p>We’re looking forward to continuing to improve on our skills and methods, so that we can keep delivering the best we can for our clients and ourselves. Over the next few days we’ll be making small adjustments here and there; adding new features and content – a lot of which we’re very excited about.</p>
			<p>Look forward to it, the momentum is building up and (despite the physical exhaustion) the energy levels are high!</p>

			<!-- Display a comma separated list of the Post's Categories. -->
			<p class="postmetadata">Posted in <a href="http://zeunic.com/blog/?cat=1" title="View all posts in Uncategorized" rel="category" target="new">Uncategorized</a></p>
			</div> */
		} else if (json.posts) {
			// loop posts
		} else {
			postHtml = '<h2>Unable to fetch that request.</h2>'
				+ '<p>Please try reloading <a href="http://zeunic.com/blog">http://zeunic.com/blog</a> if you feel this message was displayed in error.</p>';
		}
	
		return postHtml;
	}
	
});
