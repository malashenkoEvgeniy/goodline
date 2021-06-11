@extends('admin.layouts')

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Редактирование слайда</div>

                <div class="card-body">
                    
                    <form action="{{route('homeSliders.update',$slide->id)}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <div class="mb-2">
                       
                        @if($slide->is_image)
                            <img style="width: 100%; height: auto;" src="{{$slide->file_path}}" alt="">
                        @else
                            <iframe  style="width: 100%; height: auto;" src="{{$slide->file_path}}" frameborder="0"></iframe>
                        @endif
                        </div>
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
                          <input type="text" class="form-control" name="title" value="@isset($slide->translate()->title){{$slide->translate()->title}}@endisset">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Краткий текст</span>
                          </div>
                          <textarea name="sub_title" id="" cols="10" rows="3"  class="form-control">@isset($slide->translate()->sub_title){{$slide->translate()->sub_title}}@endisset
                          </textarea>
                        </div>

                        <input type="hidden" name="is_image" value="1">
                        <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
