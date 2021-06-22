/*********************************************************************************

	Template Name: DEVA-EYE-WEAR - DEVA-EYE-WEAR Bootstrap 4 Template
	Version: 1.0
	Developer: TAKKIE EDDINE HALIMI © Copyright, ALL Rights Are Reserved.
	Email: takkie8halimi@gmail.com.
	Corporation: HALIMI INDUSTRIES. 
 
**********************************************************************************/

/**************************************************************
	        
		|_MAIN JS INDEXING
		|
		|___ Preloader
		|___ Mobile Menu
		|___ Product Details Images 
		|___ Quick View Modal
		|___ Slider Activation
		|___ Scroll Up Activation
		|
		|___ END MAIN JS INDEXING

***************************************************************/


(function ($) {
	'use strict';

        /*------------------
             Preloader
        --------------------*/
	    $(window).on('load', function () {
		$(".loader").fadeOut();
		$("#preloder").delay(200).fadeOut("slow");
	    });
	    

	/*----------------------------------
		09. Mobile Menu
	------------------------------------*/

	$('nav.mainmenu__nav').meanmenu({
		meanMenuClose: 'X',
		meanMenuCloseSize: '18px',
		meanScreenWidth: '991',
		meanExpandableChildren: true,
		meanMenuContainer: '.mobile-menu',
		onePage: true
	});
	
	
	/*----------------------------------
		14. Product Details Images 
	------------------------------------*/

	$('.product-details-images').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		dots: false,
		infinite: true,
		centerMode: true,
		centerPadding: 0,
		prevArrow: '<span class="slider-navigation slider-navigation-prev"><i class="fa fa-caret-left"></i></span>',
		nextArrow: '<span class="slider-navigation slider-navigation-next"><i class="fa fa-caret-right"></i></span>',
		asNavFor: '.product-details-thumbs'
	});
	$('.product-details-thumbs').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		dots: false,
		infinite: true,
		focusOnSelect: true,
		centerMode: true,
		centerPadding: 0,
		prevArrow: '<span class="slider-navigation slider-navigation-prev"><i class="fa fa-caret-left"></i></span>',
		nextArrow: '<span class="slider-navigation slider-navigation-next"><i class="fa fa-caret-right"></i></span>',
		asNavFor: '.product-details-images'
	});

	/*----------------------------------
		15. Quick View Modal 
	------------------------------------*/
        
	$('.close-quickview-modal').on('click', function(){
		$('.quick-view-modal').removeClass('is-visible');
	});


	/*----------------------------------
		16. Slider Activation
	------------------------------------*/

	$('.slide_active').slick({
		dots: true,
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear',
		slidesToShow: 1,
  		slidesToScroll: 1,
	  });



	/*----------------------------------
		17. Scroll Up Activation
	------------------------------------*/

	$.scrollUp({
		scrollText: '<i class="fa fa-angle-up"></i>',
		easingType: 'linear',
		scrollSpeed: 900,
		animation: 'slide'
	});

})(jQuery);
