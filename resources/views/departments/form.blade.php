<div class="card border-0 shadow-sm">
	<div class="card-header p-2">
		<a href="{{ route('departments.index') }}" class="btn btn-sm btn-dark shadow-sm">
			<i class="fas fa-backward mr-2"></i><span>{{ __('Back') }}</span>
		</a>
	</div>
	<div class="card-body">
		<fieldset>

			{{-- Company --}}
			<div class="form-group mb-4">
				<label for="company" class="font-weight-bold">{{ __('Company') }}</label>
				<select name="company" id="company" class="custom-select shadow-sm @error('company') is-invalid @enderror">
				  <option value="">{{ __('Select a company') }}</option>
				  @foreach ($companies as $id => $name)
				  	<option value="{{ $id }}" @if (old('company') == $id) selected @endif @isset($department) @if ($department->company_id == $id) selected @endif @endisset>{{ $name }}</option>
				  @endforeach
				</select>
				@error('company')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Name --}}
			<div class="form-group mb-4">
				<label for="name" class="font-weight-bold">{{ __('Name') }}</label>
				<input type="text" name="name" id="name" class="form-control shadow-sm @error('name') is-invalid @enderror" value="{{ old('name') }}@isset($department){{ $department->name }}@endisset">
				@error('name')
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
			@isset ($department)
			    {{ __('Save') }}
			@else
					{{ __('Create') }}
			@endisset
		</button>
	</div>
</div>