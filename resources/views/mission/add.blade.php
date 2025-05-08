@extends('layouts.app')

@section('title', 'Add Question & Answer')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Add a New Question & Answer</h1>

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
                Question & Answer
            </div>
            <div class="card-body">
                <form action="{{ route('mission.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="question" class="form-label">Question</label>
                        <input type="text" class="form-control" id="question" name="question" value="{{ old('question') }}" required>
                        @error('question')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="answer" class="form-label">Answer</label>
                        <textarea class="form-control" id="answer" name="answer" rows="4" required>{{ old('answer') }}</textarea>
                        @error('answer')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Add Q&A</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
