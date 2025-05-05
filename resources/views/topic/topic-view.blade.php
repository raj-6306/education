@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Topic Details</h2>

    @if($topic)
        <div class="card mb-3">
            <div class="card-header text-white" style="background-color: #60794e;">
                <strong>{{ $topic->name }}</strong> <!-- Display Topic Name -->
            </div>
            <div class="card-body">
                <h5>Subject: {{ $topic->subject_name ?? 'N/A' }}</h5> <!-- Assuming you have a relationship for subject -->
                
                <p><strong>Description:</strong></p>
                <p>{{ $topic->description ?? 'No description available.' }}</p> <!-- Display Topic Description -->
                
                @if (!empty($topic->video_path))
                    <p><strong>Video:</strong></p>
                    <video controls width="640" height="360" style="max-width: 100%; height: 360px;">
                        <source src="{{ asset('storage/' . $topic->video_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <p>No video uploaded for this topic.</p>
                @endif

            </div>
        </div>
    @else
        <p>Topic not found.</p>
    @endif
</div>
@endsection
