<!-- Left Side Of Navbar -->


@extends('admin.layouts')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card">
        <div class="card-header">Категории</div>

        <div class="card-body">
            <a href="{{ route('categories.create') }}" class="btn btn-primary mt-4" >Создать</a>
            @include('admin.includes.alerts')
            @if (count($categories))
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-nowrap" style="background-color: #cccccc">
                        <thead>
                        <tr>
                            <th style="width: 30px">#</th>
                            <th>Наименование</th>
                            <th>Изображение</th>
                            <th>Банер</th>
                            <th>Иконка для меню</th>
                            <th>Slug</th>
                            <th>Родительская категория</th>
                            <th>Actions</th>
                            {{--                                                <th>Количество единиц</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $category->translate()->title }}</td>
                                <td><img src="{{$category->image !== null ? $category->image : '/uploads/category/a.jpg'}}" alt="img" width="100" height="50"></td>
                                <td><img src="{{$category->banner !== null ? $category->banner : '/uploads/category/a.jpg'}}" alt="img" width="100" height="50"></td>
{{--                                <td><img src="{{$category->icon !== null ? $category->icon : '/uploads/category/a.jpg'}}" alt="img" width="100" height="50"></td>--}}
                                <td>@if($category->icon!=null){!! file_get_contents(public_path().$category->icon) !!}@endif</td>
                                <td>{{ $category->url }}</td>
                                <td>{{ $category->parent_id ? $category->parent->translate()->title : 'not parent'}}</td>

                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="post" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Подтвердите удаление')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>Категорий пока нет...</p>
            @endif

        </div>
      <div class="card-footer clearfix">
          {{ $categories->links() }}
      </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')


@endsection
