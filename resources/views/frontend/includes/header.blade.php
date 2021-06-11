<header>
  <div class="header-top">
      <ul class="header-top-list">
          <li class="header-top-item header-top-item-logo">
              <a href="/" class="header-top-link">
                  @include('frontend.includes.svg.logo')
              </a>
          </li>
          <li class="header-top-item header-top-contacts">
              <ul class="header-top-contacts-list">
                  <li><a href="tel:{{$settings->phone_1}}">@include('frontend.includes.svg.tel'){{$settings->phone_1}}</a></li>
                  <li><a href="tel:{{$settings->phone_2}}">@include('frontend.includes.svg.tel'){{$settings->phone_2}}</a></li>
              </ul>
          </li>
          <li class="header-top-item header-top-item-email">
              <a href="mailto:{{$settings->email}}">@include('frontend.includes.svg.email'){{$settings->email}}</a>
          </li>
          <li class="header-top-item header-top-item-lang">
              <div class="lang-selector">
                  <div class="current-lang">
                      <span class="lang-name">{{ LaravelLocalization::getCurrentLocaleName() }}</span>

                      @include('frontend.includes.svg.dropdown_angle')
                  </div>

                  <div class="lang-items">
                      <ul>
                          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                              <li>
                                  <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                      <span>{{ $properties['name'] }}</span>
                                  </a>
                              </li>
                          @endforeach
                      </ul>
                  </div>
              </div>
          </li>
          <li class="header-top-item header-top-item-hamburger">
              @include('frontend.includes.hamburger')
          </li>
      </ul>
  </div>
  <div class="header-bottom">
  	<div class="header-bottom-content">
  		<div class="categories">
  			<div class="categories-link">
  				<span>@lang('main.production')</span>
  				@include('frontend.includes.svg.catalog_burger')
{{--                @include('frontend.includes.svg.catalog_close')--}}
  			</div>
			<div class="menu-categories">
			<ul class="categories-items">
                @foreach($categories as $el)
                <li class="categories-item">
                    <a href='{{ LaravelLocalization::localizeUrl("$el->url") }}'>{{$el->translate()->title}} </a>

                </li>
                @endforeach
            </ul>
		</div>
  		</div>
  		<div class="main-menu">
  			<ul class="main-menu-items">
                  @foreach($pages as $page)
                    <li class="main-menu-item"> <a href='{{ LaravelLocalization::localizeUrl("$page->url") }}'> {{$page->translate()->title}}</a>
                        @if($page->url == 'o-glyutene')
                            @include('frontend.includes.svg.dropdown_angle')
                            @if($page->hasKids)
                                {{dd(254)}}
                            @endif
                        @endif
                    </li>
                  @endforeach
  				<li class="main-menu-item"> <a href="/contacts"> @lang('main.contacts') </a> </li>
  			</ul>
  		</div>
  	</div>
  </div>
</header>
