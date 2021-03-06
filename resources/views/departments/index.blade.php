@extends('layouts.app')

@section('title', __('Departments'))

@section('styles')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
	<div class="container-fluid">
		<h4 class="mb-4">{{ __('List of Departments') }}</h4>
		<div class="text-right mb-4"><a href="{{ route('departments.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></a></div>
		<div class="table-responsive">
			<table class="table table-bordered table-hover m-0" id="departments-table">
				<thead class="thead-dark">
					<tr>
						<th>{{ __('Id') }}</th>
						<th>{{ __('Department') }}</th>
						<th>{{ __('Company') }}</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($departments as $department)
						<tr>
							<td class="align-middle" style="width: 10px">{{ $department->id }}</td>
							<td class="align-middle">{{ $department->name }}</td>
							<td class="align-middle">{{ $department->company->name }}</td>
							<td class="align-middle text-right" style="min-width: 70px; width: 70px">
								<a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-edit"></i></a>
								<a href="" class="btn btn-sm btn-dark"><i class="fas fa-trash"></i></a>
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
		    $('#departments-table').DataTable({
		    	"columns": [
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