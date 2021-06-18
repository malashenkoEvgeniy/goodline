@extends('frontend.layout')


@section('links')
    <link rel="stylesheet" href="/frontend/css/home.css">
<link rel="stylesheet" href="/frontend/css/breadcrumbs.css">
<link rel="stylesheet" href="/frontend/css/page.css">

@endsection


@section('content')
@include('frontend.includes.breadcrumbs')
@if($page->parent_id == 1)
    <style>
        .interesnoe-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 1200px;
            margin: 0 auto;
        }

        .interesnoe-wrap-item {
            display: flex;
            align-items: center;
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

    </style>

@endif
@if($page==null)
    <div class="content-wrapper page">
        <h2 class="title"><span>@lang('main.production')</span></h2>
        <div class="page__body">
            <div class="catalog-items content-wrapper">
                @foreach ($categories as $item)

                    <div class="catalog-item shadow">
                        <a href='{{ LaravelLocalization::localizeUrl("$item->url") }}'><img src="{{$item->image}}" alt="{{ $item->translate()->title }}"></a>
                        <a class="catalog-item__title" href='{{ LaravelLocalization::localizeUrl("$item->url") }}'>{{ $item->translate()->title }}</a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@else
    @if($page->id == 1)
        <div class="content-wrapper page">
            <h2 class="title"><span>@lang('main.production')</span></h2>
            <div class="page__body">
                <div class="catalog-items content-wrapper">
                    @foreach ($interesting as $info)

                        <div class="interesting-item shadow">
                            <a href='{{ LaravelLocalization::localizeUrl("$info->url") }}'><img src="{{$info->image}}" alt="{{ $info->translate()->title }}"></a>
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
                        width: 1200px;
                        margin: 0 auto;
                    }

                    .about-wrap-item {
                        display: flex;
                        align-items: flex-start;
                        justify-content: space-between;

                    }

                    .about-description {
                        background-color: #ffffff;
                        width: 50%;
                        padding: 100px;
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
                                    <a href='{{ LaravelLocalization::localizeUrl("$certificate->url") }}'><img src="{{$certificate->image}}" alt="{{ $certificate->translate()->title }}"></a>
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
                        width: 1200px;
                        margin: 0 auto;
                    }

                    .cooperation-wrap-item {
                        display: flex;
                        align-items: flex-start;
                        justify-content: space-between;

                    }

                    .cooperation-description {
                        background-color: #ffffff;
                        width: 50%;
                        padding: 100px;
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
                        width: 1200px;
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
