@extends('layouts.app')
@section('content')
    <div class="container h-full py-4">
            <div class="flex justify-between items-center mt-4 mb-6">
                <h2 class="text-4xl">Employees</h2>
            </div>
            <list-employees></list-employees>
    </div>  
@endsection