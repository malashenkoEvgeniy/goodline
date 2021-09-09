@extends('frontend.layout')
@section('links')
    <link rel="stylesheet" href="{{asset('/frontend/css/contact_us.css')}}">
@endsection
@section('content')
<div class="page-thumbnail" style="background-image: url('/frontend/images/page_thumbnail/contacts.jpg');">
	@include('frontend.includes.breadcrumbs')
    <div class="content-wrapper">
	    <h2 class="title"><span>{{$breadcrumbs->current}}</span></h2>
    </div>
</div>

<div class="content-wrapper contact-wrapper desc">
	<div class="contact_us">
        <div class="contact_us-wrapper">
            <div class="contact_us-info">
                <h1>{{$page->translate()->title}}</h1>
                <p class="contact_link">@include('frontend.includes.svg.map'){{$page->translate()->address}}</p>
                <div class="contact_us-link"><a class="email contact_link" href="mailto:{{trim($page->email)}}">@include('frontend.includes.svg.email'){{$page->email}}</a></div>
                <div class="contact_us-link"><a class="phone contact_link" href="tel:{{trim($page->phone_1)}}">@include('frontend.includes.svg.tel'){{$page->phone_1}}</a></div>
                <div class="contact_us-link"><a class="phone contact_link" href="tel:{{trim($page->phone_2)}}">@include('frontend.includes.svg.tel'){{$page->phone_2}}</a></div>


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
        </div>
        @include('frontend.includes.google_map')
	</div>
</div>
<div class="content-wrapper contact-wrapper mobile">
    <div class="contact_us">
        <div class="contact_us-wrapper">
            <div class="contact_us-info">
                <h2>{{$page->translate()->title}}</h2>
                <p class="contact_link">@include('frontend.includes.svg.map'){{$page->translate()->address}}</p>
                <div class="contact_us-link"><a class="email contact_link" href="mailto:{{trim($page->email)}}">@include('frontend.includes.svg.email'){{$page->email}}</a></div>
                <div class="contact_us-link"><a class="phone contact_link" href="tel:{{trim($page->phone_1)}}">@include('frontend.includes.svg.tel'){{$page->phone_1}}</a></div>
                <div class="contact_us-link"><a class="phone contact_link" href="tel:{{trim($page->phone_2)}}">@include('frontend.includes.svg.tel'){{$page->phone_2}}</a></div>


            </div>
            @include('frontend.includes.google_map')
        </div>
        <div class="contact_us-form">
            <h3 class="contact_us-form-title">@lang('main.form.to_contact_us')</h3>
            <form action="{{route('sendForm')}}" method="POST">
                {!! csrf_field() !!}
                <div class="contact-first-wrap">
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
                </div>
                <div class="contact-second-wrap">

                <div class="input-group group-msg">
                    <label for="input_message">@lang('main.form.message')</label>
                    <textarea name="message" id="input_message" cols="30" rows="10">@lang('main.form.input_message')</textarea>
                </div>
                </div>
                <button class="btn shadow" type="submit"> <span>@lang('main.form.send') @include('frontend.includes.svg.slider-arrow')</span></button>
            </form>
        </div>
    </div>
</div>




@endsection


@section('scripts')
{{--<script>--}}
{{--    if( window.screen.width <= 768 && window.screen.width > 568){--}}
{{--        $('.input-group').wrapAll('<div class="contact-first-wrap"></div>');--}}
{{--        $('.group-input').wrapAll('<div class="contact-second-wrap"></div>');--}}
{{--        $('.group-msg').siblings('.input-group').fadeOut();--}}
{{--    }--}}
{{--</script>--}}

@endsection
