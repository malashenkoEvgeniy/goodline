"use strict";
if($(window).width() > 1024) {
    // $('.categories-link').hover(function (evt) {
    //     $('.menu-categories').addClass('active');
    //     // if (evt.target())
    //     if (!$(this).is(evt.target) && !$('.menu-categories').is(evt.target) && $('.menu-categories').has(evt.target).length === 0) {
    //         $('.menu-categories').removeClass('active');
    //     };
    // });


    $('.categories-link').hover(
        function () {
            $('.menu-categories').addClass('active');
            // $('.side-menu-products[data-sub-menu="' + $(this).attr('data-childrens-menu') + '"]').addClass('show-menu');
        }, function () {
            // $('.side-menu-products[data-sub-menu="' + $(this).attr('data-childrens-menu') + '"]').removeClass('show');
        }
    );

    $('.menu-categories').hover(
        function () {
            $('.menu-categories').addClass('active');
        }, function () {
            $('.menu-categories').removeClass('active');
        }
    );

    $('.categories-link').hover(
        function () {
        }, function () {
            $('.menu-categories').removeClass('active');
        }
    );


    $('.menu-categories').hover(
        function () {
        }, function () {
            $('.menu-categories').removeClass('active');
        }
    );

    $('.o-glyutene').click(function (evt) {
        evt.preventDefault();
        $('.main-submenu-items').slideToggle();
    });

    $(document).click(function (e) {
        if (!$('.o-glyutene').is(e.target) && !$('.main-submenu-items').is(e.target) && $('.main-submenu-items').has(e.target).length === 0) {
            $('.main-submenu-items').slideUp();
            $('.main-submenu-items').addClass('list-o-glyutene');
        };
    });
}
if($(window).width() < 1024) {

    $('#menu-toggle').click(function () {
        if ($(this).hasClass('open')) {
            $(this).removeClass('open');
            $('.header-bottom ').removeClass('header-bottom-open');
            $('.overflow').removeClass('overflow-hid');
        } else {
            $(this).addClass('open');
            $('.header-bottom ').addClass('header-bottom-open');
            $('.overflow').addClass('overflow-hid');
        }
    });

    $('.header-bottom-top-btn_close').click(function () {
        $('#menu-toggle').removeClass('open');
        $('.header-bottom ').removeClass('header-bottom-open');
        $('.overflow').removeClass('overflow-hid');
    });

    $('.categories-link').click(function () {
        $(this).toggleClass('categories-link-open');
        $('.menu-categories').toggleClass('menu-categories-open');
    });

    $('.categories-item-link').click(function (evt) {
        evt.preventDefault();
        $(this).toggleClass('categories-link-open');
        $('.categories-link').fadeToggle();
        $('.subcategories-list').fadeToggle();
    });

    $('.o-glyutene').click(function (evt) {
        evt.preventDefault();
        $(this).toggleClass('o-glyutene-open');
        $('.main-submenu-items').toggleClass('list-o-glyutene');
        $('.main-submenu-items').parent().siblings().fadeToggle();
        $('.categories-link').fadeToggle();
    });

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
