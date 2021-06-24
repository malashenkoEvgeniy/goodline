$('.product-slider .slider-items').slick({
    dots: false,
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    draggable: false,
    asNavFor: '.product-slider .slider-nav'
});

$('.product-slider .slider-nav').slick({
    slidesToShow: 3,
    asNavFor: '.product-slider .slider-items',
    focusOnSelect: true
});

$('.our-clients__slider-items').slick({
    dots: false,
    speed: 400,
    autoplay: true,
    autoplaySpeed: 10000,
    slidesToShow: 6,
    slidesToScroll: 1,
    prevArrow: ".our-clients__slider .switch-left",
    nextArrow: ".our-clients__slider .switch-right",
    responsive:[
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 568,
            settings: {
                variableWidth: true,
                centerMode: true,
                slidesToShow: 1,
            }
        },
    ]
});




$('#btn-order').click(function(e){
    e.preventDefault();
    $('#product-form-bg').fadeToggle();
    $('#color_id').val($("input[name='color']:checked").val());
    $('#quantity_id').val($('#product_quantity').val());
});

$('#product-form-bg .close-form').click(function(){
    $('#product-form-bg').fadeToggle();
});

$('#product-form-bg').click(function(e){
    var form_bg = $('#product-form-bg');
    if ( form_bg.is(e.target ) && form_bg.has(e.target).length === 0) {
        $('#product-form-bg').fadeToggle();
    }
});

if($(window).width() > 568) {
    $('.product-body-tab').click(function(){
        $('.product-body-tab-content.active').removeClass('active');
        $('.product-body-tab.active').removeClass('active');
        $(this).toggleClass('active');
        $('.product-body .product-body-tab-content').eq($(this).index()).addClass('active');
    });
} else {
    $('.accordion-btn').click(function(){
        $(this).toggleClass('active');
        $(this).siblings('div').toggleClass('active');
    });
}
