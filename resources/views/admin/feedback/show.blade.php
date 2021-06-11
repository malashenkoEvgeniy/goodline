@extends('admin.layouts')

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Заявка</div>

                <div class="card-body">
                    
                    

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Имя</span>
                        </div>
                        <p class="form-control">@isset($feedback->name){{$feedback->name}}@endisset</p>                        
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                        </div>
                        <p class="form-control">@isset($feedback->email){{$feedback->email}}@endisset</p>                        
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Телефон</span>
                        </div>
                        <p class="form-control">@isset($feedback->phone){{$feedback->phone}}@endisset</p>                        
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Сообщение</span>
                        </div>
                        <p class="form-control">@isset($feedback->message){{$feedback->message}}@endisset</p>                        
                    </div>

                    @if($feedback->product_id !== null)
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Продукт</span>
                        </div>
                        <p class="form-control"> <a href="/@isset($product->url){{$product->url}}@endisset"> @isset($product->translate()->title){{$product->translate()->title}}@endisset  </a></p>                        
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Количество</span>
                        </div>
                        <p class="form-control">@isset($feedback->quantity){{$feedback->quantity}}@endisset</p>                        
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Цвет</span>
                        </div>
                        <div style="width:40px; height:40px; background-color:@isset($productColor->color){{$productColor->color}}@endisset;"></div>
                        <p >@isset($productColor->color){{$productColor->color}}@endisset</p>                        
                    </div>

                    @endif

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Создано</span>
                        </div>
                        <p class="form-control">{{$feedback->created_at}}</p>                        
                    </div>

                        
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
