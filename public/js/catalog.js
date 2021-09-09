(function () {
    'use strict';
    $('.catalog-tabs-item').click(function(){
        $('.catalog-tabs-item.active').removeClass('active');
        $(this).toggleClass('active');
    });

    $('.show-more-products').click(function(){

        let page = $(this).attr('data-page');

        $.ajax({
            method: 'GET',
            url: page,
            data: {
                _token: '{{csrf_token()}}',
            }
        }).done(function(data){
            let page = $(data);
            let items = page.find('.catalog-item');

            let amoutOfProducts = page.find('.amount-products').html();
            let amountProductsOnPage = $('.amount-products').html();

            $('.amount-products').text( parseInt(amoutOfProducts) + parseInt(amountProductsOnPage));

            if (page.find('.show-more-products').length == 1) {
                let nextPage = page.find('.show-more-products').attr('data-page');
                $('.show-more-products').attr('data-page', nextPage);
            }else{
                $('.show-more-products').remove();
            }

            $('.catalog-items').append(items);

        });
    });


    // if($(window).width() < 768) {
    //     $.each($('.catalog-item .img-src'), function (i, el){
    //         el.preventDefault();
    //     });
    //
    //     $('.catalog-item').click(function (evt){
    //         evt.stopPropagation();
    //         console.log(evt.target());
    //     });
    // }

}());



