@extends('layouts.app')

@section('title', __('Empployees'))

@section('content')
	<div class="container-fluid">
		<h4 class="mb-4">{{ __('Editing Empployee') }}</h4>
		<form action="{{ route('employees.update', $employee->id) }}" method="post">
			@method('PUT')
			@csrf
			@include('employees.form')
		</form>
	</div>
@endsection