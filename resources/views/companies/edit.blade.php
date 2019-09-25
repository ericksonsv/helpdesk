@extends('layouts.app')

@section('title', __('Companies'))

@section('content')
	<div class="container-fluid">
		<h4 class="mb-4">{{ __('Create Company') }}</h4>
		<form action="{{ route('companies.update', $company->id) }}" method="post">
			@method('PUT')
			@csrf
			@include('companies.form')
		</form>
	</div>
@endsection