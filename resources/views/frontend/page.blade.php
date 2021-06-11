@extends('frontend.layout')


@section('links')
<link rel="stylesheet" href="/frontend/css/breadcrumbs.css">
<link rel="stylesheet" href="/frontend/css/page.css">

@endsection


@section('content')
@include('frontend.includes.breadcrumbs')

<div class="content-wrapper page">
	<h2 class="title"><span>{{$page->translate()->title}}</span></h2>
	<div class="page__body">
		{!! $page->translate()->body!!}
	</div>	
</div>


@endsection


@section('scripts')



@endsection