/*================
 Template Name: AppCo App Landing Page Template
 Description: AppCo is app and product landing page template.
 Version: 1.0
 Author: https://themeforest.net/user/themetags
=======================*/

// TABLE OF CONTENTS
// 1. fixed navbar
// 2. page scrolling feature - requires jQuery Easing plugin
// 3. closes the responsive menu on menu item click
// 4. magnify popup video
// 5. client testimonial slider
// 6. Screenshots slider
// 7. custom counter js with scrolling
// 8. client-testimonial one item carousel
// 9. our clients logo carousel
// 10. our clients logo carousel
// 11. wow js


jQuery(function ($) {

    'use strict';
 
  

    // 9. our clients logo carousel
    $('.clients-carousel').owlCarousel({
        autoplay: true,
        loop: true,
        rtl:true,
        margin:15,
        dots:true,
        slideTransition:'linear',
        autoplayTimeout:4500,
        autoplayHoverPause:true,
        autoplaySpeed:4500,
        responsive:{
            0:{
                items:2
            },
            500: {
                items:3
            },
            600:{
                items:4
            },
            800:{
                items:5
            },
            1200:{
                items:6
            }

        }
    })

    $('.header-carousel').owlCarousel({
        items: 1,
        animateOut: 'fadeOut',
        loop: true,
        autoplay:true,
        margin: 10,
        rtl:true,
        margin:40,
        stagePadding:30,
        smartSpeed:450,
        responsive:{
            0:{
                items:1
            },
            500: {
                items:1
            },
            600:{
                items:1
            },
            800:{
                items:1
            },
            1200:{
                items:1
            }

        }
    });



slideShow();
//Actually define the slideShow()
function slideShow(){
  
  //*** Conditional & Variables ***//
  
    //Define the current img
    var current = $('#slider .show');
    //If index != 0/false then show next img
  var next = current.next().length ? 
      current.next() :
      // if index == false then show first img
      current.siblings().first();
  
   //*** Swap out the imgs and class ***//
   current.hide().removeClass('show');
   next.fadeIn("slow").addClass('show');
  
  
  //*** Repeat function every 3 seconds ***//
  setTimeout(slideShow, 4000);
  
};
  

 
 

}); // JQuery end