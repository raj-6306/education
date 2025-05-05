@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Quiz: {{ $topic->name }}</h2>

    {{-- <div class="alert alert-info">
        This quiz will auto-submit in <span id="countdown">30</span> seconds.
    </div> --}}

    <form id="quizForm" action="{{ route('quiz.submit', $topic->id) }}" method="POST">
        @csrf
        @forelse($questions as $index => $question)
        <input type="hidden" name="quiz_id[]" id="" value="{{ $question->id }}">
            <div class="card mb-4">
                <div class="card-header" style="background-color: #60794e; color: white;">
                    Q{{ $index + 1 }}: {{ $question->question }}
                </div>
                <div class="card-body" style="background-color: #f7eacc;">
                    @foreach (['option_1', 'option_2', 'option_3', 'option_4'] as $optIndex => $field)
                        @php
                            $optionValue = $question->$field;
                        @endphp
                        @if ($optionValue)
                            <div class="form-check mb-2">
                                <input 
                                    class="form-check-input" 
                                    type="radio" 
                                    name="answers[{{ $question->id }}]" 
                                    id="q{{ $question->id }}_{{ $optIndex }}" 
                                    value="{{ $optionValue }}"
                                    required
                                >
                            
                                <label class="form-check-label" for="q{{ $question->id }}_{{ $optIndex }}">
                                    {{ $optionValue }}
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @empty
            <div class="alert alert-warning">No questions available for this quiz.</div>
        @endforelse

        @if($questions->count())
            <button type="submit" class="btn btn-success">Submit Quiz</button>
        @endif
    </form>
</div>

{{-- Auto-submit Script --}}
{{-- <script>
    let timeLeft = 30;
    const countdownEl = document.getElementById('countdown');

    const timer = setInterval(() => {
        timeLeft--;
        countdownEl.textContent = timeLeft;

        if (timeLeft <= 0) {
            clearInterval(timer);
            document.getElementById('quizForm').submit();
        }
    }, 1000);
</script> --}}
@endsection
