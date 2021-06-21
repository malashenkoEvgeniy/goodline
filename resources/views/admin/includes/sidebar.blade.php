<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <a href="{{ url('/') }}" target="_blank" class="brand-link">
            @include('frontend.includes.svg.logo')
        </a>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('pages.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Страницы
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                    <i class="fas fa-folder-open"></i>
                    <p>
                        Категории
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-cookie-bite"></i>
                    <p>
                        Продукты
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('products.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Продукция</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('characteristics.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Характеристики</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('message.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Заявки
                        <span class="badge badge-info right">2</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('settings.index')}}" class="nav-link">
                    <i class="fas fa-id-card"></i>
                    <p>
                        Контакты
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Слайдеры
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('homeSliders.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Видео-слайдер</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('certificates.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Сертификаты</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-globe"></i>
                    <p>
                        {{ LaravelLocalization::getCurrentLocaleNative() }}
                        <i class="right fas fa-angle-left"></i>
                    </p>

                </a>
                <ul class="nav nav-treeview">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        <li class="nav-item">
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="nav-link {{Request::segment(2) == 'home_sliders'?'active':''}} ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ $properties['native'] }}</p>
                            </a>
                        </li>

                    @endforeach

                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
