@extends('admin.layouts')
<style>

</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Создание страницы</div>

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

                    <form action="{{route('pages.store')}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}


                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Название страницы</span>
                          </div>
                          <input type="text" class="form-control translit" name="title" required >
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
                            <input type="hidden" value="{{$page->id}}" id="p{{$page->id}}" name="parent_id">
                        </div>
                        <div class="input-group mb-3">
                            <h5 class="card-title mb-3">Описание</h5>
                        </div>
                        <div class="mb-3">
                          <textarea  name="body" class="editor">
                          </textarea>
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
    tinymce.init({
      selector: '#editor1'
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
