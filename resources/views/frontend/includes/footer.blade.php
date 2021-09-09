<div class="social-share-footer">
    <div class="share">
        <p class="share__title">@lang('main.share_buttons_title')</p>

        <div class="share__buttons">
            <a class="share__button" target="_blank" href="https://twitter.com/intent/tweet?status=https://good-line.com.ua/">
                @include('frontend.includes.svg.social.share_twitter')
            </a>

            <a class="share__button" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://good-line.com.ua/">
                <svg width="25" height="25" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M50 25C50 11.1914 38.8086 0 25 0C11.1914 0 0 11.1914 0 25C0 38.8086 11.1914 50 25 50C25.1465 50 25.293 50 25.4395 49.9902V30.5371H20.0684V24.2773H25.4395V19.668C25.4395 14.3262 28.7012 11.416 33.4668 11.416C35.752 11.416 37.7148 11.582 38.2812 11.6602V17.2461H35C32.4121 17.2461 31.9043 18.4766 31.9043 20.2832V24.2676H38.1055L37.2949 30.5273H31.9043V49.0332C42.3535 46.0352 50 36.416 50 25Z" fill="#4867AA"/>
                </svg>
            </a>

            <a class="share__button " target="_blank" href="https://telegram.me/share/url?url=https://good-line.com.ua/">
                @include('frontend.includes.svg.social.share_telegram')
            </a>


            <a class="share__button" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=https://good-line.com.ua/">
                @include('frontend.includes.svg.social.share_linkedin')
            </a>

{{--            <a class="share__button " target="_blank" href="https://mail.google.com/mail/u/0/?ui=2&view=cm&fs=1&tf=1&body=https://good-line.com.ua/">--}}
{{--                @include('frontend.includes.svg.social.share_google')--}}
{{--            </a>--}}

            <a class="share__button" target="_blank" href="https://web.skype.com/share?url=https://good-line.com.ua/">
                @include('frontend.includes.svg.social.share_skype')
            </a>

            <a class="share__button" target="_blank" href="viber://forward?text=https://good-line.com.ua/">
                @include('frontend.includes.svg.social.share_viber')
            </a>

            <a class="share__button" target="_blank" href="whatsapp://send?text=https://good-line.com.ua/">
                @include('frontend.includes.svg.social.share_whatsapp')
            </a>

        </div>

    </div>

</div>
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
            <li class="mobile-second-column footer-top-contact"><a href="tel:{{trim($settings->phone_1)}}" class="footer-contacts-link">@include('frontend.includes.svg.tel'){{$settings->phone_1}}</a></li>
            <li class="mobile-second-column footer-top-contact" ><a href="tel:{{trim($settings->phone_2)}}" class="footer-contacts-link">@include('frontend.includes.svg.tel'){{$settings->phone_2}}</a></li>
            <li class="mobile-second-column footer-top-email">
                <a href="mailto:{{trim($settings->email)}}">@include('frontend.includes.svg.email'){{$settings->email}}</a>
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
