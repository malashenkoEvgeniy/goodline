@extends('frontend.layout')


@section('links')
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link rel="stylesheet" href="/frontend/css/home.css">
	<link rel="stylesheet" href="/frontend/css/trust_us.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

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
	<div class="catalog-items content-wrapper">

        @foreach ($category as $item) 
           
            @if ( $item->parent_id === null) 
            
                <div class="catalog-item shadow">
					<a href='{{ LaravelLocalization::localizeUrl("$item->url") }}'><img src="{{$item->image}}" alt="{{ $item->translate()->page_title }}"></a>
					<a class="catalog-item__title" href='{{ LaravelLocalization::localizeUrl("$item->url") }}'>{{ $item->translate()->page_title }}</a>
				</div>

			@endif
            
        @endforeach

	</div>
</div>

<div class="examples-work border-bottom-red section-margin">
	<h2 class="title"><span>@lang('main.work_examples') </span></h2>
	<div class="examples-work__slider">
		<div class="examples-work__slider-items">
			
			@foreach($workExamples as $key => $item)
			<div class="examples-work__slider-item">
				<a data-fancybox="gallery" href="{{$item->image}}" >
					<img src="{{$item->image}}" alt="Примеры работ {{$key}}">
				</a>
			</div>
			@endforeach

		</div>

		<div class="slider-switch slider-switch-white switch-left shadow">@include('frontend.includes.svg.slider-arrow')</div>
		<div class="slider-switch slider-switch-white switch-right shadow">@include('frontend.includes.svg.slider-arrow')</div>
	</div>

	<div class="btn btn-white show-more shadow">
		<a href="/examples">@lang('main.see_more') @include('frontend.includes.svg.slider-arrow')</a>
	</div>
	
</div>

@include('frontend.includes.trust_us')

@include('frontend.includes.google_map')



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

		$('.examples-work__slider-items').slick({
			dots: false,
			infinite: true,
			speed: 400,
			autoplay: true,
  			autoplaySpeed: 5000,
  			variableWidth: true,
  			centerMode: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			prevArrow: ".examples-work__slider .switch-left",
			nextArrow: ".examples-work__slider .switch-right"	
		});


		$('.our-clients__slider-items').slick({
			dots: false,
			infinite: true,
			speed: 400,
			autoplay: true,
  			autoplaySpeed: 5000,
			slidesToShow: 6,
			slidesToScroll: 1,
			prevArrow: ".our-clients__slider .switch-left",
			nextArrow: ".our-clients__slider .switch-right"	,
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


		function fixVideoHeight(){
	        var image_height = $('.home-slider .slider-item img').css('height');
	        $('.home-slider .slider-item').css('max-height', image_height);
	    }

	    $(document).ready(function(){
	        fixVideoHeight();
	        $(window).on('resize',fixVideoHeight);
	    });

	</script>

	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

@endsection