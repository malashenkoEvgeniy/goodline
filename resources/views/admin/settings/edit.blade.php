@extends('admin.layouts')

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Контакты</div>

                <div class="card-body">
                    
                    <form action="{{route('settings.update',$settings->id)}}" method="POST">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        

                        

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Адрес</span>
                          </div>
                          <input type="text" class="form-control" name="address" value=" @isset($settings->translate()->address){{$settings->translate()->address}}@endisset">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Почта</span>
                          </div>
                          <input type="text" class="form-control" name="email" value=" @isset($settings->email){{$settings->email}}@endisset">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Почта для писем (с форм обратной связи)</span>
                          </div>
                          <input type="text" class="form-control" name="email_for_forms" value=" @isset($settings->email_for_forms){{$settings->email_for_forms}}@endisset">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Телефон 1</span>
                          </div>
                          <input type="text" class="form-control" name="phone_1" value=" @isset($settings->phone_1){{$settings->phone_1}}@endisset">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Телефон 2</span>
                          </div>
                          <input type="text" class="form-control" name="phone_2" value=" @isset($settings->phone_2){{$settings->phone_2}}@endisset">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Телефон 3</span>
                          </div>
                          <input type="text" class="form-control" name="phone_3" value=" @isset($settings->phone_3){{$settings->phone_3}}@endisset">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Телефон (В кнопке соц. сетей)</span>
                          </div>
                          <input type="text" class="form-control" name="phone_social" value=" @isset($settings->phone_social){{$settings->phone_social}}@endisset">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Viber</span>
                          </div>
                          <input type="text" class="form-control" name="viber" value=" @isset($settings->viber){{$settings->viber}}@endisset">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Telegram</span>
                          </div>
                          <input type="text" class="form-control" name="telegram" value=" @isset($settings->telegram){{$settings->telegram}}@endisset">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Название компании</span>
                          </div>
                          <input type="text" class="form-control" name="title" value=" @isset($settings->translate()->title){{$settings->translate()->title}}@endisset">
                        </div>

                        <h5 class="card-title">Описание (Главная страница)</h5>
                        <div class="mb-3">
                          <textarea  name="body" id="editor1">
                            @isset($settings->translate()->body){{$settings->translate()->body}}@endisset
                          </textarea>
                        </div>


                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Seo Заголовок (Главная страница)</span>
                          </div>
                          <input type="text" class="form-control" name="seo_title" value="@isset($settings->translate()->seo_title){{$settings->translate()->seo_title}}@endisset">
                        </div>

                        <h5 class="card-title">Seo Описание (Главная страница)</h5>
                        <div class="mb-3">
                          <textarea  name="seo_description" id="editor2" >
                            @isset($settings->translate()->seo_description){{$settings->translate()->seo_description}}@endisset
                          </textarea>
                        </div>
                        
                        <h5 class="card-title">Seo ключевые слова (Главная страница)</h5>

                        <div class="mb-3">
                          <textarea  name="seo_keywords" id="editor3" >
                             @isset($settings->translate()->seo_keywords){{$settings->translate()->seo_keywords}}@endisset
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


  </script>

@endsection