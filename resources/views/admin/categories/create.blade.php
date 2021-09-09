@extends('admin.layouts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Создать категорию</div>

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

                    <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
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
                            <span class="input-group-text">Название категории</span>
                          </div>
                          <input type="text" class="form-control" name="title" required>
                        </div>

                        <div class="input-group mb-3">
                            <h5 class="card-title mb-3">Описание</h5>
                        </div>
                        <div class="mb-3">
                          <textarea  name="body" class="editor" >

                          </textarea>
                        </div>
                        <div class="input-group mb-3">
                            <h5 class="card-title mb-3">Текст для сео-блока</h5>
                        </div>
                        <div class="mb-12">
                          <textarea  name="text_seo_block" style="width: 100%" class="editor1"   >  </textarea>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Родитель</span>
                          </div>
                          <select class="form-control" name="parent_id">
                            <option value="">нет родителя</option>
                              @foreach($categories_parent  as $item)
                                <option value="{{$item->id}}">{{ $item->translate()->title}}</option>
                              @endforeach
                          </select>
                        </div>



                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Seo Заголовок</span>
                            </div>
                            <input type="text" class="form-control" name="seo_title">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Seo ключевые слова</span>
                            </div>
                            <input type="text" class="form-control" name="seo_keywords">
                        </div>

                        <div class="form-group">
                            <label>Seo Описание</label>
                            <textarea class="form-control"  name="seo_description" ></textarea>
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


@section('scripts')
{{--    <script>--}}
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
