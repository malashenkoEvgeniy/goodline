@extends('admin.layouts')


@section('links')


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Редактирование Продукции</div>
                <div class="card-body">
                  <div class="card mb-4">
                    <div class="card-header">Слайды</div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($product->productImages()->get() as $slide)
                            <div class="col-4">
                                <img style="width:100%; height:auto; " src="{{$slide->image}}" alt="">
                                <form class="text-center mt-2" action="{{route('destroySlide')}}" method="POST" onsubmit="return confirm('Удалить?') ? true : false;">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="id" value="{{$slide->id}}">
                                    <button type="submit" class="btn btn-danger btn-delete">Удалить</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>



					    <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}



                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Слайды</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" multiple name="image[]" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                          </div>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Название</span>
                          </div>
                          <input type="text" class="form-control" name="title" @isset($product->translate()->title) value="{{$product->translate()->title}}" @endisset >
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
                            <span class="input-group-text">Артикул</span>
                          </div>
                          <input type="text" class="form-control" name="vendor_code" @isset($product->vendor_code) value="{{$product->vendor_code}}" @endisset>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Краткое описание</span>
                          </div>
                          <input type="text" class="form-control" name="short_description" @isset($product->translate()->short_description) value="{{$product->translate()->short_description}}" @endisset>
                        </div>
                            <h5 class="card-title">Характеристики</h5>
                            <div class="mb-3">
                                <textarea  name="characteristics" id="editor2" >@isset($product->translate()->characteristics) {{$product->translate()->characteristics}} @endisset</textarea>
                            </div>

                            <h5 class="card-title">Ингредиенты</h5>
                            <div class="mb-3">
                                <textarea  name="ingredients" id="editor3" >@isset($product->translate()->ingredients) {{$product->translate()->ingredients}} @endisset</textarea>
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Url</span>
                              </div>
                              <input type="text" class="form-control" name="url" @isset($product->url) value="{{$product->url}}" @endisset>
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Отображается в</span>
                              </div>
                              <select class="form-control multiple-select" name="categories_id[]" multiple="multiple">

                                  @foreach($categories as $item)
                                    <option @if(in_array($item->id,$selectedCategories)) selected="selected" @endif value="{{$item->id}}">{{ $item->translate()->title}}</option>
                                  @endforeach
                              </select>
                            </div>



                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Seo Заголовок</span>
                          </div>
                          <input type="text" class="form-control" name="seo_title" @isset($product->translate()->seo_title) value="{{$product->translate()->seo_title}}" @endisset>
                        </div>

                        <h5 class="card-title">Seo Описание</h5>
                        <div class="mb-3">
                          <textarea  name="seo_description" id="editor3" >@isset($product->translate()->seo_description){{$product->translate()->seo_description}} @endisset</textarea>
                        </div>

                        <h5 class="card-title">Seo ключевые слова</h5>

                        <div class="mb-3">
                          <textarea  name="seo_keywords" id="editor4" >@isset($product->translate()->seo_keywords){{$product->translate()->seo_keywords}} @endisset</textarea>
                        </div>

                        <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </form>

                    <form class="mt-2" action="{{route('products.destroy',$product->id)}}" method="POST" onsubmit="return confirm('Удалить?') ? true : false;">
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

    tinymce.init({
      selector: '#editor4'
    });
  </script>

@endsection
