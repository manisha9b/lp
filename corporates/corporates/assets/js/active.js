/*
***************************************************************
***************************************************************

Template Name  : HealthCare - Onepage Health and Medical Business Template
Author         : Golam
Author URI     : http://golamnabi.com
File           : Active.js

***************************************************************
***************************************************************/

(function ($) {
    "use strict";
    var allFunctions = {
        $window: $(window),
        customFuctions: {
            init: function () {
                allFunctions.customFuctions.sliderAnimate(),
                allFunctions.customFuctions.accordion(),
                allFunctions.customFuctions.sectionScroll(),
                allFunctions.customFuctions.stickyMenu()
            },
            sliderAnimate: function () {
                function doAnimate(attr) {
                    //Cache the animationend event in a variable
                    var animateEnd = 'webkitAnimationEnd animationend';
                    attr.each(function () {
                        var $this = $(this),
                            $animationName = $this.data('animation');
                        $this.addClass($animationName).one(animateEnd, function () {
                            $this.removeClass($animationName);
                        });
                    });
                }
                //Variables on page load 
                var $carousel = $('#slider_wrapper'),
                    $animateElements = $carousel.find('.item:first').find("[data-animation ^= 'animated']");

                //Initialize carousel 
                $carousel.carousel(1000);

                //Animate captions in first slide on page load 
                doAnimate($animateElements);

                //Pause carousel  
                //$carousel.carousel('pause');

                //Other slides to be animated on carousel slide event 
                $carousel.on('slide.bs.carousel', function (e) {
                    var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
                    doAnimate($animatingElems);
                });
            },
            accordion: function () {
                // Accordion Js
                $(".panel-collapse").on('shown.bs.collapse', function () {
                    $(this).parent().find('.fa-plus').removeClass('fa-plus').addClass('fa-minus');
                }).on('hidden.bs.collapse', function () {
                    $(this).parent().find('.fa-minus').removeClass('fa-minus').addClass('fa-plus');
                });
            },
            stickyMenu: function () {
                $(".main-menu-area").sticky({
                    topSpacing: 0,
                    className: 'sticky',
                    responsiveWidth: true,
                    zIndex: 999
                });
            },
            sectionScroll: function () {
                var scroll = $(".section-scroll"),
                    scrollTwo = $(".slide-btn");
                scroll.on("click", function (e) {
                    var $anchor = $(this),
                        offsetTop = 45;
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top - offsetTop + "px"
                    }, 1200, 'easeInOutExpo');
                    e.preventDefault();
                    
                });
                var body = $('body');
                body.scrollspy({
                    target: '.navbar-collapse',
                    offset: 95
                });
                $(document).on('click', '.navbar-collapse.in', function (e) {
                    if ($(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle') {
                        $(this).collapse('hide');
                    }
                });
                scrollTwo.on("click", function (e) {
                    var $anchor = $(this),
                        offsetTop = 45;
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top - offsetTop + "px"
                    }, 1200, 'easeInOutExpo');
                    e.preventDefault();
                    
                });
                
            },
            sitePreloader: function () {
                var preloader = $('.site-preloader-area');
                preloader.fadeOut(500, function(){
                    $('.preloader-body').delay(500).fadeOut();
                });
            }
        },
        pluginFunctions: {
            init: function () {
                allFunctions.pluginFunctions.counter(),
                allFunctions.pluginFunctions.parallax(),
                allFunctions.pluginFunctions.popup(),
                allFunctions.pluginFunctions.wowAnimation(),
                allFunctions.pluginFunctions.videoPlayer()
            },
            counter: function () {
                if($.fn.counterUp){
                    var count =  $('.single-counter h2');
                    count.counterUp({
                        delay: 10,
                        time: 1500
                    });
                }
            },
            parallax: function () {
                allFunctions.$window.stellar({
                    horizontalScrolling: false,
                    positionProperty: 'position',
                    responsive: true
                });
            },
            popup: function () {
                if ($.fn.magnificPopup) {
                    var popup = $(".popup");
                    popup.magnificPopup({
                        type: 'image',
                        removalDelay: 300,
                        mainClass: 'mfp-with-zoom',
                        gallery: {
                            enabled: true
                        },
                        zoom: {
                            enabled: true, // By default it's false, so don't forget to enable it

                            duration: 300, // duration of the effect, in milliseconds
                            easing: 'ease-in-out', // CSS transition easing function

                            // The "opener" function should return the element from which popup will be zoomed in
                            // and to which popup will be scaled down
                            // By defailt it looks for an image tag:
                            opener: function (openerElement) {
                                // openerElement is the element on which popup was initialized, in this case its <a> tag
                                // you don't need to add "opener" option if this code matches your needs, it's defailt one.
                                return openerElement.is('a') ? openerElement : openerElement.find('a');
                            }
                        }
                    });
                }
            },
            wowAnimation: function () {
                new WOW().init();
            },
            videoPlayer: function () {
                if($.fn.YTPlayer){
                    $(".player").YTPlayer();
                }
            }  
        },
        sliderFunctions: {
            init: function () {
                allFunctions.sliderFunctions.teamSlider(),
                allFunctions.sliderFunctions.testimonialSlider()
            },
            teamSlider: function () {
                if($.fn.owlCarousel){
                    var teamSlides = $(".doctors-info");
                    teamSlides.owlCarousel({
                        items: 4, // Default is 3
                        loop: true,
                        margin: 10,
                        autoplay: true,
                        autoplayTimeout: 3000, // Default is 5000
                        smartSpeed: 1000, // Default is 250
                        dots: false,
                        nav: true,
                        navText: [
							'<i class="icofont icofont-double-left"></i>',
							'<i class="icofont icofont-double-right"></i>'
							],
                        responsive: {
                            1200: {
                                items: 4
                            },
                            992: {
                                items: 3
                            },
                            768: {
                                items: 2
                            },
                            320: {
                                items: 1
                            },
                            480: {
                                items: 2
                            }
                        }
                    });
                }
            },
            testimonialSlider: function () {
                if($.fn.owlCarousel){
                    var testimonialSlide = $(".testimonial-content");
                    testimonialSlide.owlCarousel({
                        items: 1, // Default is 3
                        loop: true,
                        autoplay: true,
                        animateIn: 'zoomIn',
                        animateOut: 'zoomOut'
                    });
                }
            }
        },
        googleMap: function () {
            function map_init() {
                var lat = 19.105674, // Put your latitude Number here and
                    log = 72.887431, // Put your longitude Number here
                    mapOptions = {
                        zoom: 14,
                        center: new google.maps.LatLng(lat, log), // New York
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        scrollwheel: false,
                        styles: [{
                            "stylers": [{
                                    "hue": "#121212"
}, {
                                    saturation: -100
},
                                {
                                    gamma: 3
}]
}]
                    },
                    mapElement = document.getElementById('map'),
                    map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                new google.maps.Marker({
                    position: new google.maps.LatLng(lat, log),
                    map: map,
                    icon: ' '
                });
            }
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', map_init);
        },
        ajaxForms: {
            ajaxFormHandle: function (f) {
                f.on("submit", function (e) {
                    e.preventDefault();
												$(".submit_btn_div").hide();
			$(".loader").show();
                    var a = $(this),
                        b = a.find('msg-box');
                    $.ajax({
                        url: a.attr('action'),
                        type: 'POST',
                        data: a.serialize(),
                        success: function (data) {
                            setTimeout(function () {
                                $(".msg-box").html('<div class="alert alert-msg alert-dismissible" role="alert">' + data + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-times"></i></button></div>');
                                $(".form-control").val('');
                            }, 200 * f);
								$(".submit_btn_div").show();
			$(".loader").hide();
                        }
                    });
                });
            },
            contact: function () {
                $(".contact-form").each(function () {
                    allFunctions.ajaxForms.ajaxFormHandle($(this).find('form'));
                });
            }
        }
        
    }
    
    
    $(window).on('load', function () {
        allFunctions.customFuctions.sitePreloader();
    });
    
    $(document).ready(function () {
        allFunctions.customFuctions.init();
        allFunctions.pluginFunctions.init();
        allFunctions.sliderFunctions.init();
        allFunctions.ajaxForms.contact();
        allFunctions.googleMap();
    });
    
})(jQuery);

