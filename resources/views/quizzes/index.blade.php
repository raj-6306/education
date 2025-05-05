@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>All Quizzes</h1>
        <a href="{{ route('quiz.add') }}" class="btn btn-primary">+ Add Quiz</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('fail'))
        <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead style="background-color: #60794e;">
            <tr>
                <th>#</th>
                <th>Class</th>
                <th>Subject</th>
                <th>Topic</th>
                <th>Question</th>
                <th>Marks</th>
                <th>Answer</th>
                {{-- <th>Options</th> --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody style="background-color:#f7eacc;">
            @forelse($quizzes as $index => $quiz)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $quiz->class_name ?? 'N/A' }}</td>
                    <td>{{ $quiz->subject_name ?? 'N/A' }}</td>
                    <td>{{ $quiz->topic_name ?? 'N/A' }}</td>
                    <td>{{ Str::limit($quiz->question, 50) }}</td>
                    <td>{{ $quiz->marks }}</td>
                    <td>{{ $quiz->answer }}</td>
                    {{-- <td> --}}
                        {{-- @php
                            $options = json_decode($quiz->options, true);
                        @endphp
                        @foreach($options as $key => $value)
                            <div><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</div>
                        @endforeach --}}
                    {{-- </td> --}}
                    <td>
                        <a href="{{ route('quiz.edit', $quiz->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>

                        <form action="{{ route('quiz.destroy', $quiz->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No quizzes available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
