@extends('layouts.app')
@section('styles')
<style>
    .card h6.text-uppercase {
        font-size: 14px;
        color: #e53935;
    }
    .card h6.fw-bold {
        font-size: 16px;
    }
    .card .btn-outline-danger {
        border: 1px solid #ff5e57;
        color: #ff5e57;
    }
    
</style>
@endsection

@section('content')
<div class="container">
    {{-- <h2 class="mb-4">Subjects and Topics</h2> --}}

    @php
        $groupedTopics = $topics->groupBy('subject_id');
    @endphp

    <div class="row">
        @forelse($subjects as $subject)
            @php
                $subjectTopics = $groupedTopics->get($subject->id, collect());
            @endphp

            @if($subjectTopics->isNotEmpty())
                @foreach($subjectTopics as $topic)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100 border rounded" style="overflow: hidden;">
                        <!-- Image section with position-relative wrapper -->
                        <div class="position-relative">
                            <img src="{{ asset('assets/dummy/teacher.jpg') }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="Subject Image">
                
                            <!-- FULL COURSE badge (top-left) -->
                            <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">
                                TheoremTrack
                            </span>
                
                            <!-- Class label (bottom-left) -->
                            <h5 class="position-absolute bottom-0 start-0 m-3" style="font-weight: bold; color: black;top: 35%;">
                                {{ ucfirst($class_name) }}
                            </h5>
                
                            <!-- Subject name label (bottom-left) -->
                            <h4 class="position-absolute bottom-0 start-0 m-3" style="font-weight: bold; color: black;top: 58%;">
                                {{ strtoupper($subject->name) }}
                            </h4>
                
                        </div>
                
                        <div class="card-body">
                            <!-- Heading like "Class 6th MATHS" -->
                            <h6 class="text-uppercase fw-bold mb-1" style="color: #60794e;">
                                {{ ucfirst($class_name) }} {{ strtoupper($subject->name) }}  {{ strtoupper($topic->topic_name ) }}
                            </h6>
                
                            <!-- Main title -->
                            <h6 class="fw-bold mb-2">
                                {{ ucfirst($class_name) }} {{ $subject->name }} Updated Course
                            </h6>
                        </div>
                        @if($topic->topic_id)
                        <div class="card-footer bg-transparent border-0 text-center">
                            <a href="{{ route('topic.view', $topic->topic_id) }}"
                               class="btn w-100 fw-bold text-white"
                               style="background-color: #60794e;">
                                WATCH NOW
                            </a>
                        </div>
                        @endif
                    </div>
                </div>                
                @endforeach
            @endif
        @empty
            <div class="col-12">
                <div class="alert alert-info">No subjects found for this class.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
