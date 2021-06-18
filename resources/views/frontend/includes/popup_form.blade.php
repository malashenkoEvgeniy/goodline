<div class="popup-form-bg" id="contact-from-bg">
	<div class="popup-form">
		<div class="popup-form-top">
			<div class="title"><span>@lang('main.product.find_out_the_cost')</span></div>
			<div class="close-form">
				@include('frontend.includes.svg.icon_close')
			</div>

		</div>
		<div class="popup-form-body">
			<form action="{{route('sendForm')}}" method="post">
			{!! csrf_field() !!}
				<div class="input-group">
					<label for="input_name">@lang('main.form.name')</label>
					<input type="text" id="input_name" name="name" placeholder="@lang('main.form.input_name')" required>
				</div>
				<div class="input-group">
					<label for="input_phone">@lang('main.form.phone')</label>
					<input type="text" id="input_phone" name="phone" placeholder="@lang('main.form.input_phone')" required>
				</div>
				<div class="input-group">
					<label for="input_email">@lang('main.form.email')</label>
					<input type="text" id="input_email" name="email" placeholder="@lang('main.form.input_email')">
				</div>
				<div class="input-group">
					<label for="input_message">@lang('main.form.message')</label>
					<textarea name="message" id="input_message" cols="30" rows="5">@lang('main.form.input_message')</textarea>
				</div>
				<button class="btn shadow" type="submit"> <span>@lang('main.form.send') @include('frontend.includes.svg.slider-arrow')</span></button>
			</form>
		</div>
	</div>
</div>
