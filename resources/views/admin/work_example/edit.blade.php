@extends('admin.layouts')


@section('links')

@endsection

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Редактирование </div>

                <div class="card-body">
					    <form action="{{route('workExamples.update',$image->id)}}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <div class="col-3 mb-3"><img src="{{ $image->image}}" alt=""></div>
                        

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Картинки</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Выберите файл</label>
                          </div>
                        </div>



                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Позиция</span>
                          </div>
                          <input class="form-control" type="text" name="sort" value="{{$image->sort}}">
                        </div>

                        

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