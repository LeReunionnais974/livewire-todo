@extends('layouts.app')

@section('content')
@auth
<a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
@else
<div class="container">
    <div class="col rounded d-flex py-2 px-3 items-center bg-info">
        <i class="bi bi-info-circle"></i>
        <p class="ms-2 mb-0">Please login or register for check your to-dos</p>
    </div>
</div>
@endauth

@endsection