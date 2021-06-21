<!-- Left Side Of Navbar -->


@extends('admin.layouts')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Характеристики</div>

                    <div class="card-body">
                        <a href="{{ route('characteristics.create') }}" class="btn btn-primary mt-4" >Создать</a>
                        @include('admin.includes.alerts')
                        @if (count($characteristics))
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th style="width: 30px">#</th>
                                        <th>Наименование</th>
                                        <th>Изображение</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($characteristics as $characteristic)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $characteristic->translate()->title }}</td>
                                            <td><img src="{{$characteristic->image !== null ? $characteristic->image : '/uploads/category/a.jpg'}}" alt="img" width="100" height="50"></td>
                                            <td>
                                                <a href="{{ route('characteristics.edit', $characteristic->id) }}" class="btn btn-info btn-sm float-left mr-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <form action="{{ route('characteristics.destroy', ['id' => $characteristic->id]) }}" method="post" class="float-left">
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
                            <p>Характеристик пока нет...</p>
                        @endif

                    </div>
                    <div class="card-footer clearfix">
                        {{ $characteristics->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')


@endsection
