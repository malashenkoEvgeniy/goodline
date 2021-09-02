@extends('admin.layouts')

@section('content')
<div class="container">
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

                    <form action="{{route('pages.update',$page->id)}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}


                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Название страницы</span>
                          </div>
                          <input type="text" class="form-control" name="title" value=" @isset($page->translate()->title){{$page->translate()->title}}@endisset">
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
                        @if($page_parent !== null)
                        <div class="input-group mb-3">
                            <input type="hidden" value="{{$page_parent->id}}"  name="parent_id" >
                        </div>
                        @endif
                        <div class="input-group mb-3">
                            <h5 class="card-title mb-3">Описание</h5>
                        </div>
                        <div class="mb-3">
                          <textarea  name="body" class="editor" >
                              @isset($page->translate()->body){{$page->translate()->body}}@endisset
                          </textarea>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Seo Заголовок</span>
                            </div>
                            <input type="text" class="form-control" name="seo_title" value="@isset($page->translate()->seo_title){{$page->translate()->seo_title}}@endisset">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Seo ключевые слова</span>
                            </div>
                            <input type="text" class="form-control" name="seo_keywords" value=" @isset($page->translate()->seo_keywords){{$page->translate()->seo_keywords}}@endisset">
                        </div>

                        <div class="form-group">
                            <label>Seo Описание</label>
                            <textarea class="form-control"  name="seo_description" >
                                @isset($page->translate()->seo_description){{$page->translate()->seo_description}}@endisset
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


@endsection
