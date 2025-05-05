@extends('layouts.app')

@section('title', 'Edit Quiz')
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

@section('content')
<div class="container mt-5">
    <h2>Edit Quiz</h2>

    <form action="{{ route('quiz.update', $quiz->id) }}" method="POST">
        @csrf
        {{-- @method('PUT') --}}

        <div class="mb-3">
            <label for="class_id" class="form-label">Class</label>
            <select name="class_id" id="class_id" class="form-select" required>
                <option value="">-- Select Class --</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ $quiz->class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="subject_id" class="form-label">Subject</label>
            <select name="subject_id" id="subject_id" class="form-select" required>
                <option value="">-- Select Subject --</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $quiz->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="topic_id" class="form-label">Topic</label>
            <select name="topic_id" id="topic_id" class="form-select" required>
                <option value="">-- Select Topic --</option>
                @foreach($topics as $topic)
                    <option value="{{ $topic->id }}" {{ $quiz->topic_id == $topic->id ? 'selected' : '' }}>{{ $topic->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quiz_type" class="form-label">Quiz Type</label>
            <select name="quiz_type" id="quiz_type" class="form-select" required onchange="toggleOptions(this.value)">
                <option value="">-- Select Type --</option>
                <option value="2" {{ $quiz->quiz_type == 2 ? 'selected' : '' }}>2 Options</option>
                <option value="4" {{ $quiz->quiz_type == 4 ? 'selected' : '' }}>4 Options</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <textarea name="question" id="question" class="form-control" required>{{ $quiz->question }}</textarea>
        </div>

        <div class="mb-3">
            <label for="option_1" class="form-label">Option 1</label>
            <input type="text" name="option_1" class="form-control" value="{{ $quiz->option_1 ?? '' }}" required>
        </div>
        
        <div class="mb-3">
            <label for="option_2" class="form-label">Option 2</label>
            <input type="text" name="option_2" class="form-control" value="{{ $quiz->option_2 ?? '' }}" required>
        </div>
        
        <div class="mb-3" id="opt3" style="display: {{ $quiz->quiz_type == 4 ? 'block' : 'none' }};">
            <label for="option_3" class="form-label">Option 3</label>
            <input type="text" name="option_3" class="form-control" value="{{ $quiz->option_3 ?? '' }}">
        </div>
        
        <div class="mb-3" id="opt4" style="display: {{ $quiz->quiz_type == 4 ? 'block' : 'none' }};">
            <label for="option_4" class="form-label">Option 4</label>
            <input type="text" name="option_4" class="form-control" value="{{ $quiz->option_4 ?? '' }}">
        </div>        

        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <input type="text" name="answer" class="form-control" value="{{ $quiz->answer }}" required>
        </div>

        <div class="mb-3">
            <label for="marks" class="form-label">Marks</label>
            <input type="number" name="marks" class="form-control" value="{{ $quiz->marks }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Quiz</button>
    </form>
</div>

<script>
function toggleOptions(value) {
    document.getElementById('opt3').style.display = value == 4 ? 'block' : 'none';
    document.getElementById('opt4').style.display = value == 4 ? 'block' : 'none';
}
</script>
@endsection
