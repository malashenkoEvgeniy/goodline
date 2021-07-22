@extends('frontend.layout')

@section('links')
    <link rel="stylesheet" href="{{asset('/frontend/css/product.css')}}">
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
                                <img src="{{asset('frontend/images/a.jpg')}}" class="lazy"  data-src="{{$item->image}}" alt="{{ $product->translate()->title . $i }}" width="550" height="400">
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
                            <img src="{{asset('frontend/images/a.jpg')}}" class="lazy"  data-src="{{$item->image}}" alt="{{ $product->translate()->title . $i }}" width="80" height="80">
                        </div>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </div>
                    @else
                        <img src="{{asset('frontend/images/a.jpg')}}" class="lazy"  data-src="{{$product->productImages()->first()->image}}" alt="{{ $product->translate()->title }}" width="80" height="80">
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
                            <img src="{{asset('frontend/images/a.jpg')}}" class="lazy"  data-src="{{asset($property->image)}}" alt="check{{$property->id}}" width="50" height="50">
                            <p >{{$property->translate()->title}}</p>
                        </div>
                    @endforeach
                </div>
{{--                <div class="short_description">--}}
{{--                    <h3 class="short_description-title">@lang('main.product.description') </h3>--}}
{{--                </div>--}}
                <div class="short_description">{!!$product->translate()->short_desc!!}</div>
            </div>
        </div>
        <div class="product-body product-body-fordescktop">
            <ul class="product-body-tabs">
                <li class="product-body-tab active">@lang('main.product.description')</li>
                <li class="product-body-tab  ">@lang('main.product.ingredients')</li>

                <li class="product-body-tab ">@lang('main.product.specifications')</li>

            </ul>
            <div class="product-body-tab-content  active  product-body-text">
                {!! $product->translate()->description!!}
            </div>
            <div class="product-body-tab-content  product-body-text">
                {!! $product->translate()->ingredients!!}
            </div>

            <div class="product-body-tab-content product-body-text">
            {!! $product->translate()->characteristics !!}
            </div>


        </div>
        <div class="product-body product-body-formobile">
            <ul class="product-body-accordions">
                <li class="product-body-accordion  active ">
                    <button class="accordion-btn active">
                        @lang('main.product.description')
                        @include('frontend.includes.svg.dropdown_angle')
                    </button>
                    <div class="product-body-accordion-content active product-body-text">
                        {!! $product->translate()->description!!}
                    </div>
                </li>
                <li class="product-body-accordion">
                    <button class="accordion-btn ">
                        @lang('main.product.ingredients')
                        @include('frontend.includes.svg.dropdown_angle')
                    </button>
                    <div class="product-body-accordion-content  product-body-text">
                        {!! $product->translate()->characteristics !!}
                    </div>
                </li>

                <li class="product-body-accordion">
                    <button class="accordion-btn">
                        @lang('main.product.specifications')
                        @include('frontend.includes.svg.dropdown_angle')
                    </button>
                    <div class="product-body-accordion-content  product-body-text">
                        {!! $product->translate()->ingredients!!}
                    </div>
                </li>

            </ul>
        </div>
	</div>
</div>


@include('frontend.includes.popup_form_product')

@endsection
@section('scripts')
{{--<script src="{{asset('/js/product.js')}}"></script>--}}
<script src="{{asset('public/frontend/js/product.js')}}"></script>

@endsection
