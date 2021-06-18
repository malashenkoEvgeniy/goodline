@extends('frontend.layout')


@section('links')

<link rel="stylesheet" href="/frontend/css/breadcrumbs.css">
<link rel="stylesheet" href="/frontend/css/product.css">


@endsection


@section('content')

@include('frontend.includes.breadcrumbs')

<div class="content-wrapper">
	<div class="product-card">
        <div class="product-card-top">
            <div class="product-card__slider">
                <div class="product-slider">
                    @if($product->productImages()->count() > 1)
                    <div class="slider-items">
                        @php
                        $i = 1;
                        @endphp
                        @foreach($product->productImages()->get() as $key => $item)
                        <div class="slider-item">
                            <a data-fancybox="gallery" href="{{$item->image}}">
                                <img src="{{$item->image}}" alt="{{ $product->translate()->title . $i }}">
                            </a>
                        </div>
                        @php
                        $i++;
                        @endphp
                        @endforeach

                    </div>
                    <div class="slider-nav">
                        @php
                        $i = 1;
                        @endphp
                        @foreach($product->productImages()->get() as $key => $item)

                        <div class="slider-nav-item">
                            <img src="{{$item->image}}" alt="{{ $product->translate()->title . $i }}">
                        </div>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </div>
                    @else
                        <img src="{{$product->productImages()->first()->image}}" alt="{{ $product->translate()->title }}">
                    @endif
                </div>
            </div>
            <div class="product-info">
                <div class="product-info-top">
                    <h1 class="product-title">{{ $product->translate()->title }}</h1>
                    <div class="product-vincode">
                        @lang('main.product.vendor_code'):
                        {{ $product->vendor_code }}
                    </div>
                </div>
                <div class="product-info-properties">
                    @foreach($product->properties as $property)
                        <div class="property">
                            <img src="{{asset($property->image)}}" alt="check{{$property->id}}" width="50" height="50">
                            <p >{{$property->translate()->title}}</p>
                        </div>
                    @endforeach
                </div>
                <div class="short_description">
                    <h3 class="short_description-title">@lang('main.product.description') </h3>
                </div>
                <div class="short_description">{{$product->translate()->short_description}}</div>
            </div>
        </div>
        <div class="product-body">
            <ul class="product-body-tabs">
                <li class="product-body-tab active ">@lang('main.product.ingredients')</li>
                <li class="product-body-tab ">@lang('main.product.specifications')</li>

            </ul>

            <div class="product-body-tab-content active product-body-text">
            {!! $product->translate()->characteristics !!}
            </div>

            <div class="product-body-tab-content  product-body-text">
            {!! $product->translate()->ingredients!!}
            </div>

        </div>
	</div>
</div>


@include('frontend.includes.popup_form_product')

@endsection


@section('scripts')

<script  src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
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


	$('input[type=radio]').change(function() {
		$('.product-option-color label.active ').removeClass('active');
	    $(this).parent('label').toggleClass('active');
		$('#color_id').val( $(this).val());
	});

	$('.product-body-tab').click(function(){
		$('.product-body-tab-content.active').removeClass('active');
		$('.product-body-tab.active').removeClass('active');
		$(this).toggleClass('active');
		$('.product-body .product-body-tab-content').eq($(this).index()).addClass('active');
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

</script>


<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

@endsection
