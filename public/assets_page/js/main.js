$(document).ready(function() {
  "use strict";

  PageLoad();

  $('.chat-list-item .avatar,.chat-list-item .chat-bttn').on('click', function() {
      $('.chat-content').addClass('mobile-active');
      return false;
    });

  $('.back-chat-div').on('click', function() {
    $('.chat-content').removeClass('mobile-active');
    return false;
  });

  $('.fab').on('click', function() {
    $(this).toggleClass('open');
    $('.option').toggleClass('open');
    $('.close').toggleClass('open');
  })

  $('#floating-button').on('click', function() {
    $(this).closest('#container-floating').toggleClass('is-opened');
    $('.nds').removeClass('is-opened');
    $('body').toggleClass('is-blur');
  })

    $('.nds').on('click', function() {
      $('.nds').not(this).removeClass('is-opened');
      $(this).toggleClass('is-opened');
    })

  $('.emoji-bttn').on('click', function() {
      $(this).parent().find('.emoji-wrap').toggleClass('active');
      return false;
  });

  $('#sidebar-right').on('click', function() {
      $('.perspective').addClass('animate');
      return false;
  });
  $('#close-sidebar').on('click', function() {
      $('.perspective').removeClass('animate');
      return false;
  });

  $('.add').on('click', function() {
      if ($(this).prev().val() < 3) {
        $(this).prev().val(+$(this).prev().val() + 1);
      }
  });
  $('.sub').on('click', function() {
      if ($(this).next().val() > 1) {
        if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
      }
  });

  $('[data-toggle="tooltip"]').tooltip()

  
  
  $('.blog-story-slider').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    autoplay:true,  
    dots:true,
    items:3
  })

  $('.slider-1').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    autoplay:false,  
    dots:true,
    items:1
  })

  

  $('.chatlist').owlCarousel({
      loop:false,
      margin:5,
      nav:false,
      autoplay:true,  
      dots:false,
      responsive:{
          0:{
              items:6
          },
          600:{
              items:6
          },
          1000:{
              items:6
          },
          1400:{
              items:3
          }
      }
  })
  
  
  
});

function PageLoad() {
  jQuery(window).on("load", function(){
        setInterval(function(){ 
            $('.preloader-wrap').fadeOut(300);
        }, 400);
        setInterval(function(){ 
            $('body').addClass('loaded');
        }, 600); 
  });
}

 
 



var love = setInterval(function() {
    var r_num = Math.floor(Math.random() * 40) + 1;
    var r_size = Math.floor(Math.random() * 15) + 10;
    var r_left = Math.floor(Math.random() * 100) + 1;
    var r_bg = Math.floor(Math.random() * 25) + 100;
    var r_time = Math.floor(Math.random() * 5) + 5;

    $('.bg_heart').append("<div class='heart' style='width:" + r_size + "px;height:" + r_size + "px;left:" + r_left + "%;background:rgba(255," + (r_bg - 25) + "," + r_bg + ",1);-webkit-animation:love " + r_time + "s ease;-moz-animation:love " + r_time + "s ease;-ms-animation:love " + r_time + "s ease;animation:love " + r_time + "s ease'></div>");

    $('.bg_heart').append("<div class='heart' style='width:" + (r_size - 10) + "px;height:" + (r_size - 10) + "px;left:" + (r_left + r_num) + "%;background:rgba(255," + (r_bg - 25) + "," + (r_bg + 25) + ",1);-webkit-animation:love " + (r_time + 5) + "s ease;-moz-animation:love " + (r_time + 5) + "s ease;-ms-animation:love " + (r_time + 5) + "s ease;animation:love " + (r_time + 5) + "s ease'></div>");

    $('.heart').each(function() {
        var top = $(this).css("top").replace(/[^-\d\.]/g, '');
        var width = $(this).css("width").replace(/[^-\d\.]/g, '');
        if (top <= -100 || width >= 150) {
            $(this).detach();
        }
    });
}, 500);