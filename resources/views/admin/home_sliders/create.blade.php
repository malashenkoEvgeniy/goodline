@extends('admin.layouts')

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Создать слайд</div>

                <div class="card-body">
                    
                    <form action="{{route('homeSliders.store')}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Картинка</span>
                            <span class="input-group-text">Видео</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" name="file_path" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Заголовок</span>
                          </div>
                          <input type="text" class="form-control" name="title">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Краткий текст</span>
                          </div>
                          <textarea name="sub_title" id="" cols="10" rows="3"  class="form-control"></textarea>
                        </div>

                        <input type="hidden" name="is_image" value="1">
                        <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
