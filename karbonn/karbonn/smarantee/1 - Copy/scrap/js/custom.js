//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(window).scrollTop() > 50) {        
        $(".navbar-default").addClass("navbar-fixed-top");
    }
    if ($(window).scrollTop() > 0) {         
        $(".formbg").addClass("form-fixed");
    }
    if ($(window).scrollTop() < 10) {
        $(".navbar-default").removeClass("navbar-fixed-top");
        $(".formbg").removeClass("form-fixed");
    }
});

(function ($) {
    'use strict';

    jQuery(document).ready(function () {
        new WOW().init();
    });
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $(document).on('click', 'a.page-scroll', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
$(document).ready(function(){
    $("#aboutcourse").click(function(){
        $("#about-details").fadeIn("slow");
        $("#benefits-details").css("display","none");
        $("#CM-details").css("display","none");

        $("#aboutcourse .buttons").css('background','#f06b1f');
        $("#benefits .buttons").css('background','#514f4d');
        $("#CM .buttons").css('background','#514f4d');
        
    });
    $("#benefits").click(function(){
        $("#benefits-details").fadeIn("slow");
        $("#about-details").css("display","none");
        $("#CM-details").css("display","none");

        $("#aboutcourse .buttons").css('background','#514f4d');
        $("#benefits .buttons").css('background','#f06b1f');
        $("#CM .buttons").css('background','#514f4d');
    });
    $("#CM").click(function(){
        $("#CM-details").fadeIn("slow");
        $("#about-details").css("display","none");
        $("#benefits-details").css("display","none");
        
        $("#aboutcourse .buttons").css('background','#514f4d');
        $("#benefits .buttons").css('background','#514f4d');
        $("#CM .buttons").css('background','#f06b1f');
    });
});