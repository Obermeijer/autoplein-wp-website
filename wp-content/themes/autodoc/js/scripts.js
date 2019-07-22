/*
| ----------------------------------------------------------------------------------
| TABLE OF CONTENT
| ----------------------------------------------------------------------------------
-BX CAROUSELS    
-Zoom Images  
-CAROUSEL 
-PRODUCTS  
-Isotope	  
-POST SLIDER  
-PARALAX   
-Disable Mobile Animated  
-Dropdown Menu Fade   
-Animated Entrances  
-SCROLL TOP  
-Tabs
*/
 

jQuery(document).ready(function($) {


    "use strict";

    /////////////////////////////////////////////////////////////////
    // SETTING
    /////////////////////////////////////////////////////////////////

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();

	function is_yellow_pencil() {
		if ($("body").hasClass("yp-yellow-pencil")) {
			return true;
		} else {
			return false;
		}
	}

    $('ul li:last-child').addClass('li-last');


    var windowWidth = $(window).width();
    var tabletWidth = 767;
    var mobileWidth = 640;
	
	
	    ////////////////////////////////////////////  
    //  Select box
    /////////////////////////////////////////// 



 if ($('.woocommerce-ordering  select').length > 0) {
$('.woocommerce-ordering  select').selectBox({
    mobile: true,
    menuSpeed: 'fast'
});
 }
 
  if ($('.widget_layered_nav   select').length > 0) {
     
$('.widget_layered_nav   select').selectBox({
    mobile: true,
    menuSpeed: 'fast'
});
  }

    /////////////////////////////////////
    //  BX CAROUSELS
    /////////////////////////////////////


    function carouselReload() {



        $(".bxslider").each(function(i) {


            var widthslides = $(this).data("width-slides");
            var marginslides = $(this).data("margin-slides");
            var autoslides = $(this).data("auto-slides");
            var moveslides = $(this).data("move-slides");
            var infiniteslides = $(this).data("infinite-slides");

            var maxslides = $(this).data("max-slides");
            var minslides = $(this).data("min-slides");



            $(this).bxSlider({
                slideWidth: widthslides,
                minSlides: minslides,
                maxSlides: maxslides,
                slideMargin: marginslides,
                auto: autoslides,
                moveSlides: moveslides,
                infiniteLoop: false,
                hideControlOnEnd: true
            });


            $('.bx-next').html(' <i class="fa fa-angle-right"></i>')
            $('.bx-prev').html(' <i class="fa fa-angle-left"></i>')

        });

    }



    carouselReload();



    /////////////////////////////////////
    //  Zoom Images
    /////////////////////////////////////

    $("a.magnific").magnificPopup({
        type: 'image'
    });

    $("#slider-product a").prettyPhoto();

    $("a.prettyphoto").prettyPhoto();




    $("a[rel^='prettyPhoto']").prettyPhoto();


    $(".prettyPhoto").prettyPhoto({

    });


    $(".video-popab").prettyPhoto({

    });

    $(".carousel-team   .media  a").prettyPhoto({

    });




    ////////////////////////////////////////////   
    // CAROUSEL PRODUCTS
    ///////////////////////////////////////////  



    if ($('#slider-product').length > 0) {


        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 107,
            itemMargin: 5,
            asNavFor: '#slider-product'
        });

        $('#slider-product').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel"
        });


    }


/*
	    if (windowWidth > 850) {
			
			
			  if ($('body').length) {
            $(window).on('scroll', function() {
                var winH = $(window).scrollTop();
                var $pageHeader = $('.layout-theme');
                if (winH > windowHeight - 20) {
                    $pageHeader.addClass('sicky');
                } else {
                    $pageHeader.removeClass('sicky');
                }
            });
        }

}*/



    /*Isotope*/


    if ($('#pix-portfolio  .isotope-filter').length > 0) {


        // or with jQuery
        var $container = $('.isotope-filter');
        // initialize Masonry after all images have loaded  
        $container.imagesLoaded(function() {
            $container.masonry();
        });


        $('#pix-portfolio .isotope-filter').isotope({
            itemSelector: '.isotope-item',
            resizesContainer: true
        });



        $('#pix-portfolio #filter a').click(function() {

            $('#pix-portfolio #filter a').removeClass('current');
            $(this).addClass('current');
            var selector = $(this).attr('data-filter');

            $('#pix-portfolio .isotope-filter').isotope({
                filter: selector,
                animationOptions: {
                    duration: 1000,
                    easing: 'easeOutQuart',
                    queue: false
                }
            });
            return false;

        });




    }




    /////////////////////////////////////
    // POST SLIDER
    /////////////////////////////////////


    $('.carousel-post').bxSlider({
        minSlides: 1, // item 5
        maxSlides: 1, // item 4
        slideWidth: 850,
        infiniteLoop: true,
        auto: true,
        hideControlOnEnd: true,
        nextSelector: '#slider-next',
        prevSelector: '#slider-prev',
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>'
    });




    ////////////////////////////////////////////  
    // PARALAX
    ///////////////////////////////////////////  

    $(window).scroll(function(e) {
        parallax();

    });

    function parallax() {
        var scrolled = $(window).scrollTop();
        $('.bg-section').css('top', -(scrolled * 0.3) + 'px');
    }




    if (windowWidth < mobileWidth) {


        /////////////////////////////////////
        //  Disable Mobile Animated
        /////////////////////////////////////


        $("body").removeClass("animated-css");




    }


    $('.animated-css .animated:not(.animation-done)').waypoint(function() {



        var animation = $(this).data('animation');

        $(this).addClass('animation-done').addClass(animation);

    }, {
        triggerOnce: true,
        offset: '90%'
    });




    /////////////////////////////////////////////////////////////////
    //   Dropdown Menu Fade 
    /////////////////////////////////////////////////////////////////




    $(".yamm .dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
            $(this).toggleClass('open');
        }
    );


    $(".yamm .navbar-nav>li").hover(
        function() {
            $('.dropdown-menu', this).fadeIn("fast");
        },
        function() {
            $('.dropdown-menu', this).fadeOut("fast");
        });




    window.prettyPrint && prettyPrint()
    $(document).on('click', '.yamm .dropdown-menu', function(e) {
        e.stopPropagation()
    })




    //////////////////////////////
    // Animated Entrances
    //////////////////////////////



    if (windowWidth > 1200) {


        $(window).scroll(function() {
            $('.animatedEntrance').each(function() {
                var imagePos = $(this).offset().top;

                var topOfWindow = $(window).scrollTop();
                if (imagePos < topOfWindow + 400) {
                    $(this).addClass("slideUp"); // slideUp, slideDown, slideLeft, slideRight, slideExpandUp, expandUp, fadeIn, expandOpen, bigEntrance, hatch
                }
            });
        });

    }




    /////////////////////////////////////
    //  SCROLL TOP
    /////////////////////////////////////


    if ($('body').length) {
        $(window).on('scroll', function() {
            var winH = $(window).scrollTop();

            if (winH > 500) {
                $(".scroll-top").addClass('scroll-top-view');
            } else {
                $(".scroll-top").removeClass('scroll-top-view');
            }
        });
    }


    $('.scroll-top').click(function(event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: 0
        }, 300);
    });




    /////////////////////////////////////
    //  Chars Start
    /////////////////////////////////////


    if ($('body').length) {
        $(window).on('scroll', function() {
            var winH = $(window).scrollTop();

            $('.featured-item-simple-icon').waypoint(function() {
                $('.chart').each(function() {
                    CharsStart();
                });
            }, {
                offset: '80%'
            });


        });
    }



    function CharsStart() {


        $('.chart').easyPieChart({

            barColor: false,
            trackColor: false,
            scaleColor: false,
            scaleLength: false,
            lineCap: false,
            lineWidth: false,
            size: false,
            animate: 7000,


            onStep: function(from, to, percent) {

                $(this.el).find('.percent').text(Math.round(percent));



            }
        });

    }


    /*Tabs*/

    $('.ver-tabs .nav > li a').hover(function() {
        $(this).tab('show');
    });
	

	
$(".ver-tabs .nav-sidebar  a").each(function(i) {
	var exHref = $(this).data('external-href');
	
	
	
	 if (windowWidth > 850) {
		 
		 
$(this).click(function(){
	

      $(location).attr('href', exHref);

});


}



	});
	

	 



});