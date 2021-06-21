@extends('admin.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Редактирование характеристики</div>

                <div class="card-body">
                    @include('admin.includes.alerts')
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('characteristics.update', $characteristic->id)}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <img src="{{$characteristic->image !== null ? $characteristic->image : '/uploads/category/a.jpg'}}" alt="img" width="100" height="50">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Картинка</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                          </div>

                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Название страницы</span>
                          </div>
                          <input type="text" class="form-control" name="title" value="{{$characteristic->translate()->title}}">
                        </div>
                        <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                        <button type="submit" class="btn btn-primary">Обновить</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

