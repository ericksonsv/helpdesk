@section('styles')
	<style>
		svg { border-radius: 50%; margin: 0 0 15px 15px; }
	</style>
@endsection

<div class="card border-0 shadow-sm" id="form-empployees">
	<div class="card-header p-2">
		<a href="{{ route('employees.index') }}" class="btn btn-sm btn-dark shadow-sm">
			<i class="fas fa-backward mr-2"></i><span>{{ __('Back') }}</span>
		</a>
	</div>
	<div class="card-body">
		<fieldset>

			{{-- Company --}}
			<div class="form-group mb-4">
				<label for="company" class="font-weight-bold">{{ __('Company') }}</label>
				<select v-model="company" name="company" id="company" class="custom-select shadow-sm @error('company') is-invalid @enderror" @change="getDepartments()">
				  <option value="">{{ __('Select a company') }}</option>
				  @foreach ($companies as $id => $name)
				  	<option value="{{ $id }}">{{ $name }}</option>
				  @endforeach
				</select>
				@error('company')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Department --}}
			<div class="form-group mb-4">
				<label for="department" class="font-weight-bold">{{ __('Department') }}</label>
				<select v-model="selectedDepartment" :disabled="disabled" name="department" id="department" class="custom-select shadow-sm @error('department') is-invalid @enderror">
				  <option value="">{{ __('Select a department') }}</option>
				  <option v-for="department in departments" :value="department.id" v-text="department.name"></option>
				</select>
				@error('department')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- First Name --}}
			<div class="form-group mb-4">
				<label for="first_name" class="font-weight-bold">{{ __('First Name') }}</label>
				<input type="text" name="first_name" id="first_name" class="form-control shadow-sm @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}@isset($employee){{ $employee->first_name }}@endisset">
				@error('first_name')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Last Name --}}
			<div class="form-group mb-4">
				<label for="last_name" class="font-weight-bold">{{ __('Last Name') }}</label>
				<input type="text" name="last_name" id="last_name" class="form-control shadow-sm @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}@isset($employee){{ $employee->last_name }}@endisset">
				@error('last_name')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Avatar --}}
			<div class="form-group mb-4">
				<label for="last_name" class="font-weight-bold">{{ __('Avatar') }}</label>
				@if (isset($employee))
					@if ($employee->avatar)
						{!! $employee->avatar !!}
					@endif
				@endif
				<textarea name="avatar" id="avatar" class="form-control shadow-sm @error('last_name') is-invalid @enderror">
					@if (isset($employee))
						@if ($employee->avatar)
							{{ $employee->avatar }}
						@endif
					@endif
				</textarea>
				{{-- <input type="text" name="last_name" id="last_name" class="form-control shadow-sm @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}@isset($employee){{ $employee->last_name }}@endisset"> --}}
				@error('avatar')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Email --}}
			<div class="form-group mb-4">
				<label for="email" class="font-weight-bold">{{ __('Email Address') }}</label>
				<input type="email" name="email" id="email" class="form-control shadow-sm @error('email') is-invalid @enderror" value="{{ old('email') }}@isset($employee){{ $employee->email }}@endisset">
				@error('email')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Position --}}
			<div class="form-group mb-4">
				<label for="position" class="font-weight-bold">{{ __('Position') }}</label>
				<input type="text" name="position" id="position" class="form-control shadow-sm @error('position') is-invalid @enderror" value="{{ old('position') }}@isset($employee){{ $employee->position }}@endisset">
				@error('position')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Extension --}}
			<div class="form-group mb-4">
				<label for="extension" class="font-weight-bold">{{ __('Extension') }}</label>
				<input type="text" name="extension" id="extension" class="form-control shadow-sm @error('extension') is-invalid @enderror" value="{{ old('extension') }}@isset($employee){{ $employee->extension }}@endisset">
				@error('extension')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Mobile --}}
			<div class="form-group mb-4">
				<label for="mobile" class="font-weight-bold">{{ __('Mobile') }}</label>
				<input type="text" name="mobile" id="mobile" class="form-control shadow-sm @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}@isset($employee){{ $employee->mobile }}@endisset">
				@error('mobile')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Skype --}}
			<div class="form-group mb-4">
				<label for="skype" class="font-weight-bold">{{ __('Skype') }}</label>
				<input type="text" name="skype" id="skype" class="form-control shadow-sm @error('skype') is-invalid @enderror" value="{{ old('skype') }}@isset($employee){{ $employee->skype }}@endisset">
				@error('skype')
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
			@isset ($employee)
			    {{ __('Save') }}
			@else
					{{ __('Create') }}
			@endisset
		</button>
	</div>
</div>

@section('scripts')
		<script>
			new Vue({
				el: '#form-empployees',
				data: {
					company: '{{ old('company') }}{{ isset($employee) ? $employee->company->id : '' }}',
					selectedDepartment: '{{ old('department') }}{{ isset($employee) ? $employee->department->id : '' }}',
					departments: [],
					disabled: true
				},
				created: function () {
					this.getDepartments();
				},
				methods: {
					getDepartments: function() {
						if (this.company != '') {
							axios.get(`http://10.0.0.13/helpdesk/public/api/departments/${this.company}`).then((data) => {
								if (data.data.length != 0) {
									this.disabled = false;
									this.departments = data.data;
								} else {
									this.departments = [];
									this.disabled = true;
								}
							});
						} else {
							this.departments = [];
							this.disabled = true;
						}
					}
				}
			});
		</script>
@endsection