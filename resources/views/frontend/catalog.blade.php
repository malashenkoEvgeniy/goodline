@extends('frontend.layout')

@section('links')
{{--          <link rel="stylesheet" href="{{asset('/css/catalog.css')}}">--}}
<link rel="stylesheet" href="{{asset('/frontend/css/catalog.css')}}">
@endsection
@section('content')
<div class="page-thumbnail" style="background-image: url({{$page->banner}})">
	@include('frontend.includes.breadcrumbs')
	<h2 class="title"><span>{{ $page->translate()->title}}</span></h2>
</div>

<div class="catalog-navigation">
	<div class="content-wrapper">
		<div class="catalog-tabs">

			@if(count($categoryChildren) != 0 && $categoryChildren !== null)
				@foreach($categoryChildren as $key => $item)

				<div class="catalog-tabs-item @if($page->url == $item->url ) active @endif">
					<a class="catalog-tabs-item-content" href='{{ LaravelLocalization::localizeUrl("$item->url") }}'>
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
{{--						<img src="{{asset('frontend/images/a.jpg')}}" class="lazy-load lazy" data-src="{{ $item->image}}" alt="{{ $item->translate()->title}}" width="270" height="270">--}}
						<h1 class="tab-title">{{ $item->translate()->title}}</h1>
					</a>
				</div>

				@endforeach
			@endif

			@if($parentCategoryChildren !== null && count($parentCategoryChildren) != 0)
				@foreach($parentCategoryChildren as $key => $item)

				<div class="catalog-tabs-item @if($page->url == $item->url ) active @endif">
					<a class="catalog-tabs-item-content" href='{{ LaravelLocalization::localizeUrl("$item->url") }}'>
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
                        {{--						<img src="{{asset('frontend/images/a.jpg')}}" class="lazy-load lazy" data-src="{{ $item->image}}" alt="{{ $item->translate()->title}}" width="270" height="270">--}}
						<h2 class="tab-title">{{ $item->translate()->title}}</h2>
					</a>
				</div>

				@endforeach
			@endif

		</div>
	</div>
</div>




@if(count($products)>0)

<div class="content-wrapper ">
	<div class="products-on-page">
		<span>@lang('main.items_per_page'): <span> <span class="amount-products">{{$products->count()}}</span> из {{$quantityProducts}}</span> </span>
	</div>

	<div class="catalog ">
		<div class="catalog-items">
			@foreach($products as $product)
			<div class="catalog-item ">
				<a href='{{ LaravelLocalization::localizeUrl("$product->url") }}' class="img-src">
                    <img
                        src="{{asset('frontend/images/a.jpg')}}"
                        data-mobile="{{$product->media[0]->img_t}}"
                        data-tablet="{{$product->media[0]->img_t}}"
                        data-desc="{{$product->media[0]->img_d}}"
                        data-or="{{$product->media[0]->img_d}}"
                        alt=" {{ $product->translate()->title}}"
                        class="lazyload"
                        loading="lazy"
                        width="270"
                        height="270"
                        decoding="async"
                    />
{{--                    <img src="{{asset('frontend/images/a.jpg')}}" width="270" height="270" class="lazy-load lazy" data-src="@isset($product->productImages()->first()->image){{$product->productImages()->first()->image}}@endisset" alt="{{$product->translate()->title}}" data-widget=""></a>--}}
				<div class="catalog-item-hidden-desc">
					<div class="catalog-item-hidden-desc-bg">
						<a class="catalog-item__title" href='{{ LaravelLocalization::localizeUrl("$product->url") }}'>{{$product->translate()->title}}</a>
						<div class="catalog-item-description">
{{--							<p>{{$product->translate()->short_description}}</p>--}}
							<div class="btn show-more">
								<a href='{{ LaravelLocalization::localizeUrl("$product->url") }}'>@lang('main.detail')</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			@endforeach

		</div>

		@if( $products->nextPageUrl() !== null)
		<div class="btn show-more">
			<span class="show-more-products"  data-page="{{$products->nextPageUrl()}}">
				@lang('main.show_more')
			</span>
		</div>
		@endif
	</div>

</div>
@else
    <div class="content-wrapper ">
        <div class="development-block">
        <h2 class="title development-item"><span>@lang('main.products_in_development')</span></h2>
            <div class="development-text development-item">@lang('main.products_in_development_text')</div>
{{--            <img src="{{asset('frontend/images/a.jpg')}}"  data-src="{{asset('frontend/images/dev.jpg')}}" alt="dev" class=" lazy development-img development-item">--}}
        </div>
    </div>
@endif
@if(count($products)>0)
<div class="catalog-body section-padding">
	<div class="content-wrapper">
		{!! $page->translate()->body !!}
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
    <script src="{{asset('/js/catalog.js')}}"></script>
@endsection
