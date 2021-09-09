"use strict";
function addCatigoriesMenu () {
    $('.categories-item').each(function (index) {
        let item = $(this);
        setTimeout(function () {
            item.addClass('show');
        }, (index + 1) * 130);
    });
    setTimeout(function () {
        $('.menu-categories').addClass('active');
    },  130);
    setTimeout(function () {
        $('.menu-categories').removeClass('hidden_cat');
    },  1500);

}

function removeCatigoriesMenu () {
    // $('.categories-item').each(function (index) {
    //     let item = $(this);
    //     setTimeout(function () {
    //         item.removeClass('show');
    //     }, (index + 1) * 130);
    // });
    setTimeout(function () {
        $('.menu-categories').removeClass('active');
    },  130);
        $('.menu-categories').addClass('hidden_cat');


}

function menuToggle()
{
    $('#menu-toggle').toggleClass('open');
    $('.header-bottom ').toggleClass('header-bottom-open');
    // togleBody();
    $('#body').toggleClass('overlay');
    $('.overflow').toggleClass('overflow-hid');

}

// function togleBody() {
//     $('#body').toggleClass('overlay');
// }

if($(window).width() > 1024) {

    $('.categories-link').hover(addCatigoriesMenu, function () {
        }
    );

    $('.menu-categories').hover(addCatigoriesMenu, removeCatigoriesMenu);

    $('.categories-link').hover(
        function () {
        }, removeCatigoriesMenu);


// ======================================================================
    $('.o-glyutene').hover(function (evt) {
        evt.preventDefault();
        $('.main-submenu-items').addClass('active');
    }, function () {

    });

    $('.main-submenu-items').hover(
        function () {
            $(this).addClass('active');
        }, function () {
            $(this).removeClass('active');
        }
    );

    $('.o-glyutene').hover(
        function () {
        }, function () {
            $('.main-submenu-items').removeClass('active');
        }
    );

    // $(document).click(function (e) {
    //     if (!$('.o-glyutene').is(e.target) && !$('.main-submenu-items').is(e.target) && $('.main-submenu-items').has(e.target).length === 0) {
    //         $('.main-submenu-items').slideUp();
    //         $('.main-submenu-items').addClass('list-o-glyutene');
    //     };
    // });
}
if($(window).width() < 1024) {


    // function headerBg(){
    //     if($(window).scrollTop() > 50){
    //         $('.header-top').addClass('hide');
    //     }else{
    //         $('.header-top').removeClass('hide');
    //     }
    //
    // }
    //
    //
    // $(document).ready(headerBg);
    // $(window).scroll(headerBg);


    $('#menu-toggle').click(function(){
        $('#menu-toggle').toggleClass('open');
        $('.header-bottom ').toggleClass('header-bottom-open');
        $('#body').toggleClass('overlay');
        $('.overflow').toggleClass('overflow-hid');
    });

    $('.categories-link').click(function () {
        $(this).toggleClass('categories-link-open');
        $('.menu-categories').toggleClass('menu-categories-open');
        $('.main-menu').toggleClass('close');
    });




    $('.o-glyutene').click(function (evt) {
        evt.preventDefault();
        $(this).toggleClass('o-glyutene-open');

        $('.main-submenu-items').toggleClass('list-o-glyutene');
        $('.main-submenu-items').toggleClass('o-glyutene-open-aditional');
        $('.main-submenu-items').parent().siblings().fadeToggle();
        $('.categories-link').fadeToggle();
    });

    $('.categories-item-link').click(function (evt) {
        if($(this).siblings('.subcategories-wrap').length>0) {
            evt.preventDefault();
            $(this).toggleClass('categories-link-open');
            $(this).parent().siblings().toggleClass('close');
            $('.categories-link').fadeToggle();
            $('.subcategories-list').fadeToggle();
        }
    });


    $('.header-bottom-top-btn_close').click(function () {
        $('#menu-toggle').removeClass('open');
        $('.header-bottom ').removeClass('header-bottom-open');
        $('.overflow').removeClass('overflow-hid');
        $('#body').toggleClass('overlay');
    });
    //
    // $('.categories-link').click(function () {
    //
    //     $(this).toggleClass('categories-link-open');
    //     $('.menu-categories').toggleClass('menu-categories-open');
    // });
    //
    // $('.categories-item-link').click(function (evt) {
    //     if($(this).siblings('.subcategories-wrap').length>0) {
    //         evt.preventDefault();
    //         $(this).toggleClass('categories-link-open');
    //         $('.categories-link').fadeToggle();
    //         $('.subcategories-list').fadeToggle();
    //     }
    // });
    //
    // $('.o-glyutene').click(function (evt) {
    //     evt.preventDefault();
    //     $(this).toggleClass('o-glyutene-open');
    //     $('.main-submenu-items').toggleClass('list-o-glyutene');
    //     $('.main-submenu-items').toggleClass('o-glyutene-open-aditional');
    //     $('.main-submenu-items').parent().siblings().fadeToggle();
    //     $('.categories-link').fadeToggle();
    // });

    // $('.o-glyutene').click(function (evt) {
    //     evt.preventDefault();
    //     if ($('.main-submenu-items').hasClass('list-o-glyutene')) {
    //         $('.main-submenu-items').removeClass('list-o-glyutene');
    //         $('.main-submenu-items').slideUp();
    //     } else {
    //         $('.main-submenu-items').addClass('list-o-glyutene');
    //         $('.main-submenu-items').slideDown();
    //     }
    // });
}

"use strict";

//lazy
$(document).ready(function () {
    let images = document.querySelectorAll('img[loading="lazy"]');
    if($(window).width() >= 1024) {
        images.forEach(function (img) {
            if(img.dataset.desc.length) {
                img.src = img.dataset.desc;
            } else {
                img.src = img.dataset.or;
            }
        });
    }
    if($(window).width() < 1024 && $(window).width() >= 768) {
        images.forEach(function (img) {
            if(img.dataset.tablet.length) {
                img.src = img.dataset.tablet;
            } else {
                img.src = img.dataset.or;
            }
        });
    }
    if( $(window).width() < 768) {
        images.forEach(function (img) {
            if(img.dataset.mobile.length) {
                img.src = img.dataset.mobile;
            } else {
                img.src = img.dataset.or;
            }
        });
    }
});
function hideTopHeader(){
    $('.header-top').addClass("disabled");
    $('.header-bottom').addClass("remove-border");
}

function showTopHeader(){
    $('.header-top').removeClass("disabled");
    $('.header-bottom').removeClass("remove-border");
}

if($(window).width() > 1024) {
    $(window).on('scroll', { passive: true }, function() {
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


$(window).on('scroll', { passive: true }, function() {
        if ($(this).scrollTop() > 100) {
            $('footer .btn-up').fadeIn();
        } else {
            $('footer .btn-up').fadeOut();
        }
    });




"use strict";



    function getImages() {
        let lazy = document.getElementsByClassName('lazy');

        for (var i = 0; i < lazy.length; i++) {
            lazy[i].src = lazy[i].getAttribute('data-src');

        }
    }
    $(document).ready(function(){
        getImages();
    });


document.addEventListener("DOMContentLoaded", function() {
    var lazyLoadVideos = [].slice.call(document.querySelectorAll("video.lazy-video"));
    if ("IntersectionObserver" in window) {
        var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(video) {
                if (video.isIntersecting) {
                    for (var source in video.target.children) {
                        var videoSource = video.target.children[source];
                        if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
                            videoSource.src = videoSource.dataset.src;
                        }
                    }
                    video.target.load();
                    video.target.classList.remove("lazy-video");
                    lazyVideoObserver.unobserve(video.target);
                }
            });
        });
        lazyLoadVideos.forEach(function(lazyVideo) {
            lazyVideoObserver.observe(lazyVideo);
        });
    }
});

