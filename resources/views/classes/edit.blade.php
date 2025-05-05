@extends('layouts.app')
@section('title', 'Edit Class')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Class</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
    @endif

    <div class="col-lg-8 col-md-8">
        <div class="card shadow rounded">
            <div class="card-header text-white" style="background-color: #60794e;">
                Edit Class Information
            </div>
            <div class="card-body">
                <form action="{{ route('class.update', $class->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Class Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $class->name) }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Update Class</button>
                    <a href="{{ route('class.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
