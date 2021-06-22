/*********************************************************************************

	Template Name: DEVA-EYE-WEAR - DEVA-EYE-WEAR Bootstrap 4 Template
	Version: 1.0
	Developer: TAKKIE EDDINE HALIMI © Copyright, ALL Rights Are Reserved.
	Email: takkie8halimi@gmail.com.
	Corporation: HALIMI INDUSTRIES. 

**********************************************************************************/

/**************************************************************
	
	|_STYLESHEET INDEXING
	|
	|___ Preloader
	|___ Background Set
	|___ Product Slider
	|___ Product Single Slider
	|___ Slick Slider
	|___ Single Product
	|
	|___ END STYLESHEET INDEXING

***************************************************************/

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    
    /*------------------
        Product Slider
    --------------------*/
   $(".product-slider").owlCarousel({
        loop: true,
        margin: 25,
        nav: true,
        items: 4,
        dots: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            320: {
                items: 2,
            },
            750: {
                items: 3,
            },
            1200: {
                items: 3,
            }
        }
    });

    /*-----------------------
       Product Single Slider
    -------------------------*/
    $(".ps-slider").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        items: 3,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });
    
    /*------------------
       Single Product
    --------------------*/
	$('.product-thumbs-track .pt').on('click', function(){
		$('.product-thumbs-track .pt').removeClass('active');
		$(this).addClass('active');
		var imgurl = $(this).data('imgbigurl');
		var bigImg = $('.product-big-img').attr('src');
		if(imgurl != bigImg) {
			$('.product-big-img').attr({src: imgurl});
			$('.zoomImg').attr({src: imgurl});
		}
	});
	 
})(jQuery);
