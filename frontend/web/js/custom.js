// For multi image slider


$(document).ready(function() {

    $('.items').slick({
        dots: true,
        infinite: true,
        speed: 800,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
});


// 3 Coulmn Slider

$(document).ready(function() {

    $('.3-col-items').slick({
        dots: true,
        infinite: true,
        speed: 800,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll:1
                }
            },
            {
                breakpoint: 580,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
});

$(document).ready(function() {

    $('.3-my-items').slick({
        dots: true,
        infinite: true,
        speed: 800,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll:1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
});




$(document).ready(function() {

    $('.2-col-items').slick({
        dots: true,
        infinite: true,
        speed: 800,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 2,
        slidesToScroll: 2,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
});


$(document).ready(function() {

    $('.4-col-items').slick({
        dots: true,
        infinite: true,
        speed: 800,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
});

//Sticky Navbar
$(document).ready(function(){
    $(window).scroll(function(){
        if($(window).scrollTop() > 135){
        $('#navbar').addClass("nav-sticky");
        }
        else{
        $('#navbar').removeClass("nav-sticky");
        }
    })
});


// JavaScript Document


// For Mobile Navigation
if (document.documentElement.clientWidth < 992) {
    jQuery(document).ready(function() {
 jQuery("#menu").mmenu({
            extensions: ["position-right"]
   });
        

    });

    
}

// JS for Hover Menu
$(document).ready(function() {
    $('ul.navbar-nav .nav-item.dropdown').hover(function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
    }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(300);
    });
});



//Desktop Menu
if (document.documentElement.clientWidth > 992) {
    jQuery(document).ready(function() {
    
        jQuery("#desktop-nav").click(function(){
            jQuery("body").toggleClass("active-drop");
});
    jQuery(".desktop-menu .close_btn").click(function(){
            jQuery("body").removeClass("active-drop");
});

    });
}

// study Menu
jQuery(document).ready(function () {
  jQuery(".study-menu-container").hover(
    function () {
      jQuery(".study-menu", this).stop(true, true).slideDown(500);
    },
    function () {
      jQuery(".study-menu", this).stop(true, true).slideUp(500);
    }
  );
});

//Back to bottom to top
var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});



// Mega Menu
jQuery(document).ready(function(){
    jQuery(".dropdown").hover(
        function() { jQuery('.dropdown-menu', this).fadeIn("fast");
        },
        function() { jQuery('.dropdown-menu', this).fadeOut("fast");
    });
});

$(document).ready(function() {
    $(".megamenu").on("click", function(e) {
        e.stopPropagation();
    });
});


// Stop Video
$(document).ready(function(){
  var videoSrc = $("#video_modal iframe").attr("src");
  $('#video_modal').on('show.bs.modal', function () { // on opening the modal
    // set the video to autostart
    $("#video_modal iframe").attr("src", videoSrc+"?autoplay=1");
  }).on('hidden.bs.modal', function (e) { // on closing the modal
    // stop the video
    $("#video_modal iframe").attr("src", null);
  });
});

// Dashboard Menu Slide on toggle

// $(".dashboard-bar").click(function(){
//   $(".dashboard-main-menu").toggleClass("wide-menu");
//   $(".dashboard-main-menu").toggleClass("dashboardmob-view");
//   $(".dashboard-main-menu").css("display", "block");
//   $(".dashboard-main-body").toggleClass("wide-dashboard");
//   $(".navbar-brand").toggleClass("icon-logo");
//   $(this).toggleClass("small-bar");
// });
// $(".close-btn").click(function(){
//     $(".dashboard-main-menu").removeClass("dashboardmob-view");
//     $(".dashboard-main-body").removeClass("wide-dashboard");
//     $(".dashboard-main-menu").removeClass("wide-menu");
//     $(".navbar-brand").removeClass("icon-logo");
//     $(".dashboard-main-menu").css("display", "none");
// });

// Tool Tip

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})



$(window).on('resize', function() {
    if($(window).height() > 900) {
        $('#1').addClass('col-md-3');
        $('#1').removeClass('col-md-2');
    }else{
        $('#1').addClass('col-md-2');
        $('#1').removeClass('col-md-3');
    }
})



$(document).on("click", "#cust_btn", function () {
    $("#myModal").modal("toggle");
  });


// landing page sticky btn
$(document).ready(function () {
    $(window).scroll(function () {
      if ($(window).scrollTop() > 660) {
        $("#landing-page-apply-sticky-img").addClass("sticky-banner");
      } else {
        $("#landing-page-apply-sticky-img").removeClass("sticky-banner");
      }
    });
  });
  
  //back to the top button
  $(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#lpage-back-to-top').fadeIn(); 
        } else { 
            $('#lpage-back-to-top').fadeOut(); 
        } 
    }); 
    $('#lpage-back-to-top').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
  });
  
  //read more btn landing page
  $(document).ready(function() {
    $("#readmore-btn-1").click(function() {
      var elem = $("#readmore-btn-1").text();
      if (elem == "Read more") {
        //Stuff to do when btn is in the read more state
        $("#readmore-btn-1").text("Read less");
        $("#readmore-box-1").slideDown();
      } else {
        //Stuff to do when btn is in the read less state
        $("#readmore-btn-1").text("Read more");
        $("#readmore-box-1").slideUp();
      }
    });
  });
  $(document).ready(function() {
    $("#readmore-btn-2").click(function() {
      var elem = $("#readmore-btn-2").text();
      if (elem == "Read more") {
        //Stuff to do when btn is in the read more state
        $("#readmore-btn-2").text("Read less");
        $("#readmore-box-2").slideDown();
      } else {
        //Stuff to do when btn is in the read less state
        $("#readmore-btn-2").text("Read more");
        $("#readmore-box-2").slideUp();
      }
    });
  });  
