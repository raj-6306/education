@extends('layouts.app')

@section('title', 'Create Topic')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Create a New Topic</h1>

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
                Topic Information
            </div>
            <div class="card-body">
                <form action="{{ route('topic.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Subject Dropdown --}}
                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Select Subject</label>
                        <select class="form-select" id="subject_id" name="subject_id" required>
                            <option value="">-- Choose Subject --</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ $subject->id == $sid ? 'selected' : '' }}>
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('subject_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Topic Name --}}
                    <div class="mb-3">
                        <label for="topic_name" class="form-label">Topic Name</label>
                        <input type="text" class="form-control" id="topic_name" name="topic_name" value="{{ old('topic_name') }}" required>
                        @error('topic_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Topic Description --}}
                    <div class="mb-3">
                        <label for="topic_description" class="form-label">Topic Description</label>
                        <textarea class="form-control" id="topic_description" name="topic_description" rows="4">{{ old('topic_description') }}</textarea>
                        @error('topic_description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Video Upload --}}
                    <div class="mb-3">
                        <label for="video" class="form-label">Upload Video</label>
                        <input type="file" class="form-control" id="video" name="video" accept="video/*">
                        @error('video')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Create Topic</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
