@extends('frontend.layout')


@section('links')


	<link rel="stylesheet" href="/frontend/css/home.css">
	<link rel="stylesheet" href="/frontend/css/trust_us.css">


@endsection


@section('content')
<div class="home-slider border-bottom-red">
	<div class="slider-items">
		@foreach($homeSliders as $slide)
		<div class="slider-item">
			@if($slide->is_image)
			<img src="{{$slide->file_path}}">
			@else
				<video loop="loop" preload="metadata" autoplay muted="muted" playsinline >
		      		<source src="{{$slide->file_path}}" type="video/mp4">
		    	</video>
			@endif
			<div class="slider-item__content">
				<h1 class="title">{!!$slide->translate()->title!!}</h1>
				<p class="sub-title">{!!$slide->translate()->sub_title!!}</p>
			</div>
		</div>
		@endforeach

	</div>
	<div class="slider-switch switch-left">@include('frontend.includes.svg.slider-arrow')</div>
	<div class="slider-switch switch-right">@include('frontend.includes.svg.slider-arrow')</div>
	<div class="btn btn-white show-more shadow">
		<a href="/about-us">@lang('main.learn_more')</a>
	</div>
</div>

<div class="about-us section-margin">
	<div class="content-wrapper">
		<h2 class="title"><span>@lang('main.about_company')</span></h2>
	</div>

	<div class="about-us-content">
		<img src="/frontend/images/about-company.jpg" alt=">@lang('main.about_company')">
		<div class="about-us-description">
			{!! $settings->translate()->body !!}

			<div class="btn ">
				<a href="/about-us" class="shadow">@lang('main.detail')  @include('frontend.includes.svg.slider-arrow') </a>
			</div>
		</div>
	</div>

</div>


<div class="catalog">
    <div class="content-wrapper">
        <h2 class="title"><span>@lang('main.production')</span></h2>
    </div>
	<div class="catalog-items content-wrapper">
        @foreach ($categories as $item)

                <div class="catalog-item shadow">
					<a href='{{ LaravelLocalization::localizeUrl("$item->url") }}'><img src="{{$item->image}}" alt="{{ $item->translate()->title }}"></a>
					<a class="catalog-item__title" href='{{ LaravelLocalization::localizeUrl("$item->url") }}'>{{ $item->translate()->title }}</a>
				</div>
        @endforeach

	</div>
</div>
@if(count($interesting)>0)
<div class="interesting">
    <div class="content-wrapper">
        <h2 class="title"><span>@lang('main.interesting')</span></h2>
    </div>
    <div class="interesting-items content-wrapper">
        @foreach ($interesting as $info)

            <div class="interesting-item shadow">
                <a href='{{ LaravelLocalization::localizeUrl("$info->url") }}'><img src="{{$info->image}}" alt="{{ $info->translate()->title }}"></a>
                <a class="interesting-item__title" href='{{ LaravelLocalization::localizeUrl("$info->url") }}'>{{ $info->translate()->title }}</a>
            </div>
        @endforeach

    </div>
</div>
@endif




@endsection


@section('scripts')
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script src="/frontend/js/lazy_load.js"></script>
	<script>

		$('.slider-items').slick({
			dots: false,
			infinite: false,
			speed: 400,
			autoplay: true,
  			autoplaySpeed: 5000,
			slidesToShow: 1,
			slidesToScroll: 1,
			prevArrow: ".home-slider .switch-left",
			nextArrow: ".home-slider .switch-right"
		});


		function fixVideoHeight(){
	        var image_height = $('.home-slider .slider-item img').css('height');
	        $('.home-slider .slider-item').css('max-height', image_height);
	    }

	    $(document).ready(function(){
	        fixVideoHeight();
	        $(window).on('resize',fixVideoHeight);
	    });

	</script>



@endsection
