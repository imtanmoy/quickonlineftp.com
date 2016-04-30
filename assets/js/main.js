$(document).ready(function() {


    /*----------------------------------------------------*/
    /*  Navigation Scroll
     /*----------------------------------------------------*/
    //$(window).scroll(function() {
    //    var scroll = $(window).scrollTop();
    //    var window_width = $(window).width();
    //    if (scroll >= 300 ) {
    //        $(".navbar").addClass("navbar-fixed-top");
    //    } else {
    //        $(".navbar").removeClass("navbar-fixed-top");
    //    }
    //});

        marqueeInit({
            uniqueid: 'mycrawler',
            style: {
                'padding': '0px',
                'width': '100%',
                'height': '320px'
            },
            inc: 7, //speed - pixel increment for each iteration of this marquee's movement
            mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
            moveatleast: 2,
            neutral: 150,
            savedirection: true,
            random:true
        });

    /*
     JavaScript For Responsive Bootstrap Carousel

     Author: Razboynik
     Author URI: http://filwebs.ru
     Description: Bootstrap Carousel Effect Ken Burns

     */

    $(function ($) {

        /*-----------------------------------------------------------------*/
        /* ANIMATE SLIDER CAPTION
         /* Demo Scripts for Bootstrap Carousel and Animate.css article on SitePoint by Maria Antonietta Perna
         /*-----------------------------------------------------------------*/
        "use strict";
        function doAnimations(elems) {
            //Cache the animationend event in a variable
            var animEndEv = 'webkitAnimationEnd animationend';
            elems.each(function () {
                var $this = $(this),
                    $animationType = $this.data('animation');
                $this.addClass($animationType).one(animEndEv, function () {
                    $this.removeClass($animationType);
                });
            });
        }
        //Variables on page load
        var $immortalCarousel = $('.animate_text'),
            $firstAnimatingElems = $immortalCarousel.find('.item:first').find("[data-animation ^= 'animated']");
        //Initialize carousel
        $immortalCarousel.carousel();
        //Animate captions in first slide on page load
        doAnimations($firstAnimatingElems);
        //Other slides to be animated on carousel slide event
        $immortalCarousel.on('slide.bs.carousel', function (e) {
            var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
        });



    })(jQuery);





});



