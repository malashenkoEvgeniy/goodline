<footer>
	<a href="#site-content" class="btn-up">
		@include('frontend.includes.svg.dropdown_angle')
	</a>
 	<div class="footer-content">
 		<div class="footer-top">
 			<div class="footer-menu menu-left">
 				<ul>
 					<li><a href='{{ LaravelLocalization::localizeUrl("/") }}'>@lang('main.main')</a></li>
 					<li><a href='{{ LaravelLocalization::localizeUrl("/about-us") }}'>@lang('main.about_us')</a></li>
 					<li><a href='{{ LaravelLocalization::localizeUrl("/examples") }}'>@lang('main.work_examples')</a></li>
 					
 				</ul>
 			</div>
 			<div class="logo">
 				@include('frontend.includes.svg.logo_white')
 			</div>
 			<div class="footer-menu menu-right">
 				<ul>
 					@foreach($pages as $page)
			            <li> <a href='{{ LaravelLocalization::localizeUrl("$page->url") }}'> {{$page->translate()->title}}</a> </li>
			        @endforeach

 					<li><a href='{{ LaravelLocalization::localizeUrl("/contacts") }}'>@lang('main.contacts')</a></li>
 				</ul>
 			</div>
 		</div>

 		<div class="footer-bottom">
 			<div class="footer-menu contacts">
 				<ul>
 					<li><a href="tel:{{$settings->phone_1}}">{{$settings->phone_1}}</a></li>
 					<li><a href="tel:{{$settings->phone_2}}">{{$settings->phone_2}}</a></li>
 					<!-- <li><a href="tel:{{$settings->phone_3}}">{{$settings->phone_3}}</a></li> -->
 				</ul>
 			</div>
 			<div class="develop">
 				<p>@lang('main.website_creation')</p>
 				<img src="/frontend/images/icons/spekter_white.png" alt="@lang('main.website_creation') SPEKTER">
 			</div>
 			<div class="copyright">
 				<span>@lang('main.all_rights_reserved')</span>
 			</div>
 		</div>
 	</div>
</footer>