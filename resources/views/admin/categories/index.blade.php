<!-- Left Side Of Navbar -->


@extends('admin.layouts')

@section('content')
<div class="container col-8">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card">
        <div class="card-header">Категории</div>

        <div class="card-body">
            <ul class="navbar-nav mr-auto" id="mainMenu">
                @php
                function buildMenu($items, $parent)
                {
                    foreach ($items as $item) {
                       
                        if (isset($item->children)) {
                        @endphp
                            <li class="nav-item">
                                <a href="{{route('categories.edit',$item->id)}}"
                                    class="nav-link"
                                    
                                    
                                >
                                    {{ $item->translate()->page_title }}
                                </a>
                                <ul class="navbar-collapse"
                                    
                                    
                                >
                                    @php buildMenu($item->children, 'subnav-'.$item->id) @endphp
                                </ul>
                            </li>
                        @php
                        } else {
                        @endphp
                            <li class="nav-item 12312">
                                <a href="{{ $item->url }}" class="nav-link">{{ $item->translate()->page_title }}</a>
                            </li>
                        @php
                        }
                    }
                }
                buildMenu($menuitems, 'mainMenu')
                @endphp
            </ul>
            
            <a href="{{ route('categories.create') }}" class="btn btn-primary mt-4" >Создать</a>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  

@endsection