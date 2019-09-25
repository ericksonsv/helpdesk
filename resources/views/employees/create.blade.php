@extends('layouts.app')

@section('title', __('Empployees'))

@section('content')
	<div class="container-fluid">
		<h4 class="mb-4">{{ __('Add an Empployee') }}</h4>
		<form action="{{ route('employees.store') }}" method="post">
			@csrf
			@include('employees.form')
		</form>
	</div>
@endsection