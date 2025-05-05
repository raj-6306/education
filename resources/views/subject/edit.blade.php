@extends('layouts.app')

@section('title', 'Edit Subject')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Subject</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('fail'))
        <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif

    <div class="col-lg-8 col-md-8">
        <div class="card shadow rounded">
            <div class="card-header text-white" style="background-color: #60794e;">
                Subject Information
            </div>
            <div class="card-body">
                <form action="{{ route('subject.update', $subject->id) }}" method="POST">
                    @csrf
                    {{-- @method('PUT') --}}

                    <div class="mb-3">
                        <label for="class_id" class="form-label">Select Class</label>
                        <select class="form-select" name="class_id" id="class_id" required>
                            <option value="" disabled>Select a class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" {{ $subject->class_id == $class->id ? 'selected' : '' }}>
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('class_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="subject_name" class="form-label">Subject Name</label>
                        <input type="text" class="form-control" id="subject_name" name="subject_name" value="{{ old('subject_name', $subject->name) }}" required>
                        @error('subject_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Update Subject</button>
                    <a href="{{ route('subject.add') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
