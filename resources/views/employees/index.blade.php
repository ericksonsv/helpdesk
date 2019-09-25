@extends('layouts.app')

@section('title', __('Empployees'))

@section('styles')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<style>
		svg { border-radius: 50%; width: 50px; height: 50px; }
	</style>
@endsection

@section('content')
	<div class="container-fluid">
		<h4 class="mb-4">{{ __('List of Empployees') }}</h4>
		<div class="text-right mb-4"><a href="{{ route('employees.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></a></div>
			<div class="table-responsive">
				<table class="table table-bordered table-hover m-0" id="empployees-table">
					<thead class="thead-dark">
						<tr>
							<th>{{ __('Id') }}</th>
							<th style="width: 50px;">{{ __('Avatar') }}</th>
							<th>{{ __('First Name') }}</th>
							<th>{{ __('Last Name') }}</th>
							<th>{{ __('Company') }}</th>
							<th>{{ __('Department') }}</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($employees as $employee)
							<tr>
								<td class="align-middle" style="width: 10px">{{ $employee->id }}</td>
								<td class="align-middle text-center">
									@if ($employee->avatar)
										{!! $employee->avatar !!}
									@endif
								</td>
								<td class="align-middle">{{ $employee->first_name }}</td>
								<td class="align-middle">{{ $employee->last_name }}</td>
								<td class="align-middle">{{ $employee->company->name }}</td>
								<td class="align-middle">{{ $employee->department->name }}</td>
								<td class="align-middle text-right" style="min-width: 70px; width: 70px">
									<a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-edit"></i></a>
									<a href="{{ route('employees.destroy', $employee->id) }}" class="btn btn-sm btn-dark" onclick="event.preventDefault(); document.querySelector('#delete-employye-{{$employee->id}}').submit();"><i class="fas fa-trash"></i></a>
									<form id="delete-employye-{{$employee->id}}" method="POST" action="{{ route('employees.destroy', $employee->id) }}">@csrf @method('DELETE')</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
	</div>
@endsection

@section('scripts')
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function() {
		    $('#empployees-table').DataTable({
		    	"columns": [
		    	    null,
		    	    null,
		    	    null,
		    	    null,
		    	    null,
		    	    null,
		    	    { "orderable": false }
		    	  ],
		    	  "lengthMenu": [ 5, 10, 15, 25, 50, 75, 100 ],
		    	  "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            }
		    });
		});
	</script>
@endsection