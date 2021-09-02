@extends('admin.layouts')

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Главный слайдер</div>

                <div class="card-body">

                    <div class="row ">
                        <div class="col-3">
                           <h5 class="card-title text-center">Картинка / Видео</h5>
                        </div>

                        <div class="col-3">
                           <h5 class="card-title text-center"> Заголовок</h5>
                        </div>

                        <div class="col-3">
                           <h5 class="card-title text-center"> Описание</h5>
                        </div>

                        <div class="col-3">
                           <h5 class="card-title text-center"> Опции</h5>
                        </div>
                    </div>


                    @if(count($sliders)>0)
                        @foreach($sliders as $slide)
                        <div class="row mt-4">
                            <div class="col-3">
                                @if($slide->is_image)
                                    <img style="width: 100%; height: auto;" src="{{$slide->media->img_prev}}" alt="">
                                @else
                                    <iframe  style="width: 100%; height: auto;" src="{{$slide->file_path}}" frameborder="0"></iframe>
                                @endif
                            </div>

                            <div class="col-3">
                                @isset($slide->translate()->title)
                                <p>{{$slide->translate()->title}}</p>
                                @endisset
                            </div>

                            <div class="col-3">
                                @isset($slide->translate()->sub_title)
                                <p>{{$slide->translate()->sub_title}}</p>
                                @endisset

                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <a href="{{ route('homeSliders.edit',$slide->id)}}" class="btn btn-warning mr-2">Редактировать</a>
                                    <form action="{{ route('homeSliders.destroy',$slide->id)}}" method="POST" onsubmit="return confirm('Удалить?') ? true : false;">
                                        {!! csrf_field() !!}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-delete">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p>Слайдов нет</p>
                    @endif

                    <a href="{{ route('homeSliders.create' )}}" class="btn btn-primary" >Создать слайд</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
