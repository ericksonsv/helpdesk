@extends('layouts.app')

@section('content')
	<div class="container">

		<h3 class="my-5">{{ __('Employees Signatures') }}</h3>

		<div class="row">

			<div class="col-md-3">
				<h6 class="mb-4">{{ __('Filter By:') }}</h6>
				<small>
					<div class="custom-control custom-radio my-1">
					  <input type="radio" id="show-all" name="customRadio" class="custom-control-input" data-filter="all">
					  <label class="custom-control-label" for="show-all">{{ __('Show All') }}</label>
					</div>
					<div class="custom-control custom-radio my-1">
					  <input type="radio" id="hide-all" name="customRadio" class="custom-control-input" data-filter="none">
					  <label class="custom-control-label" for="hide-all">{{ __('Hide All') }}</label>
					</div>
					@foreach ($employees as $employee)
						<div class="custom-control custom-radio my-1">
						  <input type="radio" id="employee-{{$employee->id}}" name="customRadio" class="custom-control-input" data-filter=".employee-{{$employee->id}}">
						  <label class="custom-control-label" for="employee-{{$employee->id}}">{{ $employee->full_name }}</label>
						</div>
					@endforeach
				</small>
			</div>

			<div class="col-md">
					<div class="elements">
						@foreach ($employees as $employee)
							<div class="mix card border-0 rounded-0 shadow-sm card-body employee-{{$employee->id}} mb-2">
								<h2 style="margin: 0"><strong>{{ $employee->full_name }}</strong></h2>
							</div>
						@endforeach
					</div>
			</div>

		</div>
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('mixitup/mixitup.min.js') }}"></script>
	<script>
		let containerEl = document.querySelector('.elements');
		let mixer = mixitup(containerEl);
	</script>
@endsection