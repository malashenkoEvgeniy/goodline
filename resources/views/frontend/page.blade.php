@extends('frontend.layout')


@section('links')
@endsection
@section('content')
@include('frontend.includes.breadcrumbs')
@if(isset($page->parent_id))
@if($page->parent_id == 1)
    <style>
        .interesnoe-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0 auto;
        }

        .interesnoe-wrap-item {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

        }

        .interesnoe-wrap-item img {
            width: 45%;
            height: auto;
        }

        .interesnoe-description {
            background-color: #ffffff;
            width: 50%;
            padding: 100px;
        }
        @media (max-width: 770px){

        }

        @media (max-width: 568px){
            .interesnoe-wrap-item {
                flex-direction: column;
            }

            .interesnoe-wrap-item img {
                width: 100%;
                height: auto;
            }

            .interesnoe-description {
                background-color: #ffffff;
                width: 100%;
                padding: unset;
            }
        }

    </style>
@endif
@endif
@if($page==null)
    <div class="content-wrapper page">
        <h2 class="title"><span>@lang('main.production')</span></h2>
        <div class="page__body">
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
{{--                            <img class="catalog-item-page-img" src="{{$item->image}}" alt="{{ $item->translate()->title }}"></a>--}}
                        <a class="catalog-item__title" href='{{ LaravelLocalization::localizeUrl("$item->url") }}'>{{ $item->translate()->title }}</a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@else
    @if($page->id == 1)
        <div class="content-wrapper page">
            <h2 class="title"><span>{{$page->translate()->title}}</span></h2>
            <div class="page__body">
                <div class="catalog-items content-wrapper interesting-wrap">
                    @foreach ($interesting as $info)
                        <div class="interesting-item shadow">
                            <a href='{{ LaravelLocalization::localizeUrl("$info->url") }}' >
                                @if($info->media !== null )
                                    <img
                                        src="{{asset('frontend/images/a.jpg')}}"
                                        data-mobile="{{$info->media->img_m}}"
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
                            </a>
                            <a class="interesting-item__title" href='{{ LaravelLocalization::localizeUrl("$info->url") }}'>{{ $info->translate()->title }}</a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        @else
            <div class="content-wrapper page">
                <h2 class="title"><span>{{$page->translate()->title}}</span></h2>
                <div class="page__body">
                    {!! $page->translate()->body!!}
                </div>
            </div>
            @if($page->id == 3)
                <style>
                    .about-wrap {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        width: 100%;
                        margin: 0 auto;
                        font-size: 16px;
                        line-height: 18px;
                    }

                    .about-wrap-item  img,
                    .about-wrap-item  iframe {
                        width: 50%;
                        max-height: 400px;
                    }

                    .about-wrap-item {
                        display: flex;
                        align-items: flex-start;
                        justify-content: space-between;
                        background-color: #ffffff;

                    }

                    .about-description {
                        background-color: #ffffff;
                        width: 50%;
                        padding: 50px;
                        text-align: justify;
                    }


                    @media (max-width: 1024px){
                        .about-wrap {
                            width: 100%;
                        }

                        .about-wrap-item {
                            display: block;
                        }

                        .about-wrap-item img, .about-wrap iframe {
                            padding: 20px;
                            float: left;
                        }

                        .about-description {

                            width: 100%;
                            padding: 0;
                        }
                    }

                    @media (max-width: 768px){


                        .about-wrap iframe,
                        .about-wrap-item img {
                            width: 100%;
                        }
                    }
                    @media (max-width: 568px){
                        .about-wrap {
                            font-size: 16px;
                            line-height: 24px;
                        }
                        .certificates .content-wrapper {
                            min-height: 20vh;
                        }


                        .about-wrap iframe,
                        .about-wrap-item img {
                            padding: 0;
                        }
                    }
                </style>
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
                                    </a>
                                    <h3 class="certificates-item__title" >{{ $certificate->translate()->title }}</h3>
                                    <p class="certificates-item__body">{{ $certificate->translate()->body }}</p>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif
            @elseif($page->id == 4)
                <style>
                    .cooperation-wrap {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        width: 100%;
                        margin: 0 auto;
                    }

                    .cooperation-wrap-item {
                        display: flex;
                        align-items: flex-start;
                        justify-content: space-between;

                    }

                    .cooperation-wrap-item img {
                        height: 450px;
                    }

                    .cooperation-description {
                        background-color: #ffffff;
                        width: 50%;
                        padding: 100px;
                    }

                    @media (max-width: 768px){
                        .cooperation-wrap-item {
                            display: unset;
                        }

                        .cooperation-wrap-item img {
                            float: left;
                            height: 380px;
                            margin-right: 25px;
                        }

                        .cooperation-description {
                            background-color: #ffffff;
                            width: 100%;
                            padding: unset;
                        }

                        .cooperate {
                            width: 100%;
                            padding: 0;
                        }
                    }
                </style>
                <div class="content-wrapper">
                    <div class="cooperate">
                        <div class="cooperate-info">
                            <h2>@lang('main.form.to_contact_us')</h2>
                        </div>
                        <div class="cooperate-form">
                            <form action="{{route('sendForm')}}" method="POST">
                                {!! csrf_field() !!}
                                <div class="input-group">
                                    <label for="input_name">@lang('main.form.name')</label>
                                    <input type="text" id="input_name" name="name" placeholder="@lang('main.form.input_name')" required>
                                </div>
                                <div class="input-group">
                                    <label for="input_phone">@lang('main.form.phone')</label>
                                    <input type="text" id="input_phone" name="phone" placeholder="@lang('main.form.input_phone')" required>
                                </div>
                                <div class="input-group">
                                    <label for="input_email">@lang('main.form.email')</label>
                                    <input type="text" id="input_email" name="email" placeholder="@lang('main.form.input_email')">
                                </div>
                                <div class="input-group">
                                    <label for="input_message">@lang('main.form.message')</label>
                                    <textarea name="message" id="input_message" cols="30" rows="10">@lang('main.form.input_message')</textarea>
                                </div>
                                <button class="btn shadow" type="submit"> <span>@lang('main.form.send') @include('frontend.includes.svg.slider-arrow')</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            @elseif($page->id == 5)
                <style>
                    .gde-kupit-wrap {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        width: 100%;
                        margin: 0 auto;
                    }

                    .gde-kupit-wrap a {
                        font-family: 'Rubik', sans-serif;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 36px;
                        line-height: 43px;
                        text-align: center;
                        text-transform: uppercase;
                        color: #C71F25;
                        text-decoration: none;
                    }

                    .gde-kupit-wrap p {
                        margin-bottom: 50px;
                    }
                </style>
            @endif

    @endif
@endif
@endsection
@section('scripts')
@endsection
