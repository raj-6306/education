@extends('layouts.app')
@section('style')
<style>
    .main-content {
    flex-grow: 1;
    padding: 0px !important;
    background: #ffffff;
    min-height: 100vh;
}
</style>
@endsection
@section('title', 'Create Quiz')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Create a New Quiz</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('fail'))
        <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif

    <div class="col-lg-10 col-md-10">
        <div class="card shadow rounded">
            <div class="card-header text-white" style="background-color: #60794e;">
                Quiz Information
            </div>
            <div class="card-body">
                <form action="{{ route('quiz.store') }}" method="POST">
                    @csrf

                    {{-- Class Dropdown --}}
                    <div class="mb-3">
                        <label for="class_id" class="form-label">Select Class</label>
                        <select class="form-select" name="class_id" id="class_id" required>
                            <option value="">-- Choose Class --</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        @error('class_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    {{-- Subject Dropdown --}}
                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Select Subject</label>
                        <select class="form-select" name="subject_id" id="subject_id" required>
                            <option value="">-- Choose Subject --</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        @error('subject_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    {{-- Topic Dropdown --}}
                    <div class="mb-3">
                        <label for="topic_id" class="form-label">Select Topic</label>
                        <select class="form-select" name="topic_id" id="topic_id" required>
                            <option value="">-- Choose Topic --</option>
                            @foreach($topics as $topic)
                                <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                            @endforeach
                        </select>
                        @error('topic_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    {{-- Quiz Type --}}
                    <div class="mb-3">
                        <label for="quiz_type" class="form-label">Quiz Type</label>
                        <select class="form-select" name="quiz_type" id="quiz_type" required>
                            <option value="">-- Choose Type --</option>
                            <option value="2">2 Options</option>
                            <option value="4">4 Options</option>
                        </select>
                        @error('quiz_type') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    {{-- Question --}}
                    <div class="mb-3">
                        <label for="question" class="form-label">Question</label>
                        <input type="text" class="form-control" name="question" id="question" required>
                        @error('question') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    {{-- Options --}}
                        <div id="options-container" class="mb-3">
                            <label class="form-label">Options</label>
                            
                            <input type="text" class="form-control mb-2 option-field" name="option_1" id="option_1" placeholder="Option 1" style="display: none;">
                            <input type="text" class="form-control mb-2 option-field" name="option_2" id="option_2" placeholder="Option 2" style="display: none;">
                            <input type="text" class="form-control mb-2 option-field" name="option_3" id="option_3" placeholder="Option 3" style="display: none;">
                            <input type="text" class="form-control mb-2 option-field" name="option_4" id="option_4" placeholder="Option 4" style="display: none;">
                        </div>


                    {{-- Answer --}}
                    <div class="mb-3">
                        <label for="answer" class="form-label">Correct Answer</label>
                        <input type="text" class="form-control" name="answer" id="answer" required>
                        @error('answer') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    {{-- Marks --}}
                    <div class="mb-3">
                        <label for="marks" class="form-label">Marks</label>
                        <input type="number" class="form-control" name="marks" id="marks" required>
                        @error('marks') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Create Quiz</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Script to show/hide option inputs --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quizType = document.getElementById('quiz_type');

        quizType.addEventListener('change', function () {
            const val = this.value;

            // Hide all first
            for (let i = 1; i <= 4; i++) {
                document.getElementById(`option_${i}`).style.display = 'none';
            }

            // Show based on value
            if (val == '2') {
                document.getElementById('option_1').style.display = 'block';
                document.getElementById('option_2').style.display = 'block';
            }

            if (val == '4') {
                for (let i = 1; i <= 4; i++) {
                    document.getElementById(`option_${i}`).style.display = 'block';
                }
            }
        });
    });
</script>
@endsection
