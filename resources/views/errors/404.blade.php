@extends('frontend.layout')


@section('links')
    <style>
        .error-404 {
            width: 320px;
            margin:  0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .error-title {
            font-size: 150px;
            line-height: 1;
            color: #262626;
        }

        .error-title.active {
            color: #961B1B;
        }

        .error-404 div {
            text-align: center;
            font-size: 50px;
            line-height: 1;
        }

        .button_return {
            text-align: center;
            margin-top: 30px;
        }

    </style>
@endsection


@section('content')

<div class="error-404">
    <h2 class="error-title">404</h2>
    <div>Страница
        <div>не</div>
        найдена</div>
    <a href='{{ LaravelLocalization::localizeUrl("/") }}' class="btn btn-primary button_return"> <span class="button__title"> Перейти на главную</span></a>
</div>
@endsection
@section('scripts')
    <script>
        setInterval(function (){
            $('.error-title').toggleClass('active');
        }, 300);


    </script>
@endsection

