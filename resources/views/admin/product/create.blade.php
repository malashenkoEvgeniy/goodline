@extends('admin.layouts')


@section('links')


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Создание Продукции</div>

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
                            <span class="input-group-text">Артикул</span>
                          </div>
                          <input type="text" class="form-control" name="vendor_code" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Краткое описание</span>
                            </div>
                            <input type="text" class="form-control" name="short_description">
                        </div>

                        <h5 class="card-title">Характеристики</h5>
                        <div class="mb-3">
                            <textarea  name="characteristics" id="editor2" ></textarea>
                        </div>

                        <h5 class="card-title">Ингредиенты</h5>
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
                          <input type="text" class="form-control" name="seo_title" >
                        </div>

                        <h5 class="card-title">Seo Описание</h5>
                        <div class="mb-3">
                          <textarea  name="seo_description"></textarea>
                        </div>

                        <h5 class="card-title">Seo ключевые слова</h5>

                        <div class="mb-3">
                          <textarea  name="seo_keywords" ></textarea>
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


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>

    <script>
        $(document).ready(function() {
            $('.multiple-select').select2();
        });
    </script>

   <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
    tinymce.init({
      selector: '#editor1'
    });

    tinymce.init({
      selector: '#editor2'
    });

    tinymce.init({
      selector: '#editor3'
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
