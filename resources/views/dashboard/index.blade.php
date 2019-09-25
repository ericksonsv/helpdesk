@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
@endsection

@section('content')
	<div class="container-fluid">

		<div class="row no-gutters">
			<div class="col-lg">
				<div class="card shadow-sm border-0 mx-1 mb-4">
					<div class="card-body d-flex justify-content-between">
						<h5 class="m-0">{{ __('Companies') }}</h5>
						<p class="m-0 bg-primary text-white px-2 rounded shadow-sm">{{ $companies }}</p>
					</div>
				</div>
			</div>
			<div class="col-lg">
				<div class="card shadow-sm border-0 mx-1 mb-4">
					<div class="card-body d-flex justify-content-between">
						<h5 class="m-0">{{ __('Departments') }}</h5>
						<p class="m-0 bg-primary text-white px-2 rounded shadow-sm">{{ $departments }}</p>
					</div>
				</div>
			</div>
			<div class="col-lg">
				<div class="card shadow-sm border-0 mx-1 mb-4">
					<div class="card-body d-flex justify-content-between">
						<h5 class="m-0">{{ __('Employees') }}</h5>
						<p class="m-0 bg-primary text-white px-2 rounded shadow-sm">{{ $employees }}</p>
					</div>
				</div>
			</div>
			<div class="col-lg">
				<div class="card shadow-sm border-0 mx-1 mb-4">
					<div class="card-body d-flex justify-content-between">
						<h5 class="m-0">{{ __('Tasks') }}</h5>
						<p class="m-0 bg-primary text-white px-2 rounded shadow-sm">{{ $tasks }}</p>
					</div>
				</div>
			</div>
		</div>

		{{-- Incompleted Tasks --}}
		@if ($incompletedTasks)
			<div class="card bg-light card-body p-4 mb-3" style="border-color: rgba(170,170,170,.15)">
				@foreach ($incompletedTasks as $task)
					<a href="{{ route('tasks.edit', $task->id) }}" class="text-decoration-none">
						<div class="card rounded-0 my-1" style="border-color: rgba(170,170,170,.2)">
							<div class="card-body p-2">
								<div class="row">
									<div class="col-md d-flex align-items-center">
										<span class="text-info">{{ $task->title }}</span>
									</div>
									<div class="col-md text-right d-flex justify-content-end align-items-center">
										<span class="badge badge-primary p-1"><i class="fas fa-clock"></i> {{ $task->created_at->diffForHumans() }}</span>
									</div>
								</div>
							</div>
						</div>
					</a>
				@endforeach
			</div>
		@endif
		<div class="d-flex justify-content-end">{{ $incompletedTasks->links() }}</div>

		{{--  --}}
		<div data-date="12/03/2012"></div>

	</div>
@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
@endsection