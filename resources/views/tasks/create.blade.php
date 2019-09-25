@extends('layouts.app')

@section('title', __('Tasks'))

@section('content')
	<div class="container-fluid">
		<h4 class="mb-4">{{ __('Adding Task') }}</h4>
		<form action="{{ route('tasks.store') }}" method="post">
			@csrf
			@include('tasks.form')
		</form>
	</div>
@endsection