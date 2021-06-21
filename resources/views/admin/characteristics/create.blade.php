@extends('admin.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Создать характеристику</div>

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

                    <form action="{{route('characteristics.store')}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}

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
                            <span class="input-group-text">Название</span>
                          </div>
                          <input type="text" class="form-control" name="title" required>
                        </div>
                        <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
