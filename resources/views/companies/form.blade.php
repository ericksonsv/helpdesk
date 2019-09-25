<div class="card border-0 shadow-sm">
	<div class="card-header p-2">
		<a href="{{ route('companies.index') }}" class="btn btn-sm btn-dark shadow-sm">
			<i class="fas fa-backward mr-2"></i><span>{{ __('Back') }}</span>
		</a>
	</div>
	<div class="card-body">
		<fieldset>

			{{-- Name --}}
			<div class="form-group mb-4">
				<label for="name" class="font-weight-bold">{{ __('Name') }}</label>
				<input type="text" name="name" id="name" class="form-control shadow-sm @error('name') is-invalid @enderror" value="{{ old('name') }}@isset($company){{ $company->name }}@endisset">
				@error('name')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Logo --}}
			<div class="form-group mb-4">
				<label for="logo" class="font-weight-bold d-block">{{ __('Logo') }}</label>
				<input type="file" name="logo" id="logo">
				@error('logo')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Banner --}}
			<div class="form-group mb-4">
				<label for="banner" class="font-weight-bold d-block">{{ __('Banner') }}</label>
				<input type="file" name="banner" id="banner">
				@error('banner')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Address --}}
			<div class="form-group mb-4">
				<label for="address" class="font-weight-bold">{{ __('Address') }}</label>
				<textarea name="address" id="address" class="form-control shadow-sm @error('address') is-invalid @enderror">

				</textarea>
				@error('address')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Phone --}}
			<div class="form-group mb-4">
				<label for="phone" class="font-weight-bold">{{ __('Phone') }}</label>
				<input type="text" name="phone" id="phone" class="form-control shadow-sm @error('phone') is-invalid @enderror" value="{{ old('phone') }}@isset($company){{ $company->phone }}@endisset">
				@error('phone')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Site --}}
			<div class="form-group mb-4">
				<label for="site" class="font-weight-bold">{{ __('Site') }}</label>
				<input type="text" name="site" id="site" class="form-control shadow-sm @error('site') is-invalid @enderror" value="{{ old('site') }}@isset($company){{ $company->site }}@endisset">
				@error('site')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- email --}}
			<div class="form-group mb-4">
				<label for="email" class="font-weight-bold">{{ __('Email') }}</label>
				<input type="email" name="email" id="email" class="form-control shadow-sm @error('email') is-invalid @enderror" value="{{ old('email') }}@isset($company){{ $company->email }}@endisset">
				@error('email')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- facebook --}}
			<div class="form-group mb-4">
				<label for="facebook" class="font-weight-bold">{{ __('Facebook') }}</label>
				<input type="text" name="facebook" id="facebook" class="form-control shadow-sm @error('facebook') is-invalid @enderror" value="{{ old('facebook') }}@isset($company){{ $company->facebook }}@endisset">
				@error('facebook')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- twitter --}}
			<div class="form-group mb-4">
				<label for="twitter" class="font-weight-bold">{{ __('Twitter') }}</label>
				<input type="text" name="twitter" id="twitter" class="form-control shadow-sm @error('twitter') is-invalid @enderror" value="{{ old('twitter') }}@isset($company){{ $company->twitter }}@endisset">
				@error('twitter')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- instagram --}}
			<div class="form-group mb-4">
				<label for="instagram" class="font-weight-bold">{{ __('Instagram') }}</label>
				<input type="text" name="instagram" id="instagram" class="form-control shadow-sm @error('instagram') is-invalid @enderror" value="{{ old('instagram') }}@isset($company){{ $company->instagram }}@endisset">
				@error('instagram')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- youtube --}}
			<div class="form-group mb-4">
				<label for="youtube" class="font-weight-bold">{{ __('Youtube') }}</label>
				<input type="text" name="youtube" id="youtube" class="form-control shadow-sm @error('youtube') is-invalid @enderror" value="{{ old('youtube') }}@isset($company){{ $company->youtube }}@endisset">
				@error('youtube')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

		</fieldset>
	</div>
	<div class="card-footer p-2 text-right">
		<button class="btn btn-dark btn-sm shadow-sm">
			<i class="fas fa-save mr-2"></i>
			@isset ($company)
			    {{ __('Save') }}
			@else
					{{ __('Create') }}
			@endisset
		</button>
	</div>
</div>