@extends('admin.layouts')

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Картинки</div>

                <div class="card-body">

                    
                    @if(count($files)>0)
                        @foreach($files as $item)
                        <div class="row mt-4 mb-4">
                            <div class="col-3">
                                <img style="width: 100%; height: auto;" src="{{$item->file}}" alt="">
                            </div>

                            
                            <div class="col-3">
                               
                                <form action="{{ route('files.destroy',$item)}}" method="POST" onsubmit="return confirm('Удалить?') ? true : false;">
                                    {!! csrf_field() !!}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-delete">Удалить</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p>Загрузите файлы</p>
                    @endif
                    
                    <a href="{{ route('files.create' )}}" class="btn btn-primary" >Загрузить</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
