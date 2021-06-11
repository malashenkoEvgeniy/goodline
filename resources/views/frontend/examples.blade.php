@extends('frontend.layout')


@section('links')
<link rel="stylesheet" href="/frontend/css/breadcrumbs.css">
<link rel="stylesheet" href="/frontend/css/examples.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

@endsection


@section('content')
@include('frontend.includes.breadcrumbs')
<div class="content-wrapper">
	<h2 class="title"><span>{{$page->translate()->title}}</span></h2>
	
	<div class="examples">
		<div class="examples__items">
			@php 
			$i	= 1
			@endphp
			@foreach($images as $item)
			<div class="examples__item">
				<a data-fancybox="gallery" href="{{$item->image}}">
					<img src="{{$item->image}}" alt="{{$page->translate()->title . $i }}">
				</a>
			</div>

			@php 
			$i++
			@endphp
			
			@endforeach
		</div>
		@if( $images->nextPageUrl() !== null)
		<div class="btn show-more" >
			<span class="show-more-items" data-page="{{$images->nextPageUrl()}}">
				@lang('main.product.show_more')
			</span>
		</div>
		@endif
	</div>

	

</div>

<div class="examples-body section-padding">
	<div class="content-wrapper">
		<div class="examples-body__content">
			{!! $page->translate()->body !!}
		</div>
	</div>
</div>

@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script>
	$('.show-more-items').click(function(){

		let page = $(this).attr('data-page');
		
		$.ajax({
			method: 'GET',
			url: page,
			data: {
				_token: '{{csrf_token()}}',
			}
		}).done(function(data){
			let page = $(data);
			let items = page.find('.examples__item');
			if (page.find('.show-more-items').length == 1) {
				let nextPage = page.find('.show-more-items').attr('data-page');
				$('.show-more-items').attr('data-page', nextPage);
			}else{
				$('.show-more-items').remove();
			}

			$('.examples__items').append(items);

		});
	});
	
</script>


@endsection