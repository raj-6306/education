@extends('layouts.app')

@section('title', 'Edit Topic')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Topic</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('fail'))
        <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif

    <div class="col-lg-8 col-md-8">
        <div class="card shadow rounded">
            <div class="card-header text-white" style="background-color: #60794e;">
                Topic Information
            </div>
            <div class="card-body">
                <form action="{{ route('topic.update', $topic->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Select Subject</label>
                        <select class="form-select" id="subject_id" name="subject_id" required>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ $topic->subject_id == $subject->id ? 'selected' : '' }}>
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="topic_name" class="form-label">Topic Name</label>
                        <input type="text" class="form-control" id="topic_name" name="topic_name" value="{{ $topic->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="topic_description" class="form-label">Description</label>
                        <textarea class="form-control" id="topic_description" name="topic_description" rows="4">{{ $topic->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="video" class="form-label">Replace Video (optional)</label>
                        <input type="file" class="form-control" id="video" name="video">
                        {{-- @if($topic->video_path)
                            <p class="mt-2">Current Video: <a href="{{ asset('storage/' . $topic->video_path) }}" target="_blank">View</a></p>
                        @endif --}}
                    </div>

                    <button type="submit" class="btn btn-success">Update Topic</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
