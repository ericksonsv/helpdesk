@extends('layouts.app')

@section('styles')
	<style>
		.element-item { width: 100%; }
	</style>
@endsection

@section('content')
	<div class="container">

		<h3 class="my-5">{{ __('Employees Directory') }}</h3>

		<div class="row">

			<div class="col-md-3 mb-4 filters">
				<section class="sticky-top">
					<h6 class="mb-4">{{ __('Filter By:') }}</h6>
					<div class="custom-control custom-radio my-1">
					  <input type="radio" id="show-all" name="customRadio" class="custom-control-input" data-filter="*">
					  <label class="custom-control-label" for="show-all">{{ __('Show All') }}</label>
					</div>
					@foreach ($companies as $company)
						<div class="custom-control custom-radio my-1">
						  <input type="radio" id="company-{{$company->id}}" name="customRadio" class="custom-control-input" data-filter=".company-{{$company->id}}">
						  <label class="custom-control-label font-weight-bold" for="company-{{$company->id}}">{{ $company->name }}</label>
						</div>
						<div class="ml-2">
							@foreach ($company->departments as $department)
								<div class="custom-control custom-radio my-1">
								  <input type="radio" id="department-{{$department->id}}" name="customRadio" class="custom-control-input" data-filter=".department-{{$department->id}}">
								  <label class="custom-control-label" for="department-{{$department->id}}"><small>{{ $department->name }}</small></label>
								</div>
							@endforeach
						</div>
					@endforeach
				</section>
			</div>

			<div class="col-md">
					<div class="grid">
						@foreach ($companies as $company)
							<h3 class="element-item company-{{$company->id}} mb-3 @foreach ($company->departments as $department) department-{{$department->id}} @endforeach">{{ $company->name }}</h3>
							@foreach ($company->departments as $department)
								<h5 class="element-item department-{{$department->id}} company-{{$department->company_id}} my-3">{{ $department->name }}</h5>
								@foreach ($department->employees as $employee)
									<div class="card border-0 shadow-sm card-body mb-1 element-item company-{{$employee->company_id}} department-{{$employee->department_id}}">
										<h5 class="m-0 mb-2 font-weight-bold"><span>{{ $employee->full_name }}</span><br><small class="text-muted">{{ $employee->position }}</small></h5>
										@if ($employee->email)
										<p class="m-0"><i class="fas fa-envelope" style="width: 15px; text-align: center;"></i><span class="ml-2">{{ $employee->email }}</span></p>
										@endif
										@if ($employee->extension)
										<p class="m-0"><i class="fas fa-phone" style="width: 15px; text-align: center;"></i><span class="ml-2">{{ $employee->extension }}</span></p>
										@endif
										@if ($employee->mobile)
										<p class="m-0"><i class="fas fa-mobile-alt" style="width: 15px; text-align: center;"></i><span class="ml-2">{{ $employee->mobile }}</span></p>
										@endif
									</div>
								@endforeach
							@endforeach
						@endforeach
					</div>
			</div>

		</div>
	</div>
@endsection

@section('scripts')
	<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
	<script>
		// init Isotope
		var $grid = $('.grid').isotope({
		  itemSelector: '.element-item',
		  layoutMode: 'fitRows',
		  getSortData: {
		    name: '.name',
		    symbol: '.symbol',
		    number: '.number parseInt',
		    category: '[data-category]',
		    weight: function( itemElem ) {
		      var weight = $( itemElem ).find('.weight').text();
		      return parseFloat( weight.replace( /[\(\)]/g, '') );
		    }
		  }
		});

		// filter functions
		var filterFns = {
		  // show if number is greater than 50
		  numberGreaterThan50: function() {
		    var number = $(this).find('.number').text();
		    return parseInt( number, 10 ) > 50;
		  },
		  // show if name ends with -ium
		  ium: function() {
		    var name = $(this).find('.name').text();
		    return name.match( /ium$/ );
		  }
		};

		// bind filter button click
		$('.filters').on( 'change', 'input', function() {
		  var filterValue = $( this ).attr('data-filter');
		  // use filterFn if matches value
		  filterValue = filterFns[ filterValue ] || filterValue;
		  $grid.isotope({ filter: filterValue });
		});

		// change is-checked class on buttons
		$('.button-group').each( function( i, buttonGroup ) {
		  var $buttonGroup = $( buttonGroup );
		  $buttonGroup.on( 'click', 'button', function() {
		    $buttonGroup.find('.is-checked').removeClass('is-checked');
		    $( this ).addClass('is-checked');
		  });
		});
	</script>
	{{--  --}}
@endsection