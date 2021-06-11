@extends('frontend.layout')


@section('links')
<link rel="stylesheet" href="/frontend/css/breadcrumbs.css">
<link rel="stylesheet" href="/frontend/css/about_us.css">

@endsection


@section('content')
@include('frontend.includes.breadcrumbs')

<div class="content-wrapper">
	<h1 class="title"><span>{{$aboutUs->translate()->page_title}}</span></h1>
	<div class="about-us">
		<div class="about-us__body">
			<div class="about-us__top">
				{!! $aboutUs->translate()->body_top !!}
			</div>
			<div class="about-us__info-items">
				@foreach($aboutUsItems as $key => $item)
				<div class="about-us__info-item">
					@if($item->is_image)
					<img src="{{$item->file_path}}" alt="{{$item->translate()->title}}">
					@else
					<iframe class="lazy-load" data-src="{{$item->link}}" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					@endif

					<div class="about-us__info-body">
						<h2>{{$item->translate()->title}}</h2>
						<p>{{$item->translate()->body}}</p>
					</div>	
				</div>
				@endforeach
			</div>
			<div class="about-us__bottom">
				{!! $aboutUs->translate()->body_bottom !!}
			</div>
		</div>
	</div>	
</div>

@include('frontend.includes.google_map')
@endsection


@section('scripts')
<script src="/frontend/js/lazy_load.js"></script>


@endsection