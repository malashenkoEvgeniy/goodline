@extends('admin.layouts')

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Редактирование сертификата</div>

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

                    <form action="{{route('certificates.update',$certificate->id)}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <img src="{{$certificate->image !== null ? $certificate->image : '/uploads/category/a.jpg'}}" alt="img" width="100" height="50">
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
                          <input type="text" class="form-control" name="title" value="{{$certificate->translate()->title}}">
                        </div>

                        <h5 class="card-title">Описание</h5>
                        <div class="mb-3">
                          <textarea  name="body" id="editor1" >
                            @isset($certificate->translate()->body){{$certificate->translate()->body}}@endisset
                          </textarea>
                        </div>
                        <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                        <button type="submit" class="btn btn-primary">Обновить</button>


                    </form>

                    <form class="mt-4" action="{{route('certificates.destroy',$certificate->id)}}" method="POST" onsubmit="return confirm('Удалить?') ? true : false;">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-delete">Удалить</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
    tinymce.init({
      selector: '#editor1',
      plugins: [
      "advlist autolink lists link image charmap print preview anchor",
      "searchreplace visualblocks code fullscreen",
      "insertdatetime media table paste imagetools wordcount"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    content_css: '//www.tiny.cloud/css/codepen.min.css'
    });

    tinymce.init({
      selector: '#editor2'
    });

    tinymce.init({
      selector: '#editor3'
    });
  </script>



@endsection
