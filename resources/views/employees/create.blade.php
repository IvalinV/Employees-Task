@extends('layouts.app')

@section('content')
<div class="container h-full py-4">
    <div class="flex justify-between items-center mt-4 mb-6">
        <h2 class="text-4xl">Create new employee</h2>
    </div>
    <create-employee route="{{ route('api.employees.store') }}"></create-employee>
</div>  
@endsection