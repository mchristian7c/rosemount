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
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function


/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

	$('.tab-content.sub-page-content div:first').addClass('active');
	$('.tab-content.sub-page-content div:first').addClass('in');
	$('.tab-content.tab-nav-content div:first').addClass('active in');

	var divs = $(".concertina-column");
	for(var i = 0; i < divs.length; i+=3) {
		divs.slice(i, i+3).wrapAll("<div class='panel-group content-container' id='accordion'></div>");
	}
	//
	//
	//
	// $(".carousel").swipe({
	// 	swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
	// 		if (direction == 'left') $(this).carousel('next');
	// 		if (direction == 'right') $(this).carousel('prev');
	// 	},
	// 	allowPageScroll:"vertical"
	// });


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
























	// ----------------------------------

	// hanburger menu -
		// toggle class on click
		// remove class on click .ghost

	// ----------------------------------

	$(".navburger").click(function() {
		$(this).toggleClass("crossed");
		// setTimeout(function(){
			$(".the-blob").toggleClass("evergrowing");
   // },250)
		// setTimeout(function(){
			$(".the-blob-nav").toggleClass("showoff");
			$(".nav li").toggleClass("fadeInDown");
   // },300)
	 		setTimeout(function(){
				$('.navbar-logo img').toggleClass("light");
			},200);
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

	// smooth scroll

	// ----------------------------------

	// $(function() {
	// 	$('a[href*="#"]:not([href="#"])').click(function() {
	// 		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	// 			var target = $(this.hash);
	// 			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	// 			if (target.length) {
	// 				$('html, body').animate({
	// 					scrollTop: target.offset().top
	// 				}, 1000);
	// 				return false;
	// 			}
	// 		}
	// 	});
	// });

	// ----------------------------------

	// KEN BURNS

	// ----------------------------------


	// $('#kb').carousel({
	// 	interval: 1000
	// });
	$('#kb .item:first').addClass('active');
	$('#kb .button:first').addClass('active');

	// ----------------------------------

	// FLEX CAROUSEL

	// ----------------------------------


	// $('#kb').carousel({
	// 	interval: 1000
	// });
	$('#flex .item:first').addClass('active');
	$('#flex .button:first').addClass('active');

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


	// ----------------------------------

	// DELETE ALL BELOW THIS LINE

	// ----------------------------------


	$('.nav-tabs.sub-page-content li:first').addClass('active');
	$('.tab-content.sub-page-content div:first').addClass('active');
	$('.tab-content.sub-page-content div:first').addClass('in');




	// wrap divs in a div - freaking love this!
	var divs = $(".video-post-wrap");
	for(var i = 0; i < divs.length; i+=3) {
		divs.slice(i, i+3).wrapAll("<div class='row'></div>");
	}
	// wrap divs in a div - freaking love this!
	var divs = $(".media-post-wrap");
	for(var i = 0; i < divs.length; i+=3) {
		divs.slice(i, i+3).wrapAll("<div class='row media_row'></div>");
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
	$(".showtheform").click(function(){
	if($(".theform").is(':hidden')){
		$(".theform").slideDown(500);
	}else{
		$(".theform").slideUp(500);
	}
});
});



	// $(function() {                       //run when the DOM is ready
	//   $(".video-copy.mobile").click(function() {  //use a class, since your ID gets mangled
	//     $(this).addClass("active");      //add the class to the clicked element
	// 		setTimeout(RemoveClass, 2000);
	//   });
	// 	function RemoveClass() {
	// 	$('.video-copy.mobile').removeClass("active");
	// 	}
	// });

 $(".navmenu .nav li").addClass("animated slideInRight");

 $(".navbar-toggle").click(function() {
     $(this).toggleClass("crossed");
   });

	 $("#ghost").click(function() {
			 $('.navbar-toggle').removeClass("crossed");
		 });

// $('.item').matchHeight();



	$('#app').carousel({
		interval: 3000
	});

	$('#app .item:first').addClass('active');
	// $('#kb-fw .item:first').addClass('active');
	$( "div[id^='kb-fw']").find('.item:first' ).addClass('active');
	//
	// var itemCount = jQuery("#kb-fw_0 .carousel-inner .item").length;
  // if(itemCount > 1){jQuery('#kb-fw_0 .carousel-control').show();}
  // else{jQuery('#kb-fw_0 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_1 .carousel-inner .item").length;
  // if(itemCount > 1){jQuery('#kb-fw_1 .carousel-control').show();}
  // else{jQuery('#kb-fw_1 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_2 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_2 .carousel-control').show();}
	// else{jQuery('#kb-fw_2 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_3 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_3 .carousel-control').show();}
	// else{jQuery('#kb-fw_3 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_4 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_4 .carousel-control').show();}
	// else{jQuery('#kb-fw_4 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_5 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_5 .carousel-control').show();}
	// else{jQuery('#kb-fw_5 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_6 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_6 .carousel-control').show();}
	// else{jQuery('#kb-fw_6 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_7 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_7 .carousel-control').show();}
	// else{jQuery('#kb-fw_7 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_8 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_8 .carousel-control').show();}
	// else{jQuery('#kb-fw_8 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_9 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_9 .carousel-control').show();}
	// else{jQuery('#kb-fw_9 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_10 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_10 .carousel-control').show();}
	// else{jQuery('#kb-fw_10 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_11 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_11 .carousel-control').show();}
	// else{jQuery('#kb-fw_11 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_12 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_12 .carousel-control').show();}
	// else{jQuery('#kb-fw_12 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_13 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_13 .carousel-control').show();}
	// else{jQuery('#kb-fw_13 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_14 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_14 .carousel-control').show();}
	// else{jQuery('#kb-fw_14 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_15 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_15 .carousel-control').show();}
	// else{jQuery('#kb-fw_15 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_16 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_16 .carousel-control').show();}
	// else{jQuery('#kb-fw_16 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_17 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_17 .carousel-control').show();}
	// else{jQuery('#kb-fw_17 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_18 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_18 .carousel-control').show();}
	// else{jQuery('#kb-fw_18 .carousel-control').hide();}
	//
	// var itemCount = jQuery("#kb-fw_19 .carousel-inner .item").length;
	// if(itemCount > 1){jQuery('#kb-fw_19 .carousel-control').show();}
	// else{jQuery('#kb-fw_19 .carousel-control').hide();}

	// Fixes the prev/next links of the sliders
	//// MYSTERIOUSLY CAUSING CAROUSEL TO SKIP SLIDES
	// $('.carousel-control.left').click(function() {
	//   $('#kb').carousel('prev');
	// });
	//
	// $('.carousel-control.right').click(function() {
	//   $('#kb').carousel('next');
	// });
	//





$(window).resize(function(){

	$('.className').css({
		position:'absolute',
		left: ($(window).width() - $('.className').outerWidth())/2,
		top: ($(window).height() - $('.className').outerHeight())/2
	});

});
// To initially run the function:
$(window).resize();



  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();


}); /* end of as page load scripts */

$( window ).load(function() {

		// ----------------------------------
				// sticky footer
		//-----------------------------------

	// find height of footer and apply CSS for sticky footer
	var boot= $('.footer').outerHeight();
	var four= $(window).height();
	// var smallboot= boot-10;
	$(".wrapper").css('padding-bottom', boot);
	$(".footer").css('margin-top', -boot);
	// $(".fourohfour").css('padding-top', '140px');
	// $(".fourohfour").css('height', (four-boot)-140);
});
