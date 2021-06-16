<div class="sidebar">
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="active"><a href="{{route('pages.index')}}"><i class="fa fa-link"></i> <span>Страницы</span></a></li>
        <li><a href="{{route('categories.index')}}"><i class="fa fa-link"></i> <span>Категории</span></a></li>
        <li><a href="{{route('products.index')}}"><i class="fa fa-link"></i> <span>Продукция</span></a></li>
        <li><a href="{{route('message.index')}}"><i class="fa fa-link"></i> <span>Заявки</span></a></li>
        <li><a href="{{route('settings.index')}}"><i class="fa fa-link"></i> <span>Контакты</span></a></li>
        <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>Слайдеры</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('homeSliders.index') }}">Видео-слайдер</a></li>
                <li><a href="{{ route('certificates.index') }}">Сертификаты</a></li>
            </ul>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('main-page.index') }}" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-home"></i>--}}
{{--                <p>Главная</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{route('form_requests.index')}}" class="nav-link {{Request::segment(2) == 'form_requests'?'active':''}}">--}}
{{--                <i class="fas fa-envelope nav-icon"></i>--}}
{{--                <p>Заявки  <span class="right badge badge-info">{{$newRequests}}</span></p>--}}
{{--            </a>--}}
{{--    </li>--}}
{{--        <li class="nav-item has-treeview">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-archive"></i>--}}
{{--                <p>--}}
{{--                    Категории--}}
{{--                    <i class="right fas fa-angle-left"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('categories.index') }}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Список категорий</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('categories.create') }}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Новая категория</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item has-treeview">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-truck-monster"></i>--}}
{{--                <p>--}}
{{--                    Марки техники--}}
{{--                    <i class="right fas fa-angle-left"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('models.index') }}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Список марок</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('models.create') }}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Новая марка</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item has-treeview">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-car-side"></i>--}}
{{--                <p>--}}
{{--                    Список моделей техники--}}
{{--                    <i class="right fas fa-angle-left"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('type-models.index') }}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Список моделей техники</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('type-models.create') }}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Новая модель</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item has-treeview">--}}
{{--            <a href="#" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-file"></i>--}}
{{--                <p>--}}
{{--                    Страницы--}}
{{--                    <i class="right fas fa-angle-left"></i>--}}
{{--                </p>--}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('page.index') }}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Список страниц</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('page.create') }}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Новая страница услуги</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('certificate.index') }}" class="nav-link">--}}
{{--                        <i class="far fa-circle nav-icon"></i>--}}
{{--                        <p>Наши сертификаты</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="nav-item ">--}}
{{--            <a href="{{route('contacts.edit',['id'=>1])}}" class="nav-link ">--}}
{{--                <i class="nav-icon far fa-id-card"></i>--}}
{{--                <p>--}}
{{--                    Контакты--}}
{{--                </p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item has-treeview">--}}
{{--            <a href="#" class="nav-link ">--}}
{{--                <i class="nav-icon fas fa-globe"></i>--}}
{{--                <p>--}}
{{--                    {{ LaravelLocalization::getCurrentLocaleNative() }}--}}
{{--                    <i class="right fas fa-angle-left"></i>--}}
{{--                </p>--}}
{{--    --}}
{{--            </a>--}}
{{--            <ul class="nav nav-treeview">--}}
{{--                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
{{--    --}}
{{--                    <li class="nav-item">--}}
{{--                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="nav-link {{Request::segment(2) == 'home_sliders'?'active':''}} ">--}}
{{--                            <i class="far fa-circle nav-icon"></i>--}}
{{--                            <p>{{ $properties['native'] }}</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--    --}}
{{--                @endforeach--}}
{{--    --}}
{{--            </ul>--}}
{{--        </li>--}}
    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
