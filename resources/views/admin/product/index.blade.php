@extends('admin.layouts')

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Продукция</div>

                <div class="card-body">
					
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Название</th>
                        <th scope="col">Артикул</th>
                        <th scope="col">Краткое описание</th>
                        <th scope="col">Опции</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                        <th scope="row">{{ $product->translate()->title}}</th>
                        <td>{{$product->vendor_code}}</td>
                        <td>{{$product->translate()->short_description}}</td>
                        <td>
                            <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <a href="{{ route('products.edit',$product->id)}}" class="btn btn-warning mb-2 mr-2">Редактировать</a>
                                <form action="{{ route('products.destroy',$product->id)}}" method="POST" onsubmit="return confirm('Удалить?') ? true : false;">
                                    {!! csrf_field() !!}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-delete">Удалить</button>
                                </form>
                            </div>        
                                
                            </div>
                        </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
					
					<a href="{{route('products.create')}}" class="btn btn-primary">Создать</a>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@endsection