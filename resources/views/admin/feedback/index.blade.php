
@extends('admin.layouts')

@section('content')
<div class="container col-8">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card">
        <div class="card-header">Заявки</div>

        <div class="card-body">


            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Email</th>
                    <th scope="col">Создана</th>
                    <th scope="col"></th>

                    </tr>
                </thead>
                    <tbody>

                        @foreach($feedbacks as $feedback)
                        <tr>
                        <th scope="row">{{ $feedback->name}}</th>
                        <th scope="row">{{$feedback->phone}}</th>
                        <th scope="row">{{$feedback->email}}</th>
                        <th scope="row">{{$feedback->created_at}}</th>

                        
                        

                        <td>
                            <div class="col">
                                <div class="row">
                                    <a class="mr-3 btn btn-warning" href="{{ route('message.show',$feedback->id)}}">Посмотреть</a>
                                    
                                </div>
                                
                            </div>
                            
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            


        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  

@endsection