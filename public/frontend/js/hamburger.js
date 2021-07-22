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
