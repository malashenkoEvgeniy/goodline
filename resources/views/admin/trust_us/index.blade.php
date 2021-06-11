@extends('admin.layouts')

@section('content')
<div class="container col-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Нам доверяют</div>

                <div class="card-body">
					
                <table class="table table-bordered">
                    
                    <tbody>
                        @if( isset($images) )

                            @foreach($images as $image)
                            <tr>
                            <th scope="row"><img src="{{ $image->image}}" alt=""></th>
                            <td>
                                <div class="col">
                                    <div class="row">
                                        <a class="mr-3 btn btn-warning" href="{{ route('trustUs.edit',$image->id)}}">Редактировать</a>
                                        <form action="{{ route('trustUs.destroy',$image->id)}}" method="POST" onsubmit="return confirm('Удалить?') ? true : false;">
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
				          <a href="{{route('trustUs.create')}}" class="btn btn-primary">Создать</a>

                
                        
                   

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