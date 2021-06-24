@extends('frontend.layout')


@section('links')
<link rel="stylesheet" href="/frontend/css/breadcrumbs.css">
<link rel="stylesheet" href="/frontend/css/contact_us.css">


@endsection


@section('content')
<div class="page-thumbnail" style="background-image: url('/frontend/images/page_thumbnail/contacts.jpg');">
	@include('frontend.includes.breadcrumbs')
	<h2 class="title"><span>{{$breadcrumbs->current}}</span></h2>
</div>

<div class="content-wrapper contact-wrapper">
	<div class="contact_us">
		<div class="contact_us-info">
			<h2>{{$page->translate()->title}}</h2>
			<p>{{$page->translate()->address}}</p>
			<div class="contact_us-link"><a class="email" href="mailto:{{$page->email}}">{{$page->email}}</a></div>
			<div class="contact_us-link"><a class="phone" href="tel:{{$page->phone_1}}">{{$page->phone_1}}</a></div>
			<div class="contact_us-link"><a class="phone" href="tel:{{$page->phone_2}}">{{$page->phone_2}}</a></div>


		</div>
		<div class="contact_us-form">
            <h3 class="contact_us-form-title">@lang('main.form.to_contact_us')</h3>
			<form action="{{route('sendForm')}}" method="POST">
			{!! csrf_field() !!}
				<div class="input-group group-input">
					<label for="input_name">@lang('main.form.name')</label>
					<input type="text" id="input_name" name="name" placeholder="@lang('main.form.input_name')" required>
				</div>
				<div class="input-group group-input">
					<label for="input_phone">@lang('main.form.phone')</label>
					<input type="text" id="input_phone" name="phone" placeholder="@lang('main.form.input_phone')" required>
				</div>
				<div class="input-group group-input">
					<label for="input_email">@lang('main.form.email')</label>
					<input type="text" id="input_email" name="email" placeholder="@lang('main.form.input_email')">
				</div>
				<div class="input-group group-msg">
					<label for="input_message">@lang('main.form.message')</label>
					<textarea name="message" id="input_message" cols="30" rows="10">@lang('main.form.input_message')</textarea>
				</div>
				<button class="btn shadow" type="submit"> <span>@lang('main.form.send') @include('frontend.includes.svg.slider-arrow')</span></button>
			</form>
		</div>
        @include('frontend.includes.google_map')
	</div>

</div>



@endsection


@section('scripts')
<script src="/frontend/js/lazy_load.js"></script>
<script>
    if( window.screen.width <= 768 && window.screen.width > 568){
        $('.input-group').wrapAll('<div class="contact-first-wrap"></div>');
        $('.group-input').wrapAll('<div class="contact-second-wrap"></div>');
        $('.group-msg').siblings('.input-group').fadeOut();
    }
</script>

@endsection
