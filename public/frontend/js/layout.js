"use strict";
function hideTopHeader(){
    $('.header-top').addClass("disabled");
    $('.header-bottom').addClass("remove-border");
}

function showTopHeader(){
    $('.header-top').removeClass("disabled");
    $('.header-bottom').removeClass("remove-border");
}

if(window.screen.width > 568){
    $(window).scroll(function() {
        if ($(this).scrollTop() > 98){
            hideTopHeader();
        }else{
            showTopHeader();
        }
    });
}

function fixPaddingSiteContent(){
    $('.site-content').css( 'padding-top', $('header').height() );
}

$(document).ready(fixPaddingSiteContent);
$(window).resize(fixPaddingSiteContent);


if(window.screen.width < 1024){
    $(document).click(function (e){
        var menu = $(".categories");
        if (!menu.is(e.target ) && menu.has(e.target).length === 0) {
            $('.menu-categories').removeClass('active');
            $('.sub-categories-items.active').removeClass('active');
            $('li.categories-item.active').removeClass('active');
            $('.categories-link').removeClass('active');

        }
    });

    $('.categories-link').click(function(){
        $(this).toggleClass('active');
        $('.menu-categories').toggleClass('active');
    });

    $('.categories-item__toggle-btn').click(function(){
        $(this).parent('.categories-item').toggleClass('active');
        $(this).siblings('.sub-categories-items').toggleClass('active');
    });
}

var $page = $('html, body');
$('a[href*="#"]').click(function() {
    $page.animate({
        scrollTop: $($.attr(this, 'href')).offset().top - 50
    }, 400);
    return false;
});

function toggleFormSuccessAlert(){
    $('.popup-form-bg').fadeOut();
    $('.success').fadeIn();
    setTimeout(function(){
        $('.success').fadeOut();
        $('form input:not([type=hidden]', 'form textarea').val('');
    },3000);
}


$('form').submit(function(e){
    e.preventDefault();

    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var data = $(this).serialize();

    $.ajax({
        method: method,
        url: url,
        data : data
    }).done(function(){
        // debugger;
        toggleFormSuccessAlert();
    }).fail(function(){
        // debugger;
    });
});

function toggle_social_button(){
    $('.social-items-menu').fadeToggle();
    $('.social-btn').toggleClass('active');
    $('.social-btn .s-btn-close').toggleClass('active');
    $('.social-btn-pulse').toggleClass('active');
    $('.social-btn-bg').toggleClass('active');
    $('.social-btn .btn-1').toggleClass('close');
    $('.social-btn .btn-2').toggleClass('close');
    $('.social-items-bg').fadeToggle();
    $('.social-items-bg').toggleClass('active');
}


function swap_social_button_icons(){
    $('.btn-1').fadeToggle(1500);
    $('.btn-2').fadeToggle(1500);
    setTimeout(swap_social_button_icons, 2000);
}
swap_social_button_icons();
$('.social-items-wrapper, .social-items-bg ').click(function(){
    toggle_social_button();
});

$('.call-contact-form, #contact-from-bg .close-form').click(function(){
    $('#contact-from-bg').fadeToggle();
});

$('#contact-from-bg').click(function(e){
    var form_bg = $('#contact-from-bg');
    if ( form_bg.is(e.target ) && form_bg.has(e.target).length === 0) {
        $('#contact-from-bg').fadeToggle();
    }
});


$('.lang-selector').click(function(){
    $('.lang-items').fadeToggle();
    $('.header-top').css('overflow','unset');
});

$(document).click(function(e){
    var lang_selector = $('.lang-selector');
    if ( !lang_selector.is(e.target ) && lang_selector.has(e.target).length === 0) {
        $('.lang-items').fadeOut();

    }
});


$('.contacts__dropdown-phone > span').click(function(){
    $('.contacts__dropdown-phone').toggleClass('active');
    $('.header-top').css('overflow','unset');
});

$(document).click(function(e){
    var lang_selector = $('.contacts__dropdown-phone > span');
    if ( !lang_selector.is(e.target ) && $('.contacts__dropdown-phone').has(e.target).length === 0) {
        $('.contacts__dropdown-phone').removeClass('active');

    }
});

$('.certificates-items').slick({
    dots: false,
    infinite: false,
    speed: 400,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive:  [
    {
        breakpoint: 578,
        settings: {

            slidesToShow: 1,
            slidesToScroll: 1,
        }
    }
]
});
