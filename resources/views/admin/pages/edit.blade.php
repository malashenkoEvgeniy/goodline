@extends('admin.layouts')

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Редактирование страницы</div>

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

                    <form action="{{route('pages.update',$page->id)}}" method="POST">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}


                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Название страницы</span>
                          </div>
                          <input type="text" class="form-control" name="title" value=" @isset($page->translate()->title){{$page->translate()->title}}@endisset">
                        </div>
                        @if($page_parents !== null)
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Сменить родительскую страницу</span>
                            </div>
                            <div class="parent_id-wrap">
                                @foreach($page_parents as  $item)
                                    <div class="parent_id-wrap-item">
                                        <input type="radio" value="{{$item->id}}" id="p{{$item->id}}" name="parent_id" @if($page->parent_id ==$item->id)checked @endif>
                                        <label for="p{{$item->id}}">{{$item->translate()->title}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <h5 class="card-title">Описание</h5>
                        <div class="mb-3">
                          <textarea  name="body" id="editor1" >
                            @isset($page->translate()->body){{$page->translate()->body}}@endisset
                          </textarea>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Seo Заголовок</span>
                          </div>
                          <input type="text" class="form-control" name="seo_title" value="@isset($page->translate()->seo_title){{$page->translate()->seo_title}}@endisset">
                        </div>

                        <h5 class="card-title">Seo Описание</h5>
                        <div class="mb-3">
                          <textarea  name="seo_description" id="editor2" >
                            @isset($page->translate()->seo_description){{$page->translate()->seo_description}}@endisset
                          </textarea>
                        </div>

                        <h5 class="card-title">Seo ключевые слова</h5>

                        <div class="mb-3">
                          <textarea  name="seo_keywords" id="editor3" >
                             @isset($page->translate()->seo_keywords){{$page->translate()->seo_keywords}}@endisset
                          </textarea>
                        </div>

                        <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                        <button type="submit" class="btn btn-primary">Обновить</button>


                    </form>

                    <form class="mt-4" action="{{route('pages.destroy',$page->id)}}" method="POST" onsubmit="return confirm('Удалить?') ? true : false;">
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
