<footer>
	<a href="#site-content" class="btn-up">
		@include('frontend.includes.svg.dropdown_angle')
	</a>
 	<div class="footer-content">
 		<div class="footer-top">
 			<div class="footer-menu menu-left">
 				<ul>
 					<li><a href='{{ LaravelLocalization::localizeUrl('catalog') }}'>@lang('main.production')</a></li>
 					<li><a href='{{ LaravelLocalization::localizeUrl($pages[2]->url) }}'>@lang('main.about_us')</a></li>
 					<li><a href='{{ LaravelLocalization::localizeUrl($pages[1]->url) }}'>{{$pages[1]->translate()->title}}</a></li>

 				</ul>
 			</div>
            <a href="/" class="logo">
                @include('frontend.includes.svg.logo')
            </a>
 			<div class="footer-menu menu-right">
 				<ul>
                    <li><a href='{{ LaravelLocalization::localizeUrl($pages[3]->url) }}'>{{$pages[3]->translate()->title}}</a></li>
                    <li><a href='{{ LaravelLocalization::localizeUrl($pages[0]->url) }}'>{{$pages[0]->translate()->title}}</a></li>
 					<li><a href='{{ LaravelLocalization::localizeUrl("/contacts") }}'>@lang('main.contacts')</a></li>
 				</ul>
 			</div>
 		</div>

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
        <div class="develop">
            <p>@lang('main.website_creation')</p>
            <img src="{{asset('/frontend/images/icons/spekter_white.png')}}" alt="@lang('main.website_creation') SPEKTER">
        </div>
 	</div>
</footer>
