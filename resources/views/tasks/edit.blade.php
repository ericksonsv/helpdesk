@extends('layouts.app')

@section('title', __('Companies'))

@section('content')
	<div class="container-fluid">
		<h4 class="mb-4">{{ __('Editing Task') }}</h4>
		<form action="{{ route('tasks.update', $task->id) }}" method="post">
			@method('PUT')
			@csrf
			@include('tasks.form')
		</form>
	</div>
@endsection