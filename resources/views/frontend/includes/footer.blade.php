<footer>
	<a href="#site-content" class="btn-up">
		@include('frontend.includes.svg.dropdown_angle')
	</a>
 	<div class="footer-content">
 		<ul class="footer-top">
            <li class="mobile-first-column"><a href='{{ LaravelLocalization::localizeUrl('catalog') }}'>@lang('main.production')</a></li>
            <li class="mobile-first-column"><a href='{{ LaravelLocalization::localizeUrl($pages[2]->url) }}'>@lang('main.about_gluten')</a></li>
            <li class="mobile-first-column"><a href='{{ LaravelLocalization::localizeUrl($pages[1]->url) }}'>{{$pages[1]->translate()->title}}</a></li>
            <li  class="footer-logo-item"><a href="/" class="logo">
                    <img src="{{asset('logo.png')}}" alt="logo" width="170" height="92">
                </a></li>
            <li class="mobile-first-column"><a href='{{ LaravelLocalization::localizeUrl($pages[3]->url) }}'>{{$pages[3]->translate()->title}}</a></li>
            <li  class="mobile-first-column"><a href='{{ LaravelLocalization::localizeUrl($pages[0]->url) }}'>{{$pages[0]->translate()->title}}</a></li>
            <li  class="mobile-first-column"><a href='{{ LaravelLocalization::localizeUrl("/contacts") }}'>@lang('main.contacts')</a></li>
            <li class="mobile-second-column footer-top-contact"><a href="tel:{{$settings->phone_1}}" class="footer-contacts-link">@include('frontend.includes.svg.tel'){{$settings->phone_1}}</a></li>
            <li class="mobile-second-column footer-top-contact" ><a href="tel:{{$settings->phone_2}}" class="footer-contacts-link">@include('frontend.includes.svg.tel'){{$settings->phone_2}}</a></li>
            <li class="mobile-second-column footer-top-email">
                <a href="mailto:{{$settings->email}}">@include('frontend.includes.svg.email'){{$settings->email}}</a>
            </li>
        </ul>
 		<ul class="footer-bottom">
            <li class="footer-menu copyright">
                <span>@lang('main.all_rights_reserved')</span>
            </li>
            <li class="footer-menu contacts">
                <ul class="footer-contacts-list">
                    <li><a href="tel:{{$settings->phone_1}}" class="footer-contacts-link">@include('frontend.includes.svg.tel'){{$settings->phone_1}}</a></li>
                    <li><a href="tel:{{$settings->phone_2}}" class="footer-contacts-link">@include('frontend.includes.svg.tel'){{$settings->phone_2}}</a></li>
                </ul>
            </li>
            <li class="footer-menu email">
                <a href="mailto:{{$settings->email}}">@include('frontend.includes.svg.email'){{$settings->email}}</a>
            </li>
        </ul>
 	</div>
</footer>
<div class="develop">
    <div class="develop-copyright">
        @lang('main.all_rights_reserved')
    </div>
    <p>@lang('main.website_creation')</p>
    <img  src="{{asset('frontend/images/a.jpg')}}" class="lazy" data-src="{{asset('/frontend/images/icons/spekter_white.png')}}" alt="@lang('main.website_creation') SPEKTER" width="76" height="21">
</div>
