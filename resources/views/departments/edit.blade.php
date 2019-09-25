@extends('layouts.app')

@section('title', __('Companies'))

@section('content')
	<div class="container-fluid">
		<h4 class="mb-4">{{ __('Create a Department') }}</h4>
		<form action="{{ route('departments.update', $department->id) }}" method="post">
			@method('PUT')
			@csrf
			@include('departments.form')
		</form>
	</div>
@endsection