/*
*   Edited by Joseph Lessard
*
*   Now limits the number of tweets correctly
*   Ditched before/after functionality
*   Finds following cite tag and places created_at
*	Added Time Ago functionality
*
*	jQuery Tweet v0.1
*	written by Diego Peralta
*
*	Copyright (c) 2010 Diego Peralta (http://www.bahiastudio.net/)
*	Dual licensed under the MIT (MIT-LICENSE.txt)
*	and GPL (GPL-LICENSE.txt) licenses.
*	Built using jQuery library 
*
*	Options:
*		- tweets (numeric): number of tweets to display.
*
*/

// from http://widgets.twimg.com/j/1/widget.js
var K = function () {
    var a = navigator.userAgent;
    return {
        ie: a.match(/MSIE\s([^;]*)/)
    }
}();
 
var H = function (a) {
    var b = new Date();
    var c = new Date(a);
    if (K.ie) {
        c = Date.parse(a.replace(/( \+)/, ' UTC$1'))
    }
    var d = b - c;
    var e = 1000,
        minute = e * 60,
        hour = minute * 60,
        day = hour * 24,
        week = day * 7;
    if (isNaN(d) || d < 0) {
        return ""
    }
    if (d < e * 7) {
        return "right now"
    }
    if (d < minute) {
        return Math.floor(d / e) + " seconds ago"
    }
    if (d < minute * 2) {
        return "about 1 minute ago"
    }
    if (d < hour) {
        return Math.floor(d / minute) + " minutes ago"
    }
    if (d < hour * 2) {
        return "about 1 hour ago"
    }
    if (d < day) {
        return Math.floor(d / hour) + " hours ago"
    }
    if (d > day && d < day * 2) {
        return "yesterday"
    }
    if (d < day * 365) {
        return Math.floor(d / day) + " days ago"
    } else {
        return "over a year ago"
    }
};

(function($){

	$.fn.tweets = function(options) {
		$.ajaxSetup({ cache: true });
		var defaults = {
			tweets: 5
		};
		var options = $.extend(defaults, options);
		return this.each(function() {
			var obj = $(this);
			$.getJSON('http://api.twitter.com/1/statuses/user_timeline.json?callback=?&screen_name='+options.username+'&count='+options.tweets,
		        function(data) {
		            $.each(data, function(i, tweet) {
		            	console.log('yellow');
		                if(typeof tweet.text == 'string') {
		                    obj.text(tweet.text);
		                    obj.siblings('cite').html(H(tweet.created_at)+' via '+tweet.source);
		                }
		            });
		        }
		    );
		});
	};
})(jQuery);