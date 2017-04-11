// Animate window on nav bar click
jQuery(document).on('click', '.genesis-nav-menu li', function(){
	var that = jQuery(this),
	section = that.find('a').attr('href');
	var offsetTop = jQuery(section).offset().top;
	jQuery('.nav-wrapper').removeClass('active');
	jQuery('body, html').animate({
		'scrollTop': offsetTop
	}, 500);
	return false;
});

// Animate window on footer nav clicks
jQuery(document).on('click', '.menu li', function(){
	var that = jQuery(this),
	section = that.find('a').attr('href');
	var offsetTop = jQuery(section).offset().top;
	jQuery('body, html').animate({
		'scrollTop': offsetTop
	}, 500);
	return false;
});

// Menu Toggle
jQuery(document).on('click', '.mobile_menu', function(){
	jQuery('.nav-wrapper').toggleClass('active');
	return false;
});

// Making the social links open in new tab
jQuery(document).ready(function(){
	jQuery('.menu li a[title=Facebook], .menu li a[title=Instagram]').attr('target', '_blank');
});

// Hide certain nav elements on inner pages
jQuery(document).ready(function(){
	jQuery('body:not(.home) a[href="#testimonials"], body:not(.home) a[href="#about"]').parent().addClass('hidden_elements');
});

// Creating wrapper for the footer menu
jQuery(document).ready(function(){
	jQuery('.footer-widgets-3 > section').wrapAll('<div class="wrapper" />');
});

jQuery(window).load(function(){
	jQuery('.jr-insta-thumb').jcarousel({
		
	})
        .jcarouselAutoscroll({
            interval: 3000,
            target: '+=1',
            autostart: true
        });
});