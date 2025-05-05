    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>All Topics</h1>
            <a href="{{ route('topic.add', $sid) }}" class="btn btn-primary">+ Add Topic</a>
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
                    <th>Subject</th>
                    <th>Topic Name</th>
                    <th>Description</th>
                    <th>Video</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody style="background-color:#f7eacc;">
                @forelse($topics as $index => $topic)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $topic->subject_name }}</td>
                        <td>{{ $topic->name }}</td>
                        <td>{{ Str::limit($topic->description, 50) }}</td>
                        <td>
                            @if($topic->video_path)
                                <a href="{{ asset('storage/' . $topic->video_path) }}" target="_blank">View Video</a>
                            @else
                                <span class="text-muted">No Video</span>
                            @endif
                        </td>  
                        <td>
                                <a href="{{ route('topic.edit', $topic->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                            
                                <form action="{{ route('topic.destroy', $topic->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No topics available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endsection
