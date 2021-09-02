<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <title>{{ $seo->title }}</title>
    <meta name="description" content="{{ $seo->description }}">
    <meta name="keywords" content="{{ $seo->keywords }}">

    <meta property="og:title" content='{{ $seo->title }}'/>
    <meta property="og:description" content='{{ $seo->description }}'/>
    <meta property="og:url" content="{{url('/')}}">
    <meta property="og:type" content="website">

    <link rel="alternate" hreflang="ru" href="{{ LaravelLocalization::getLocalizedURL('ru') }}">
    <link rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en') }}">
      <link rel="alternate" hreflang="ua" href="{{ LaravelLocalization::getLocalizedURL('ua') }}">
      <link href='{{ url('sitemap.xml') }}' rel='alternate' title='Sitemap' type='application/rss+xml'/>



    <!-- <meta property="og:image" content="ссылка на картинку"/>
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">


    <link rel="icon" type="image/png" sizes="192x192" href="ссылка на картинку">
    <link rel="apple-touch-icon" sizes="180x180" href="ссылка на картинку"> -->

    <link rel="icon" type="image/png" href="/favicon.ico">
    <meta name="robots" content="noindex, nofollow" />
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
{{--    <link rel="stylesheet" href="{{asset('/css/my.css')}}">--}}
      <link rel="stylesheet" href="{{asset('/frontend/css/normalize.css')}}">
      <link rel="stylesheet" href="{{asset('/frontend/css/hamburger.css')}}">
      <link rel="stylesheet" href="{{asset('/frontend/css/layout.css')}}"> <!-- ( header - footer ) css -->
      <link rel="stylesheet" href="{{asset('/frontend/css/social_buttons.css')}}">
      <link rel="stylesheet" href="{{asset('/frontend/css/popup_form.css')}}">
      <link rel="stylesheet" href="{{asset('/frontend/css/page.css')}}">
      <link rel="stylesheet" href="/frontend/css/home.css">
      <link rel="stylesheet" href="/frontend/css/breadcrumbs.css">
    @yield('links')
      1
  </head>

  <body id="body">
    <div class="overflow"></div>
    <div class="site-content" id="site-content">
      @include('frontend.includes.header')

      @yield('content')

      @include('frontend.includes.footer')
      @include('frontend.includes.popup_form')
      @include('frontend.includes.social_buttons')
      @include('frontend.includes.form_success_alert')

    </div>

    <script  src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="   crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
{{--    <script src="{{asset('/js/my.js')}}"></script>--}}
    <script src="{{asset('frontend/js/hamburger.js')}}"></script>
    <script src="{{asset('frontend/js/layout.js')}}"></script>
    <script src="{{asset('frontend/js/lazy_load.js')}}"></script>
    @yield('scripts')
  </body>
</html>
