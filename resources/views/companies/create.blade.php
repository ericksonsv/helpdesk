@extends('layouts.app')

@section('title', __('Companies'))

@section('content')
	<div class="container-fluid">
		<h4 class="mb-4">{{ __('Create a Company') }}</h4>
		<form action="{{ route('companies.store') }}" method="post">
			@csrf
			@include('companies.form')
		</form>
	</div>
@endsection