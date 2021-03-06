@extends('admin.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Редактирование категории</div>

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

                    <form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Банер</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="banner" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                            </div>
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
                                <span class="input-group-text">Иконка для меню</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="icon" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Название страницы</span>
                          </div>
                          <input type="text" class="form-control" name="title" value=" @isset($category->translate()->title){{$category->translate()->title}}@endisset">
                        </div>
                        <div class="input-group mb-3">
                            <h5 class="card-title mb-3">Описание</h5>
                        </div>
                        <div class="mb-3">
                          <textarea  name="body" class="editor" id="editor1" >
                            @isset($category->translate()->body){{$category->translate()->body}}@endisset
                          </textarea>
                        </div>
                        <div class="input-group mb-3">
                            <h5 class="card-title mb-3">Текст для сео-блока</h5>
                        </div>
                        <div class="mb-12">
                            <textarea  name="text_seo_block" style="width: 100%" class="editor1" > @isset($category->translate()->text_seo_block){{$category->translate()->text_seo_block}}@endisset  </textarea>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Родитель</span>
                          </div>
                          <select class="form-control" name="parent_id">
                              @if($category->parent !== null)
                                  <option selected="selected" value="{{$category->parent->id}}"> {{$category->parent->translate()->title}} </option>
                              @endif
                                  <option value="">Родитель</option>
                                @if(count($categories_parent) > 0)
                                    @foreach($categories_parent as  $parent_item)
                                    <option  value="{{$parent_item->id}}">
                                      {{$parent_item->translate()->title}}
                                    </option>
                                      @endforeach
                                @endif

                          </select>
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Seo Заголовок</span>
                            </div>
                            <input type="text" class="form-control" name="seo_title" value="@isset($category->translate()->seo_title){{$category->translate()->seo_title}}@endisset">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Seo ключевые слова</span>
                            </div>
                            <input type="text" class="form-control" name="seo_keywords" value=" @isset($category->translate()->seo_keywords){{$category->translate()->seo_keywords}}@endisset">
                        </div>

                        <div class="form-group">
                            <label>Seo Описание</label>
                            <textarea class="form-control"  name="seo_description" >
                                @isset($category->translate()->seo_description){{$category->translate()->seo_description}}@endisset
                            </textarea>
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


@section('scripts')
{{--   <script>--}}
{{--      tinymce.init({--}}
{{--          selector: '#editor1',--}}
{{--          plugins: [--}}
{{--              "advlist autolink lists link image charmap print preview anchor",--}}
{{--              "searchreplace visualblocks code fullscreen",--}}
{{--              "insertdatetime media table paste imagetools wordcount"--}}
{{--          ],--}}
{{--          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",--}}
{{--          content_css: '//www.tiny.cloud/css/codepen.min.css'--}}
{{--      });--}}
{{--  </script>--}}



@endsection
