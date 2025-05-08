@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">All Questions & Answers</h1>

    @if($qas->isEmpty())
        <div class="alert alert-info">No Q&A entries found.</div>
    @else
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('fail'))
            <div class="alert alert-danger">{{ session('fail') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead style="background-color: #60794e; color: white;">
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="background-color: #f7eacc;">
                @foreach($qas as $index => $qa)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $qa->question }}</td>
                        <td>
                            <span id="answer-{{ $qa->id }}" style="display:none;">{{ $qa->answer }}</span>
                            <span id="answer-placeholder-{{ $qa->id }}">••••••••</span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info" onclick="toggleAnswer({{ $qa->id }})">
                                👁️
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<script>
    function toggleAnswer(id) {
        const answer = document.getElementById('answer-' + id);
        const placeholder = document.getElementById('answer-placeholder-' + id);

        if (answer.style.display === 'none') {
            answer.style.display = 'inline';
            placeholder.style.display = 'none';
        } else {
            answer.style.display = 'none';
            placeholder.style.display = 'inline';
        }
    }
</script>
@endsection
