@extends('layouts.app')

@section('content')
	<div class="container">

		<h3 class="my-5">{{ __('List Of Tasks') }}</h3>

		<div class="row">

			<div class="col-md-2 mb-4 filters">
				<h6 class="mb-4">{{ __('Filter By:') }}</h6>
					<div class="custom-control custom-radio">
					  <input type="radio" id="show-all" name="customRadio" class="custom-control-input" data-filter="*">
					  <label class="custom-control-label" for="show-all">{{ __('Show All') }}</label>
					</div>
					<div class="custom-control custom-radio">
					  <input type="radio" id="task-completed" name="customRadio" class="custom-control-input" data-filter=".completed-task">
					  <label class="custom-control-label" for="task-completed">{{ __('Completed') }}</label>
					</div>
					<div class="custom-control custom-radio">
					  <input type="radio" id="task-pendding" name="customRadio" class="custom-control-input" data-filter=".pendding-task">
					  <label class="custom-control-label" for="task-pendding">{{ __('Pendding') }}</label>
					</div>
			</div>

			<div class="col-md elements">
				@foreach ($tasks as $task)
					<div class="grid">
							<div class="mix element-item card-task p-3 bg-white shadow-sm mb-2 border-left w-100 position-relative border-{{ $task->status ? 'primary' : 'warning' }} {{ $task->status ? 'completed-task' : 'pendding-task' }}">
								<div class="row">
									<div class="col-md-12 mb-2">
										<small class="text-muted">{{ __('Task') }}</small><br>
										<span>{{ $task->title }}</span><br>
										@if ($task->description)
											<small class="text-muted">{{ __('Description') }}</small><br>
											<button class="btn btn-info btn-sm shadow-sm" type="button" data-toggle="modal" data-target="#modal-description-{{$task->id}}" aria-expanded="false" aria-controls="modal-description-{{$task->id}}">
												{{ __('View Description') }}
											</button>
											{{--  --}}
											<div class="modal fade" id="modal-description-{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											  <div class="modal-dialog modal-dialog-centered" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalCenterTitle">{{ $task->title }}</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        {{ $task->description }}
											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
											      </div>
											    </div>
											  </div>
											</div>
											{{--  --}}
											<div class="collapse" id="collapse-description-{{$task->id}}">
											  <div class="card card-body p-3 mt-2 shadow-sm border-light">
											    {{ $task->description }}
											  </div>
											</div>
										@endif
									</div>
									<div class="col-md my-1">
										<small class="text-muted">{{ __('Requested By') }}</small><br>
										<span>{{ $task->requestedBy->first_name }}</span>
									</div>
									<div class="col-md my-1">
										<small class="text-muted">{{ __('Assigned To') }}</small><br>
										<span>{{ $task->assignedTo->first_name }}</span>
									</div>
									<div class="col-md my-1">
										<small class="text-muted">{{ __('Created At') }}</small><br>
										<span>{{ $task->created_at->diffForHumans() }}</span>
									</div>
									@if ($task->status)
									<div class="col-md my-1">
										<small class="text-muted">{{ __('Completed At') }}</small><br>
										<span>{{ $task->updated_at->diffForHumans() }}</span>
									</div>
									@endif
									<div class="col-md my-1">
										<small>{{ __('Status') }}</small><br>
										<span class="badge badge-{{ $task->status ? 'primary' : 'warning' }}">{{ $task->status ? 'Completed' : 'Pendding' }}</span>
									</div>
								</div>
							</div>
					</div>
				@endforeach
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