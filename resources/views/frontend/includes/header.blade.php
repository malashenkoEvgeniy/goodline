<div style="display:none">
    @foreach($categories as $el)
        {!! file_get_contents(public_path().$el->icon) !!}
    @endforeach
</div>
<header>
  <div class="header-top">
      <ul class="header-top-list">
          <li class="header-top-item header-top-item-logo">
              <a href="/" class="header-top-link">
                  <img src="{{asset('logo.png')}}" alt="logo" width="170" height="92">
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
    <div class="header-bottom-top">
        <ul class="header-bottom-top-list">
            <li class="header-bottom-top-item header-bottom-top-item-logo">
                <a href="/" class="header-bottom-top-link">
                    <img src="{{asset('logo.png')}}" alt="logo" width="75" height="40">
                </a>
            </li>
            <li class="header-bottom-top-item header-top-item-lang">
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
            <li class="header-bottom-top-item header-top-item-close">
                <button class="header-bottom-top-btn_close">
                    @include('frontend.includes.svg.btn_close')
                </button>

            </li>
        </ul>
    </div>
  	<div class="header-bottom-content">
  		<div class="categories">
  			<div class="categories-link">
  				<span>@lang('main.production')</span>
  				@include('frontend.includes.svg.catalog_burger')
                <span class="categories-link-svg-mobile">@include('frontend.includes.svg.dropdown_angle')</span>
  			</div>
			<div class="menu-categories menu-categories-open hidden_cat">
			    <ul class="categories-items">
                    @foreach($categories as $el)
                    <li class="categories-item">
                        <a href='{{ LaravelLocalization::localizeUrl("$el->url") }}' class="categories-item-link">
                            <div class="temp">
                            {!! file_get_contents(public_path().$el->icon) !!}
                            </div>
                            <span>{{$el->translate()->title}}</span>
                            @if(count($el->children)>0)
                                <span class="categories-link-svg-mobile">@include('frontend.includes.svg.dropdown_angle')</span>
                            @endif

                        </a>

                        @if(count($el->children)>0)

                            <div class="subcategories-wrap">
                                <ul class="subcategories-list">
                                    @foreach($el->children as $subel)
                                        <li class="subcategories-item">
                                            <a href='{{ LaravelLocalization::localizeUrl("$subel->url") }}' class="subcategories-link">
                                                <img src="{{asset($subel->image)}}" alt="{{$subel->translate()->title}}" width="170" height="170">
                                                {{$subel->translate()->title}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>
                    @endforeach
                </ul>
		    </div>
  		</div>
  		<div class="main-menu">
  			<ul class="main-menu-items">
                  @foreach($pages as $page)
                        <li class="main-menu-item"> <a href='{{ LaravelLocalization::localizeUrl("$page->url") }}'> {{$page->translate()->title}}</a>
                    </li>
                  @endforeach
  				<li class="main-menu-item"> <a href="/contacts"> @lang('main.contacts') </a> </li>
  			</ul>
  		</div>
  	</div>
    <div class="header-bottom-footer">
          <ul class="header-bottom-footer-list">
              <li class="header-bottom-footer-item ">
                      <a href="mailto:{{$settings->email}}" class="header-bottom-footer-link">@include('frontend.includes.svg.email'){{$settings->email}}</a>
              </li>
              <li class="header-bottom-footer-item">
                  <ul class="header-bottom-footer-contacts-list">
                      <li><a href="tel:{{$settings->phone_1}}">@include('frontend.includes.svg.tel'){{$settings->phone_1}}</a></li>
                      <li><a href="tel:{{$settings->phone_2}}">@include('frontend.includes.svg.tel'){{$settings->phone_2}}</a></li>
                  </ul>
              </li>
          </ul>
</div>
  </div>
</header>
