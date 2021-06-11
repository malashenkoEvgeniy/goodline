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
          @include('frontend.includes.svg.catalog_close')
  			</div>
			<div class="menu-categories">
				<ul class="categories-items">


          @php
            function buildMenu($items, $parent)
            {
                foreach ($items as $item) {

                    if (isset($item->children) && count($item->children) > 0) {
                    @endphp
                        <li class="categories-item categories-item-has-children">
                            <a href='{{ LaravelLocalization::localizeUrl("$item->url") }}'>
                                {{ $item->translate()->page_title }}
                            </a>

                            <span class="categories-item__toggle-btn"><svg class="dropdown_angle" width="14px" height="8.3px" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6062 0.803223L11.4995 1.69654L5.99951 7.19654L0.499512 1.69654L1.39283 0.803223L5.99951 5.40991L10.6062 0.803223Z" fill="#C71F25"/>
                            </svg>
                            </span>





                            <ul class="sub-categories-items">
                                @php buildMenu($item->children, 'subnav-'.$item->id) @endphp
                            </ul>
                        </li>
                    @php
                    } else {
                    @endphp
                        <li class="categories-item">
                            <a href='{{ LaravelLocalization::localizeUrl("$item->url") }}'>{{ $item->translate()->page_title }}</a>
                        </li>
                    @php
                    }
                }
            }
            buildMenu($category, 'mainMenu')
            @endphp

          <li class="categories-item categories-item-separator categories-item-additional-item"></li>
          @foreach($pages as $page)
            <li class="categories-item categories-item-additional-item"> <a href='{{ LaravelLocalization::localizeUrl("$page->url") }}'> {{$page->translate()->title}}</a> </li>
          @endforeach

				</ul>
			</div>
  		</div>
  		<div class="main-menu">
  			<ul class="main-menu-items">
  				<li class="main-menu-item"> <a href="/about-us"> @lang('main.about_us') </a> </li>
          @foreach($pages as $page)
            @if($page->url !== 'vacancies')
              <li class="main-menu-item"> <a href='{{ LaravelLocalization::localizeUrl("$page->url") }}'> {{$page->translate()->title}}</a> </li>
            @endif
          @endforeach

  				<li class="main-menu-item"> <a href="/examples"> @lang('main.work_examples') </a> </li>
          <li class="main-menu-item"> <a href="/vacancies"> @lang('main.vacancies') </a> </li>
  				<li class="main-menu-item"> <a href="/contacts"> @lang('main.contacts') </a> </li>
  			</ul>
  		</div>
  	</div>
  </div>
</header>
