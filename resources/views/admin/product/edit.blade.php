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

                <div class="card mb-4">
                    <div class="card-header">Цвет</div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($product->productColors()->get() as $color)
                            <div class="d-flex flex-column align-items-center mr-2">
                              <div style="background-color: {{$color->color}}; width: 30px; height: 30px">
                                  
                              </div>

                              	<form class="text-center mt-2" action="{{route('destroyColor')}}" method="POST" onsubmit="return confirm('Удалить?') ? true : false;">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="color_id" value="{{$color->id}}">
                                    <button type="submit" class="btn btn-danger btn-delete">Удалить</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <form action="{{route('storeColor')}}" method="POST" class="col-12">
                      {!! csrf_field() !!}
                      <div class="input-group mb-3 ">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Прикрепить Цвет</span>
                          </div>
                          <input type="text" class="form-control" name="color">
                          <input type="hidden" name="product_id" value="{{$product->id}}">
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Прикрепить</button>
                    </form>
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

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Статус</span>
                          </div>
                          <select class="form-control" name="aviability" >

                                @if($product->aviability)
                                    <option  selected="selected" value="1">В наличии</option>
                                    <option value="0">Нет в наличии</option>

                                @else
                                    <option  value="1">В наличии</option>
                                    <option selected="selected" value="0">Нет в наличии</option>
                                @endif

                          </select>
                        </div>

                        {{-- 
                        <h5 class="card-title">Описание</h5>
                        <div class="mb-3">
                          <textarea  name="body" id="editor1" >@isset($product->translate()->body) {{$product->translate()->body}} @endisset</textarea>
                        </div>
                        --}}

                        <h5 class="card-title">Характеристики</h5>
                        <div class="mb-3">
                          <textarea  name="body2" id="editor2" >@isset($product->translate()->body2) {{$product->translate()->body2}} @endisset</textarea>
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
                                <option @if(in_array($item->id,$selectedCategories)) selected="selected" @endif value="{{$item->id}}">{{ $item->translate()->page_title}}</option>
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