"use strict";function addCatigoriesMenu(){$(".categories-item").each(function(e){let t=$(this);setTimeout(function(){t.addClass("show")},130*(e+1))}),setTimeout(function(){$(".menu-categories").addClass("active")},130),setTimeout(function(){$(".menu-categories").css("overflow","unset")},1530)}function removeCatigoriesMenu(){setTimeout(function(){$(".menu-categories").removeClass("active")},130)}function hideTopHeader(){$(".header-top").addClass("disabled"),$(".header-bottom").addClass("remove-border")}function showTopHeader(){$(".header-top").removeClass("disabled"),$(".header-bottom").removeClass("remove-border")}function fixPaddingSiteContent(){$(".site-content").css("padding-top",$("header").height())}$(window).width()>1024&&($(".categories-link").hover(addCatigoriesMenu,function(){}),$(".menu-categories").hover(addCatigoriesMenu,removeCatigoriesMenu),$(".categories-link").hover(function(){},removeCatigoriesMenu),$(".o-glyutene").hover(function(e){e.preventDefault(),$(".main-submenu-items").addClass("active")},function(){}),$(".main-submenu-items").hover(function(){$(this).addClass("active")},function(){$(this).removeClass("active")}),$(".o-glyutene").hover(function(){},function(){$(".main-submenu-items").removeClass("active")})),$(window).width()<1024&&($("#menu-toggle").click(function(){$(this).hasClass("open")?($(this).removeClass("open"),$(".header-bottom ").removeClass("header-bottom-open"),$(".overflow").removeClass("overflow-hid")):($(this).addClass("open"),$(".header-bottom ").addClass("header-bottom-open"),$(".overflow").addClass("overflow-hid"))}),$(".header-bottom-top-btn_close").click(function(){$("#menu-toggle").removeClass("open"),$(".header-bottom ").removeClass("header-bottom-open"),$(".overflow").removeClass("overflow-hid")}),$(".categories-link").click(function(){$(this).toggleClass("categories-link-open"),$(".menu-categories").toggleClass("menu-categories-open")}),$(".categories-item-link").click(function(e){$(this).siblings(".subcategories-wrap").length>0&&(e.preventDefault(),$(this).toggleClass("categories-link-open"),$(".categories-link").fadeToggle(),$(".subcategories-list").fadeToggle())}),$(".o-glyutene").click(function(e){e.preventDefault(),$(this).toggleClass("o-glyutene-open"),$(".main-submenu-items").toggleClass("list-o-glyutene"),$(".main-submenu-items").toggleClass("o-glyutene-open-aditional"),$(".main-submenu-items").parent().siblings().fadeToggle(),$(".categories-link").fadeToggle()})),$(window).width()>1024&&$(window).on("scroll",{passive:!0},function(){$(this).scrollTop()>98?hideTopHeader():showTopHeader()}),$(document).ready(fixPaddingSiteContent),$(window).resize(fixPaddingSiteContent),window.screen.width<1024&&($(document).click(function(e){var t=$(".categories");t.is(e.target)||0!==t.has(e.target).length||($(".menu-categories").removeClass("active"),$(".sub-categories-items.active").removeClass("active"),$("li.categories-item.active").removeClass("active"),$(".categories-link").removeClass("active"))}),$(".categories-link").click(function(){$(this).toggleClass("active"),$(".menu-categories").toggleClass("active")}),$(".categories-item__toggle-btn").click(function(){$(this).parent(".categories-item").toggleClass("active"),$(this).siblings(".sub-categories-items").toggleClass("active")}));var $page=$("html, body");function toggleFormSuccessAlert(){$(".popup-form-bg").fadeOut(),$(".success").fadeIn(),setTimeout(function(){$(".success").fadeOut(),$("form input:not([type=hidden]","form textarea").val("")},3e3)}function toggle_social_button(){$(".social-items-menu").fadeToggle(),$(".social-btn").toggleClass("active"),$(".social-btn .s-btn-close").toggleClass("active"),$(".social-btn-pulse").toggleClass("active"),$(".social-btn-bg").toggleClass("active"),$(".social-btn .btn-1").toggleClass("close"),$(".social-btn .btn-2").toggleClass("close"),$(".social-items-bg").fadeToggle(),$(".social-items-bg").toggleClass("active")}function swap_social_button_icons(){$(".btn-1").fadeToggle(1500),$(".btn-2").fadeToggle(1500),setTimeout(swap_social_button_icons,2e3)}function getImages(){let e=document.getElementsByClassName("lazy");for(var t=0;t<e.length;t++)e[t].src=e[t].getAttribute("data-src")}$('a[href*="#"]').click(function(){return $page.animate({scrollTop:$($.attr(this,"href")).offset().top-50},400),!1}),$("form").submit(function(e){e.preventDefault();var t=$(this).attr("action"),o=$(this).attr("method"),s=$(this).serialize();$.ajax({method:o,url:t,data:s}).done(function(){toggleFormSuccessAlert()}).fail(function(){})}),swap_social_button_icons(),$(".social-items-wrapper, .social-items-bg ").click(function(){toggle_social_button()}),$(".call-contact-form, #contact-from-bg .close-form").click(function(){$("#contact-from-bg").fadeToggle()}),$("#contact-from-bg").click(function(e){var t=$("#contact-from-bg");t.is(e.target)&&0===t.has(e.target).length&&$("#contact-from-bg").fadeToggle()}),$(".lang-selector").click(function(){$(".lang-items").fadeToggle(),$(".header-top").css("overflow","unset")}),$(document).click(function(e){var t=$(".lang-selector");t.is(e.target)||0!==t.has(e.target).length||$(".lang-items").fadeOut()}),$(".contacts__dropdown-phone > span").click(function(){$(".contacts__dropdown-phone").toggleClass("active"),$(".header-top").css("overflow","unset")}),$(document).click(function(e){$(".contacts__dropdown-phone > span").is(e.target)||0!==$(".contacts__dropdown-phone").has(e.target).length||$(".contacts__dropdown-phone").removeClass("active")}),$(".certificates-items").slick({dots:!1,infinite:!1,speed:400,arrows:!1,autoplay:!0,autoplaySpeed:5e3,slidesToShow:2,slidesToScroll:1,responsive:[{breakpoint:578,settings:{slidesToShow:1,slidesToScroll:1}}]}),$(window).on("scroll",{passive:!0},function(){$(this).scrollTop()>100?$("footer .btn-up").fadeIn():$("footer .btn-up").fadeOut()}),$(document).ready(function(){getImages()}),document.addEventListener("DOMContentLoaded",function(){var e=[].slice.call(document.querySelectorAll("video.lazy-video"));if("IntersectionObserver"in window){var t=new IntersectionObserver(function(e,o){e.forEach(function(e){if(e.isIntersecting){for(var o in e.target.children){var s=e.target.children[o];"string"==typeof s.tagName&&"SOURCE"===s.tagName&&(s.src=s.dataset.src)}e.target.load(),e.target.classList.remove("lazy-video"),t.unobserve(e.target)}})});e.forEach(function(e){t.observe(e)})}});
