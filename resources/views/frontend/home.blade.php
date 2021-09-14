@extends('frontend.layout')


@section('links')

@endsection


@section('content')
<div class="home-slider border-bottom-red">
	<div class="slider-items">
		@foreach($homeSliders as $slide)
		<div class="slider-item">
			@if($slide->is_image)
                @if($slide->media !== null )
                <img
                    src="{{asset('frontend/images/a.jpg')}}"
                    data-mobile="{{$slide->media->img_t}}"
                    data-tablet="{{$slide->media->img_t}}"
                    data-desc="{{$slide->media->img_d}}"
                    data-or="{{$slide->media->img_d}}"
                    alt="slide{{$slide->media->id}}"
                    title="slide{{$slide->media->id}}"
                    class="lazyload"
                    loading="lazy"
                    width="1900"
                    height="670"
                    decoding="async"
                />
                @endif
			@else
				<video loop="loop" preload="metadata" autoplay muted="muted" playsinline  class="lazy-video">
		      		<source data-src="{{$slide->file_path}}" type="video/mp4">
		    	</video>
			@endif
			<div class="slider-item__content" style="display: none">
				<h1 class="title">{!!$slide->translate()->title!!}</h1>
				<p class="sub-title">{!!$slide->translate()->sub_title!!}</p>
			</div>
		</div>
		@endforeach

	</div>
	<div class="slider-switch switch-left">@include('frontend.includes.svg.slider-arrow')</div>
	<div class="slider-switch switch-right">@include('frontend.includes.svg.slider-arrow')</div>
	<div class="btn btn-white show-more shadow">
		<a href="{{$pages[0]->url}}">@lang('main.learn_more')</a>
	</div>
</div>
<div class="about-us section-margin">
	<div class="content-wrapper">
		<h2 class="title"><span>@lang('main.about_company')</span></h2>
	</div>

	<div class="about-us-content">
        <img
            src="{{asset('frontend/images/a.jpg')}}"
            data-mobile="{{asset('/frontend/images/about-company-m.jpg')}}"
            data-tablet="{{asset('/frontend/images/about-company-t.jpg')}}"
            data-desc="{{asset('/frontend/images/about-company.jpg')}}"
            data-or="{{asset('/frontend/images/about-company.jpg')}}"
            alt="@lang('main.about_company')"
            class="lazyload"
            loading="lazy"
            width="320"
            height="270"
            decoding="async"
        />
		<div class="about-us-description">
			{!! $settings->translate()->body !!}

			<div class="btn ">
				<a href="{{$pages[0]->url}}" class="shadow">@lang('main.detail')  @include('frontend.includes.svg.slider-arrow') </a>
			</div>
		</div>
	</div>

</div>


<div class="catalog mb-5">
    <div class="content-wrapper">
        <h2 class="title"><span>@lang('main.production')</span></h2>
    </div>
	<div class="catalog-items content-wrapper">
        @foreach ($categories as $item)

                <div class="catalog-item shadow">
					<a href='{{ LaravelLocalization::localizeUrl("$item->url") }}'>
                        @if($item->media !== null )
                        <img
                            src="{{asset('frontend/images/a.jpg')}}"
                            data-mobile="{{$item->media->img_m}}"
                            data-tablet="{{$item->media->img_t}}"
                            data-desc="{{$item->media->img_d}}"
                            data-or="{{$item->media->img_d}}"
                            alt="slide{{$item->media->id}}"
                            title="slide{{$item->media->id}}"
                            class="lazyload"
                            loading="lazy"
                            width="360"
                            height="270"
                            decoding="async"
                        />
                        @endif
{{--                        <img src="{{$item->image}}" alt="{{ $item->translate()->title }}" width="360" height="270">--}}
                    </a>
					<a class="catalog-item__title" href='{{ LaravelLocalization::localizeUrl("$item->url") }}'>{{ $item->translate()->title }}</a>
				</div>
        @endforeach

	</div>
</div>
@if(count($interesting)>0)
<div class="interesting mb-5">
    <div class="content-wrapper">
        <h2 class="title"><span>@lang('main.about_gluten')</span></h2>
    </div>
    <div class="interesting-items content-wrapper">
        @foreach ($interesting as $info)

            <div class="interesting-item">
                <a href='{{ LaravelLocalization::localizeUrl("$info->url") }}'>
                    @if($info->media !== null )
                        <img
                            src="{{asset('frontend/images/a.jpg')}}"
                            data-mobile="{{$info->media->img_d}}"
                            data-tablet="{{$info->media->img_t}}"
                            data-desc="{{$info->media->img_d}}"
                            data-or="{{$info->media->img_d}}"
                            alt="slide{{$info->media->id}}"
                            title="slide{{$info->media->id}}"
                            class="lazyload"
                            loading="lazy"
                            width="367"
                            height="330"
                            decoding="async"
                        />
                    @endif
{{--                    <img src="{{asset('frontend/images/a.jpg')}}" class="lazy-load lazy" data-src="{{$info->image}}" alt="{{ $info->translate()->title }}" width="367" height="330">--}}
                    <span class="interesting-item-details">@lang('main.detail')</span>
                </a>
                <a class="interesting-item__title" href='{{ LaravelLocalization::localizeUrl("$info->url") }}'>{{ $info->translate()->title }}</a>
            </div>
        @endforeach

    </div>
</div>
@endif
@if(count($certificates)>0)
    <div class="certificates">
        <div class="content-wrapper">
            <h2 class="title mb-5"><span>@lang('main.certificates')</span></h2>
        </div>
        <div class="certificates-items content-wrapper">
            @foreach ($certificates as $certificate)
                <div class="certificates-item">
                    <a data-fancybox="gallery"  href='{{asset($certificate->image)}}'>
                        @if($certificate->media !== null )
                            <img
                                src="{{asset('frontend/images/a.jpg')}}"
                                data-mobile="{{$certificate->media->img_m}}"
                                data-tablet="{{$certificate->media->img_t}}"
                                data-desc="{{$certificate->media->img_d}}"
                                data-or="{{$certificate->media->img_d}}"
                                alt="slide{{$certificate->media->id}}"
                                title="slide{{$certificate->media->id}}"
                                class="lazyload"
                                loading="lazy"
                                width="367"
                                height="330"
                                decoding="async"
                            />
                        @endif
{{--                        <img src="{{asset('frontend/images/a.jpg')}}" class="lazy" data-src="{{asset($certificate->image)}}" alt="{{ $certificate->translate()->title }}" >--}}
                    </a>
                    <h3 class="certificates-item__title" >{{ $certificate->translate()->title }}</h3>
                    <p class="certificates-item__body">{{ $certificate->translate()->body }}</p>
                </div>
            @endforeach

        </div>
    </div>
@endif
@isset($seo->text_seo_block)
 <div class="text_seo_block" >
     <div class="content-wrapper">
     {!! $seo->text_seo_block !!}
     </div>
 </div>
@endisset
@endsection

@section('scripts')
	<script>
		$('.slider-items').slick({
			dots: false,
			infinite: true,
			speed: 400,
			autoplay: false,
  			autoplaySpeed: 2500,
            pauseOnFocus: false,
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
