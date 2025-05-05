@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>Welcome {{ session('student_name') ?? 'Guest' }}!</h1>
@if(session('role')==1)
<div class="container">
    <div class="alert alert-primary col-lg-3 col-md-3">
        <strong>Badges Points:</strong> {{ $totalMarks ?? 0 }}
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('fail'))
        <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif

    <div class="row">
        <h1 class="text-center fw-semibold mb-4" style="color: #455d3b; font-size: 2rem;">
            Please select your class.
        </h1>
        @forelse($classes as $class)
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <a href="{{ route('subject.details', $class->id) }}" class="text-decoration-none">
                    <div class="card text-center shadow-sm h-100" style="cursor: pointer; background-color: #f7eacc;">
                        <div class="card-body d-flex align-items-center justify-content-center" style="height: 100px;">
                            <span style="font-weight: bold; color: #60794e;">{{ ucfirst($class->name) }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">No classes available.</div>
            </div>
        @endforelse
    </div>    
</div>
@endif
@endsection
