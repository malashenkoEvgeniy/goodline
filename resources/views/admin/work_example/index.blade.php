@extends('admin.layouts')

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Примеры работ</div>

                <div class="card-body">

                <div class="card mb-4">
                    <div class="card-header">Параметры страницы</div>

                    <div class="card-body">
                        <form action="{{route('updateWorkExampleTranslate')}}" method="POST" >
                          {!! csrf_field() !!}

                        

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Название страницы</span>
                          </div>
                          <input type="text" class="form-control" name="title" value="@isset($page->translate()->title){{$page->translate()->title}}@endisset">
                        </div>

                        

                        <h5 class="card-title">Описание</h5>
                        <div class="mb-3">
                          <textarea  name="body" id="editor1" rows="10" cols="80">
                            @isset($page->translate()->body){{$page->translate()->body}}@endisset
                          </textarea>
                        </div>


                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Seo Заголовок</span>
                          </div>
                          <input type="text" class="form-control" name="seo_title" value="@isset($page->translate()->seo_title){{$page->translate()->seo_title}}@endisset">
                        </div>

                        <h5 class="card-title">Seo Описание</h5>
                        <div class="mb-3">
                          <textarea  name="seo_description" id="editor2" >
                            @isset($page->translate()->seo_description){{$page->translate()->seo_description}}@endisset
                          </textarea>
                        </div>
                        
                        <h5 class="card-title">Seo ключевые слова</h5>

                        <div class="mb-3">
                          <textarea  name="seo_keywords" id="editor3" >
                            @isset($page->translate()->seo_keywords){{$page->translate()->seo_keywords}}@endisset
                          </textarea>
                        </div>
                        <input type="hidden" name="language" value="{{ LaravelLocalization::getCurrentLocale() }}">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                      </form>
                    </div>
                </div>
					
                <table class="table table-bordered">
                    
                    <tbody>
                        @if( isset($images) )

                            @foreach($images as $image)
                            <tr>
                            <th scope="row"><img src="{{ $image->image}}" alt=""></th>
                            <td>
                                <div class="col">
                                    <div class="row">
                                        <a class="mr-3 btn btn-warning" href="{{ route('workExamples.edit',$image->id)}}">Редактировать</a>
                                        <form action="{{ route('workExamples.destroy',$image->id)}}" method="POST" onsubmit="return confirm('Удалить?') ? true : false;">
                                            {!! csrf_field() !!}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-delete">Удалить</button>
                                        </form>
                                    </div>
                                    
                                </div>
                               
                            </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
				<a href="{{route('workExamples.create')}}" class="btn btn-primary">Загрузить</a>

                

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