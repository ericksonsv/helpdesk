@extends('layouts.app')

@section('title', __('Companies'))

@section('content')
	<div class="container-fluid">
		<h4 class="mb-4">{{ __('Create Department') }}</h4>
		<form action="{{ route('departments.store') }}" method="post">
			@csrf
			@include('departments.form')
		</form>
	</div>
@endsection