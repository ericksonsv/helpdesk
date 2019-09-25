@extends('layouts.app')

@section('title', __('Tasks'))

@section('styles')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
	<div class="container-fluid">
		<h4 class="mb-4">{{ __('List of Tasks') }}</h4>
		<div class="text-right mb-4"><a href="{{ route('tasks.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></a></div>
		<div class="table-responsive">
			<table class="table table-bordered table-hover m-0" id="tasks-table">
				<thead class="thead-dark">
					<tr>
						<th>{{ __('Id') }}</th>
						<th>{{ __('Title') }}</th>
						<th>{{ __('Description') }}</th>
						<th>{{ __('Requested By') }}</th>
						<th>{{ __('Asigned To') }}</th>
						<th>{{ __('Created At') }}</th>
						<th>{{ __('Status') }}</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tasks as $task)
						<tr class="{{ $task->status ? 'table-primary' : 'table-warning' }}">
							<td class="align-middle" style="width: 10px">{{ $task->id }}</td>
							<td class="align-middle">{{ $task->title }}</td>
							<td class="align-middle">{{ $task->description }}</td>
							<td class="align-middle">{{ $task->requestedBy->full_name }}</td>
							<td class="align-middle">{{ $task->assignedTo->full_name }}</td>
							<td class="align-middle">{{ $task->created_at->diffForHumans() }}</td>
							<td class="align-middle">{{ $task->status ? 'Completed' : 'Pendding' }}</td>
							<td class="text-right align-middle" style="min-width: 25px; width: 25px">
								<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-dark"><i class="fas fa-edit"></i></a>
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
		    $('#tasks-table').DataTable({
		    	"columns": [
		    	    null,
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