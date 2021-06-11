
@extends('admin.layouts')

@section('content')
<section class="content" style="margin-left: 250px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Страницы</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('admin.includes.alerts')
                        <a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">Добавить
                            страницу</a>
                        @if (count($pages))
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th style="width: 30px">#</th>
                                        <th>Наименование</th>
{{--                                        <th>Изображение</th>--}}
                                        <th>Slug</th>
                                        <th>Actions</th>
                                        {{--                                                <th>Количество единиц</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pages as $page)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $page->translate()->title }}</td>
{{--                                            <td><img src="{{$category->images !== null ? $category->images : '/assets/admin/img/default_img.jpg'}}" alt="img" width="100" height="50"></td>--}}
                                            <td>{{ $page->url }}</td>

                                            <td>
                                                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <form action="{{ route('pages.destroy', ['id' => $page->id]) }}" method="post" class="float-left">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Подтвердите удаление')">
                                                        <i
                                                            class="fas fa-trash-alt"></i>
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
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
{{--                        {{ $pages->links() }}--}}
                    </div>
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('scripts')


@endsection
