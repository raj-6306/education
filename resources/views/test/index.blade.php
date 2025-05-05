@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">My Missions</h1>

    @if($topics->isEmpty())
    <div class="alert alert-info">No Missions available. First watch a topic before starting the test.</div>
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
                    <th>Subject Name</th>
                    <th>Topic Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="background-color: #f7eacc;">
                @foreach($topics as $index => $topic)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $topic->subject_name }}</td>
                        <td>{{ $topic->topic_name }}</td>
                        <td>
                            @if($topic->status == 1)
                                <a href="{{ route('test.start', $topic->topic_id) }}" class="btn btn-sm btn-primary">Take Test</a>
                            @else
                                <span class="text-muted">Not Available</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
