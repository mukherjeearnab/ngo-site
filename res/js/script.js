$(document).ready(function() {

    /*For sticky navigation */
    $('.js--section-features').waypoint(function(direction){
        if(direction == "down"){
            $('nav').addClass('sticky');
        }else{
            $('nav').removeClass('sticky');
        }

        }, {
             offset: '60px'
    });
    
    /*Scroll on button */
    $('.js--scroll-to-plans').click(function () {
        console.log('im pressed!');
        $('html, body').animate({scrollTop: $('.js--section-plans').offset().top}, 1000);
    });

    $('.js--scroll-to-start').click(function () {
        console.log('im pressed!');
        $('html, body').animate({scrollTop: $('.js--section-features').offset().top}, 1000);
    });


/*Naviation Scroll* */

    // Select all links with hashes
$('a[href*="#"]')
// Remove links that don't actually link to anything
.not('[href="#"]')
.not('[href="#0"]')
.click(function(event) {
  // On-page links
  if (
    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
    && 
    location.hostname == this.hostname
  ) {
    // Figure out element to scroll to
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    // Does a scroll target exist?
    if (target.length) {
      // Only prevent default if animation is actually gonna happen
      event.preventDefault();
      $('html, body').animate({
        scrollTop: target.offset().top
      }, 1000, function() {
        // Callback after animation
        // Must change focus!
        var $target = $(target);
        $target.focus();
        if ($target.is(":focus")) { // Checking if the target was focused
          return false;
        } else {
          $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
          $target.focus(); // Set focus again
        };
      });
    }
  }
});

//Animations on scroll*/
$('.js--section-features').waypoint(function(direction){
    
    $('.js--wp-1').addClass('animated fadeIn');
}, {
        offset: '300px'
})

$('.js--section-steps').waypoint(function(direction){
    
    $('.js--wp-2').addClass('animated fadeInUp');
}, {
        offset: '400px'
})

$('.js--section-cities').waypoint(function(direction){
    
    $('.js--wp-3').addClass('animated fadeIn');
}, {
        offset: '400px'
})

$('.js--section-plans').waypoint(function(direction){
    
    $('.js--wp-4').addClass('animated pulse');
}, {
        offset: '400px'
})

/*MOBILE NAV*/

$('.js--nav-icon').click(function(){
  let nav = $('.js--main-nav');
  let icon =$('.js-nav-icon i');

  nav.slideToggle(200);

  if(icon.hasClass('ion-navicon-round')){
    icon.addClass('ion-close-round');
    icon.removeClass('ion-navicon-round')
  }else{
    icon.removeClass('ion-close-round');
    icon.addClass('ion-navicon-round')
  }


});



});

'use strict';

$(function() {

  //settings for slider
  var width = $(".slide").width();
  var animationSpeed = 1000;
  var pause = 3000;
  var currentSlide = 1;

  //cache DOM elements
  var $slider = $('#slider');
  var $slideContainer = $('.slides', $slider);
  var $slides = $('.slide', $slider);
  //console.log($slides);

  var interval;

  function startSlider() {
    interval = setInterval(function() {
      $slideContainer.animate({
        'margin-left': '-=' + width
      }, animationSpeed, function() {
        if (++currentSlide === $slides.length) {
          currentSlide = 1;
          $slideContainer.css('margin-left', 0);
        }
      });
    }, pause);
  }

  function pauseSlider() {
    clearInterval(interval);
  }

  $slideContainer
    .on('mouseenter', pauseSlider)
    .on('mouseleave', startSlider);

  startSlider();
});
