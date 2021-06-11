@extends('admin.layouts')

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Редактирование категории</div>

                <div class="card-body">
                    
                    <form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <div class="mb-4 col-4">
                            <img style="width: 100%; height: auto;" src="{{$category->image}}">
                        </div>

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
                          <input type="text" class="form-control" name="page_title" value=" @isset($category->translate()->page_title){{$category->translate()->page_title}}@endisset">
                        </div>

                        <h5 class="card-title">Описание</h5>
                        <div class="mb-3">
                          <textarea  name="body" id="editor1" >
                            @isset($category->translate()->body){{$category->translate()->body}}@endisset
                          </textarea>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Url</span>
                          </div>
                          <input type="text" class="form-control" name="url" value="@isset($category->url){{$category->url}}@endisset">
                        </div>

                        <!-- <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Порядок</span>
                          </div>
                          <input type="text" class="form-control" name="sort_order">
                        </div> -->



                        <!-- <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                          </div>
                          <input type="text" class="form-control" name="live">
                        </div> -->

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Родитель</span>
                          </div>
                          <select class="form-control" name="parent_id">
                            @if(count($parent) > 0)
                            <option selected="selected" value="{{$parent['0']->id}}">
                              {{$parent['0']->translate()->page_title}}
                            </option>
                            @endif
                            <option value="">Родитель</option>
                              @foreach($menuitems as $item)
                                <option value="{{$item->id}}">{{ $item->translate()->page_title}}</option>
                              @endforeach
                          </select>
                        </div>


                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Seo Заголовок</span>
                          </div>
                          <input type="text" class="form-control" name="" value="@isset($category->translate()->seo_title){{$category->translate()->seo_title}}@endisset">
                        </div>

                        <h5 class="card-title">Seo Описание</h5>
                        <div class="mb-3">
                          <textarea  name="seo_description" id="editor2" >
                            @isset($category->translate()->seo_description){{$category->translate()->seo_description}}@endisset
                          </textarea>
                        </div>
                        
                        <h5 class="card-title">Seo ключевые слова</h5>

                        <div class="mb-3">
                          <textarea  name="seo_keywords" id="editor3" >
                             @isset($category->translate()->seo_keywords){{$category->translate()->seo_keywords}}@endisset
                          </textarea>
                        </div>

                        <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                        <button type="submit" class="btn btn-primary">Обновить</button>

                          
                    </form>

                    <form class="mt-4" action="{{route('categories.destroy',$category->id)}}" method="POST" onsubmit="return confirm('Удалить?') ? true : false;">
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