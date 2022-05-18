/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/



/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

	var userAgent = navigator.userAgent.toLowerCase();
		if((navigator.userAgent.indexOf("IE") != -1 ) || (!!document.documentMode == true )){
		$('body').addClass('msie');
	}
	var userAgent = navigator.userAgent.toLowerCase();
		if((window.navigator.userAgent.indexOf("Edge/") != -1 ) || (!!document.documentMode == true )){
		$('body').addClass('msie');
	}


	$(function() {
		$('a.smooth[href*="#"]:not([href="#"])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html, body').animate({
						scrollTop: target.offset().top - 100
					}, 1000);
					return false;
				}
			}
		});
	});

	$(".carousel").swipe({
		swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
			if (direction == 'left') $(this).carousel('next');
			if (direction == 'right') $(this).carousel('prev');
		},
		allowPageScroll:"vertical"
	});

	$(window).scroll(function () {
		$(".hero").css("background-position","right " + ($(this).scrollTop() / 2) + "px");
		$(".page-hero.legals").css("background-position","right " + ($(this).scrollTop() / 2) + "px");
	});

	$('#carousel-home .carousel-item:first').addClass('active');
	$('.carousel-wrapper .button:first').addClass('active');

	$('#carousel-home-mob .carousel-item:first').addClass('active');
	$('.carousel-wrapper.mob .carousel-indicators.desk .button:first').addClass('active');
	$('.carousel-wrapper.mob .carousel-indicators.mobile .button:first').addClass('active');

	$( "div[id^='carousel-']").find('.carousel-item:first' ).addClass('active');




















	// ----------------------------------

	// hanburger menu -
		// toggle class on click
		// remove class on click .ghost

	// ----------------------------------

	$(".navburger").click(function() {
		$(this).toggleClass("crossed");
		// setTimeout(function(){
			$(".the-blob").toggleClass("evergrowing");
			$("body").toggleClass("fix-me");

   // },250)
		// setTimeout(function(){
			$(".the-blob-nav").toggleClass("showoff");
			$(".nav li").toggleClass("fadeInDown");
			$('.blob-content.container').removeClass("zoom");
			$('.blob-content.container').addClass("opaque");
			$('.blob-hidden').addClass("opaque");
			$('.blob-hidden').removeClass("mooz");

   // },300)
	});


	$(".contact-blob .linkwrap a").click(function(e) {
		$('.blob-content.container').addClass("zoom");
		$('.blob-hidden').addClass("mooz");
		e.preventDefault();
	});

	$(".contact-form-wrapper .linkwrap.left a").click(function(e) {
		$('.blob-content.container').removeClass("zoom");
		$('.blob-hidden').removeClass("mooz");
		e.preventDefault();
	});


	$(".linkwrap.deets a").click(function(e) {
		e.preventDefault();
		$(".navburger").addClass("crossed");
		$(".the-blob").addClass("evergrowing");
		$("body").addClass("fix-me");
		$(".the-blob-nav").addClass("showoff");
		// setTimeout(function(){
			$('.blob-content.container').addClass("zoom");
			$('.blob-hidden').addClass("mooz");
			$('.blob-hidden').addClass("opaque");
		// },250)
	});


	$(".nav li").toggleClass("animated");

	$(".ghost").click(function() {
		$('.navbar-toggle').removeClass("crossed");
	});

	// ----------------------------------

	// shrink navigation on scroll

	// ----------------------------------

	$(window).scroll(function () {
			//if you hard code, then use console
			//.log to determine when you want the
			//nav bar to stick.
	console.log($(window).scrollTop())
		if ($(window).scrollTop() >= 100) {
			$('.header').addClass('shrink');
		}
		if ($(document).scrollTop() <= 0) {
			$('.header').removeClass('shrink');
		}
	});


	// ----------------------------------

	// BOOTSTRAP CAROUSEL - NOT REQUIRED?

	// ----------------------------------

	// $('#kb .item:first').addClass('active');
	// $('#kb .button:first').addClass('active');


	$(window).resize(function(){

		$('.className').css({
			position:'absolute',
			left: ($(window).width() - $('.className').outerWidth())/2,
			top: ($(window).height() - $('.className').outerHeight())/2
		});

	});
	// To initially run the function:
	$(window).resize();

	// ----------------------------------

	// BLOG ARCHIVE ROW WRAPPER

	// ----------------------------------

	// wrap divs in a div - freaking love this!
	var divs = $(".blog-archive");
	for(var i = 0; i < divs.length; i+=3) {
		divs.slice(i, i+3).wrapAll("<div class='blog-archive-row'></div>");
	}

	$("[data-toggle='toggle']").click(function() {
	    var selector = $(this).data("target");
	    $(selector).toggleClass('in');
	});

	$(".keys").click(function() {  //use a class, since your ID gets mangled
		$(this).toggleClass("plusminus");      //add the class to the clicked element
	});

	$(function(){
		$(".contact.keys").click(function(){
		if($(".moblink").is(':hidden')){
			$(".moblink").slideDown(500);
		}else{
			$(".moblink").slideUp(500);
		}
	});
});



	$(function(){
		$(".keys").on("click", function(e){
			e.preventDefault();
			$(this).toggleClass("rot");
			if($(".moblink").is(':hidden')){
				$(".moblink").slideDown(500);
			}else{
				$(".moblink").slideUp(500);
			}
		});
	});


$('.match').matchHeight();

}); /* end of as page load scripts */

$( window ).on("load", function() {

	var quote_col = $('.title_column').height();
	var measured = $('.measured').height();
	var float_quote = $('.float_quote').height();
	var quote_marg = (((quote_col - measured)/2)-(float_quote/2));
	$('.float_quote').css('margin-top',Math.abs(quote_marg)+"px");

});
