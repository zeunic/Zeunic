//
(function($){

	$.fn.zSlide = function(options) {
	
		if(typeof options === 'string'){
			return this.data('zSlide_api')[arguments[0]](arguments[1]);
		};
	
		options = $.extend({
			duration: 800,
			easing: 'swing',
			direction: 'horizontal',
			items: 1,
			loop: true,
			page: 0,
			transition: 'slide'
		}, options);

		return this.each(function(){
		
			// Initialization
			var that = $(this),
				filmstrip = that.children('ul'),
				items = filmstrip.children('li'),
				page = options.page,
				blocks = Math.ceil(items.length / options.items) - 1,
				fwidth = (options.direction==='horizontal') ? options.width * (blocks+1) : options.width,
				fheight = (options.direction==='horizontal') ? options.height : options.height * (blocks+1),
				nextBtn = $(options.next),
				backBtn = $(options.back),
				api = {}
			;
			
			if(page > blocks) {
				page = blocks;
			} else if (page < 0) {
				page = 0;
			};
			
			that.css({
				overflow: 'hidden',
				position: (that.css('position') === 'static') ? 'relative' : that.css('position'),
			});
			
			filmstrip.css({
				position: 'absolute',
				top: (options.direction==='horizontal') ? 0 : -(page*options.height),
				left: (options.direction==='horizontal') ? -(page*options.width) : 0,
				listStyle: 'none',
				margin: 0,
				padding: 0,
				width: fwidth,
				height: fheight,
				display: 'block'
			});
			
			items.css({
				float: 'left'
			});
			
			if(options.loop===false && page >= blocks) {
					nextBtn.css({visibility: 'hidden'})
			};
			
			if(options.loop===false && page <= 0) {
					backBtn.css({visibility: 'hidden'})
			};
			
			// Events & Interaction
			
			var anim = function() {
				if(options.transition==='slide') {
					var ao = (options.direction==='horizontal') ? { left: -(page * options.width) } : { top: -(page * options.height) };
					filmstrip.stop(true).animate(ao, options.duration, options.easing);
				} else if (options.transition==='fade') {
					// (options.direction==='horizontal') ? : 
					if(options.direction==='horizontal') {
						filmstrip
							.stop(true)
							.animate({opacity: 0}, options.duration/2, options.easing, function(){
								filmstrip
									.css({left: -(page*options.width)})
									.animate({opacity:1}, options.duration/2, options.easing)
								;
							})
						;
					} else {
						filmstrip
							.stop(true)
							.animate({opacity: 0}, options.duration/2, options.easing, function(){
								filmstrip
									.css({top: -(page*options.height)})
									.animate({opacity:1}, options.duration/2, options.easing)
								;
							})
						;
					}
				}
			};
			
			var nextfn = function(e){
				if(page < blocks) {
					page++;
				} else { 
					if (options.loop === true) {
						page = 0
					};
				};
				
				if(options.loop === false && page >= blocks) {
					nextBtn.animate({opacity: 0}, options.duration, function(){
						nextBtn.css({visibility: 'hidden'});
					});
				};
				
				if(options.loop===false) {
					backBtn
						.css({visibility: 'visible'})
						.animate({opacity:1}, 200)
					;
				}
				
				if(options.slider) {
					$(options.slider).slider('value', page)
				}
				
				anim();
				
				(e)?e.preventDefault():false;
			};
			
			var backfn = function(e){
				if(page > 0) {
					page--;
				} else { 
					if (options.loop === true) {
						page = blocks
					};
				};
				
				if(options.loop===false && page <= 0) {
					backBtn.animate({opacity: 0}, options.duration, function(){
						backBtn.css({visibility: 'hidden'});
					});
				};
				
				if(options.loop===false) {
					nextBtn
						.css({visibility: 'visible'})
						.animate({opacity:1}, 200)
					;
				};
				
				if(options.slider) {
					$(options.slider).slider('value', page)
				}
				
				anim();
				
				(e)?e.preventDefault():false;
			};
			
			$(nextBtn).bind('click', nextfn);
			$(backBtn).bind('click', backfn);
			
			
			// API Slideshow Mode
			
			if(options.slideshow) {
				var ss = {};
				
				ss.o = options.slideshow;
				ss.pause = ss.o.pause + options.duration;
				
				ss.t = 0;
				ss.i = setInterval(function(){
					ss.t += ss.pause;
					(ss.o.direction=='next') ? nextfn() : backfn();
					
					if(ss.t > ss.o.duration && ss.o.duration !== 0){
						// console.log('called clear');
						// clearInterval(ss.i);
					}
					
				}, ss.pause);
					
			};
			
			
			// Expose Public API
			
			api.next = nextfn;
			api.back = backfn;
			
			api.get = function(){
				return {
					page: page,
					max: blocks,
					options: options
				};
			};
			
			api.go = function(n){
				if(n > page) {
					page = n-1;
					nextfn();
				} else if(n < page) {
					page = n+1;
					backfn();
				};
			};
			
			that.data('zSlide_api', api);
		
		}); // end return each
	}; // end function zSlide

})(jQuery);