<div class="our-clients border-bottom-red">
	<div class="content-wrapper">
		<h2 class="title"><span>@lang('main.they_trust_us')</span></h2>
	</div>
	<div class="content-wrapper">
		<div class="our-clients__slider">
			<div class="our-clients__slider-items">
				@foreach($trustUs as $key => $item)
				<div class="our-clients__slider-item">
					<img src="{{$item->image}}" alt="@lang('main.they_trust_us') {{$key}}">
				</div>
				@endforeach
			</div>

			<div class="slider-switch slider-switch-white switch-left shadow">@include('frontend.includes.svg.slider-arrow')</div>
			<div class="slider-switch slider-switch-white switch-right shadow">@include('frontend.includes.svg.slider-arrow')</div>
		</div>
	</div>
</div>