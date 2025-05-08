@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>All Questions & Answers</h1>
    <a href="{{ route('mission.create') }}" class="btn btn-primary">+ Add Mission</a>
    </div>
    @if($qas->isEmpty())
        <div class="alert alert-info">No Q&A entries found. Please add some first.</div>
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
                        <td>{{ Str::limit($qa->answer, 100) }}</td>
                        <td>
                            <a href="{{ route('mission.edit', $qa->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('mission.destroy', $qa->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
