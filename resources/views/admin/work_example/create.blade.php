@extends('admin.layouts')


@section('links')

@endsection

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Загрузка примеров работ</div>

                <div class="card-body">
					        <form action="{{route('workExamples.store')}}" method="POST" enctype="multipart/form-data">
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

                        <button type="submit" class="btn btn-primary">Загрузить</button>
                    </form>

					
				      </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

@endsection