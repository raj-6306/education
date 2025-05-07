@extends('layouts.app')

@section('content')
<div class="container">
    @if($quizzes->isEmpty())
        <div class="alert alert-warning">No quizzes available.</div>
    @else
        {{-- Show Subject and Topic Name --}}
        <div class="mb-4">
            {{-- <h3>Subject: <span class="text-primary">{{ $quizzes->first()->subject_name ?? 'N/A' }}</span></h3>
            <h4>Topic: <span class="text-success">{{ $quizzes->first()->topic_name ?? 'N/A' }}</span></h4> --}}
        </div>

        {{-- Quiz Form --}}
        <form id="quizForm" action="{{ route('Logical.Store') }}" method="POST">
            @csrf

            @foreach($quizzes as $index => $quiz)
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #60794e; color: white;">
                    <div>
                        <strong>Question #{{ $index + 1 }}:</strong> {{ $quiz->question ?? 'N/A' }}
                    </div>
                    <div class="text-end" style="font-size: 0.9rem;">
                        <span>Subject: <strong>{{ $quiz->subject_name ?? 'N/A' }}</strong></span><br>
                        <span>Topic: <strong>{{ $quiz->topic_name ?? 'N/A' }}</strong></span>
                    </div>
                </div>
                <div class="card-body" style="background-color: #f7eacc;">
                    <input type="hidden" name="quiz_id[]" value="{{ $quiz->id }}">
                    <input type="hidden" name="topic_id[]" value="{{ $quiz->topic_id }}">
                    @foreach (['option_1', 'option_2', 'option_3', 'option_4'] as $optIndex => $field)
                        @php $option = $quiz->$field; @endphp
                        @if ($option)
                            <div class="form-check mb-2">
                                <input 
                                    class="form-check-input" 
                                    type="radio" 
                                    name="answers[{{ $quiz->id }}]" 
                                    id="q{{ $quiz->id }}_{{ $optIndex }}" 
                                    value="{{ $option }}" 
                                    required
                                >
                                <label class="form-check-label" for="q{{ $quiz->id }}_{{ $optIndex }}">
                                    {{ $option }}
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endforeach

            <button type="submit" class="btn btn-success">Submit All Answers</button>
        </form>
    @endif
</div>
@endsection
