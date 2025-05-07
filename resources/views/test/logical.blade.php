@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Available Quizzes</h2>

    @forelse($quizzes as $quiz)
        <div class="card mb-4">
            <div class="card-header" style="background-color: #60794e; color: white;">
                Subject: {{ $quiz->subject_name }} | Topic: {{ $quiz->topic_name }}
            </div>
            <div class="card-body" style="background-color: #f7eacc;">
                <p><strong>Quiz Title:</strong> {{ $quiz->name }}</p>
                <p><strong>Description:</strong> {{ $quiz->description ?? 'No description provided.' }}</p>
            
                @php
                    $quizQuestions = $questions[$quiz->id] ?? collect();
                @endphp
            
                @if ($quizQuestions->isNotEmpty())
                    <div class="mt-3">
                        <h5>Questions:</h5>
                        <ol>
                            @foreach($quizQuestions as $question)
                                <li>
                                    {{ $question->question }}
                                    <ul style="list-style-type: circle; margin-top: 5px;">
                                        @foreach (['option_1', 'option_2', 'option_3', 'option_4'] as $opt)
                                            @if(!empty($question->$opt))
                                                <li>{{ $question->$opt }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                @else
                    <p>No questions available for this quiz.</p>
                @endif            
        </div>
    @empty
        <div class="alert alert-warning">
            No quizzes available for this class.
        </div>
    @endforelse
</div>
@endsection
