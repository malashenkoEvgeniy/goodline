@extends('admin.layouts')


@section('links')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Создание Продукции</div>
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
                <div class="card-body">
					        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Картинки</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" multiple name="image[]" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                          </div>
                        </div>
                        <div class="input-group mb-3" style="display: flex; flex-direction: column">
                            <div class="input-group-prepend" style="margin: 0 auto 50px auto" >
                                <span class="input-group-text">Свойства товара</span>
                            </div>
                            <div  style=" display: flex; justify-content: space-between;">
                                @foreach($characteristics as $characteristic)
                                    <div class="" style=" display: flex; flex-direction: column; align-items: center;">
                                        <img src="{{asset($characteristic->image)}}" alt="check{{$characteristic->id}}" width="50" height="50">
                                        <label for="check{{$characteristic->id}}">{{$characteristic->translate()->title}}</label>
                                        <input type="checkbox" name="properties[{{$characteristic->id}}]" id="check{{$characteristic->id}}" >
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Название</span>
                          </div>
                          <input type="text" class="form-control translit" name="title" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Краткое описание</span>
                            </div>
                            <input type="text" class="form-control" name="short_desc" min="2" max="255">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Артикул</span>
                          </div>
                          <input type="text" class="form-control" name="vendor_code" required>
                        </div>
                                <div class="input-group mb-3">
                                    <h5 class="card-title">Описание</h5>
                                </div>
                                <div class="mb-3">
                                    <textarea  name="description" id="editor1" ></textarea>
                                </div>
                        <div class="input-group mb-3">
                            <h5 class="card-title">Характеристики</h5>
                        </div>
                        <div class="mb-3">
                            <textarea  name="characteristics" id="editor2" ></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <h5 class="card-title">Ингредиенты</h5>
                        </div>
                        <div class="mb-3">
                            <textarea  name="ingredients" id="editor3" ></textarea>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Url</span>
                          </div>
                          <input type="text" class="form-control translit_to" name="url">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Отображается в</span>
                          </div>
                          <select class="form-control multiple-select" name="categories_id[]" multiple="multiple">
                              @foreach($categories as $item)
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



    <script>
        $(document).ready(function() {
            $('.multiple-select').select2();
        });
    </script>



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
          selector: '#editor2',
          plugins: [
              "advlist autolink lists link image charmap print preview anchor",
              "searchreplace visualblocks code fullscreen",
              "insertdatetime media table paste imagetools wordcount"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
          content_css: '//www.tiny.cloud/css/codepen.min.css'
      });
      tinymce.init({
          selector: '#editor3',
          plugins: [
              "advlist autolink lists link image charmap print preview anchor",
              "searchreplace visualblocks code fullscreen",
              "insertdatetime media table paste imagetools wordcount"
          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
          content_css: '//www.tiny.cloud/css/codepen.min.css'
      });

    function urlLit(w,v) {
        var tr='a b v g d e ["zh","j"] z i y k l m n o p r s t u f h c ch sh ["shh","shch"] ~ y ~ e yu ya ~ ["jo","e"]'.split(' ');
        var ww=''; w=w.toLowerCase();

        for(i=0; i<w.length; ++i) {
            cc=w.charCodeAt(i); ch=(cc>=1072?tr[cc-1072]:w[i]);
            if(ch.length<3) ww+=ch; else ww+=eval(ch)[v];
        }
        return(ww.replace(/[^a-zA-Z0-9\-]/g,'-').replace(/[-]{2,}/gim, '-').replace( /^\-+/g, '').replace( /\-+$/g, ''));
    }

    $( document ).ready(function() {
        $('.translit').bind('change keyup input click', function(){
            $('.translit_to').val(urlLit($('.translit').val(),0))
        });
    });
  </script>

@endsection
