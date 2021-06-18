@extends('frontend.layout')


@section('links')

<link rel="stylesheet" href="/frontend/css/catalog.css">
<link rel="stylesheet" href="/frontend/css/breadcrumbs.css">

@endsection


@section('content')




<div class="page-thumbnail" style="background-image: url({{$page->banner}})">
	@include('frontend.includes.breadcrumbs')
	<h2 class="title"><span>{{ $page->translate()->title}}</span></h2>
</div>



<div class="catalog-navigation">
	<div class="content-wrapper">
		<div class="catalog-tabs">

			@if(count($categoryChildren) != 0 && $categoryChildren !== null)
				@foreach($categoryChildren as $key => $item)

				<div class="catalog-tabs-item @if($page->url == $item->url ) active @endif">
					<a class="catalog-tabs-item-content" href='{{ LaravelLocalization::localizeUrl("$item->url") }}'>
						<img src="{{ $item->image}}" alt="{{ $item->translate()->title}}">
						<h2 class="tab-title">{{ $item->translate()->title}}</h2>
					</a>
				</div>

				@endforeach
			@endif

			@if($parentCategoryChildren !== null && count($parentCategoryChildren) != 0)
				@foreach($parentCategoryChildren as $key => $item)

				<div class="catalog-tabs-item @if($page->url == $item->url ) active @endif">
					<a class="catalog-tabs-item-content" href='{{ LaravelLocalization::localizeUrl("$item->url") }}'>
						<img src="{{ $item->image}}" alt="{{ $item->translate()->title}}">
						<h2 class="tab-title">{{ $item->translate()->title}}</h2>
					</a>
				</div>

				@endforeach
			@endif

		</div>
	</div>
</div>




@if(count($products)>0)

<div class="content-wrapper ">
	<div class="products-on-page">
		<span>@lang('main.items_per_page'): <span> <span class="amount-products">{{$products->count()}}</span> из {{$quantityProducts}}</span> </span>
	</div>

	<div class="catalog ">
		<div class="catalog-items">
			@foreach($products as $product)
			<div class="catalog-item ">
				<a href='{{ LaravelLocalization::localizeUrl("$product->url") }}' class="img-src"><img src="@isset($product->productImages()->first()->image){{$product->productImages()->first()->image}}@endisset" alt="{{$product->translate()->title}}"></a>
				<div class="catalog-item-hidden-desc">
					<div class="catalog-item-hidden-desc-bg">
						<a class="catalog-item__title" href='{{ LaravelLocalization::localizeUrl("$product->url") }}'>{{$product->translate()->title}}</a>

						<div class="catalog-item-description">
							<p>{{$product->translate()->short_description}}</p>
							<div class="btn show-more">
								<a href='{{ LaravelLocalization::localizeUrl("$product->url") }}'>@lang('main.detail')</a>
							</div>
						</div>

					</div>
				</div>
			</div>

			@endforeach

		</div>

		@if( $products->nextPageUrl() !== null)
		<div class="btn show-more">
			<span class="show-more-products"  data-page="{{$products->nextPageUrl()}}">
				@lang('main.show_more')
			</span>
		</div>
		@endif
	</div>

</div>

@endif

<div class="catalog-body section-padding">
	<div class="content-wrapper">
		{!! $page->translate()->body !!}
	</div>

</div>




@endsection


@section('scripts')

<script>

	$('.catalog-tabs-item').click(function(){
		$('.catalog-tabs-item.active').removeClass('active');
		$(this).toggleClass('active');
	});


	$('.show-more-products').click(function(){

		let page = $(this).attr('data-page');



		$.ajax({
			method: 'GET',
			url: page,
			data: {
				_token: '{{csrf_token()}}',
			}
		}).done(function(data){
			let page = $(data);
			let items = page.find('.catalog-item');

			let amoutOfProducts = page.find('.amount-products').html();
			let amountProductsOnPage = $('.amount-products').html();

			$('.amount-products').text( parseInt(amoutOfProducts) + parseInt(amountProductsOnPage));

			if (page.find('.show-more-products').length == 1) {
				let nextPage = page.find('.show-more-products').attr('data-page');
				$('.show-more-products').attr('data-page', nextPage);
			}else{
				$('.show-more-products').remove();
			}

			$('.catalog-items').append(items);

		});
	});


</script>

@endsection
