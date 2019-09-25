<div class="card border-0 shadow-sm">
	<div class="card-header p-2">
		<a href="{{ route('tasks.index') }}" class="btn btn-sm btn-dark shadow-sm">
			<i class="fas fa-backward mr-2"></i><span>{{ __('Back') }}</span>
		</a>
	</div>
	<div class="card-body">
		<fieldset>

			{{-- Title --}}
			<div class="form-group mb-4">
				<label for="title" class="font-weight-bold">{{ __('Title') }}</label>
				<input type="text" name="title" id="title" class="form-control shadow-sm @error('title') is-invalid @enderror" value="{{ old('title') }}@isset($task){{ $task->title }}@endisset">
				@error('title')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Description --}}
			<div class="form-group mb-4">
				<label for="description" class="font-weight-bold">{{ __('Description') }}</label>
				<textarea name="description" id="description" class="form-control shadow-sm @error('description') is-invalid @enderror">
					@isset($task){{ $task->description }}@endisset{{ old('description') }}
				</textarea>
				@error('description')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Requested By --}}
			<div class="form-group mb-4">
				<label for="requested" class="font-weight-bold">{{ __('Requested By') }}</label>
				<select name="requested" id="requested" class="custom-select shadow-sm @error('requested') is-invalid @enderror">
				  <option value="">{{ __('Select') }}</option>
				  @foreach ($employees as $employee)
				  	<option value="{{ $employee->id }}" @if (old('requested') == $employee->id) selected @endif @isset($task) @if ($task->requested == $employee->id) selected @endif @endisset>{{ $employee->first_name }} {{ $employee->last_name }}</option>
				  @endforeach
				</select>
				@error('requested')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Assigned To --}}
			<div class="form-group mb-4">
				<label for="assigned" class="font-weight-bold">{{ __('Assigned To') }}</label>
				<select name="assigned" id="assigned" class="custom-select shadow-sm @error('assigned') is-invalid @enderror">
				  <option value="">{{ __('Select') }}</option>
				  @foreach ($employees as $employee)
				  	<option value="{{ $employee->id }}" @if (old('assigned') == $employee->id) selected @endif @isset($task) @if ($task->assigned == $employee->id) selected @endif @endisset>{{ $employee->first_name }} {{ $employee->last_name }}</option>
				  @endforeach
				</select>
				@error('assigned')
				    <span class="invalid-feedback" role="alert">
				        <strong>{{ $message }}</strong>
				    </span>
				@enderror
			</div>

			{{-- Status --}}
			<div class="form-group mb-4">
				<label for="status" class="font-weight-bold">{{ __('Status') }}</label>
				<select name="status" id="status" class="custom-select shadow-sm @error('status') is-invalid @enderror">
					<option value="0" @if (isset($task)) @if ($task->status == 0) selected	@endif @endif>{{ __('Pendding') }}</option>
					<option value="1" @if (isset($task)) @if ($task->status == 1) selected	@endif @endif>{{ __('Completed') }}</option>
				</select>
				@error('status')
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
			@isset ($task)
			    {{ __('Save') }}
			@else
					{{ __('Create') }}
			@endisset
		</button>
	</div>
</div>