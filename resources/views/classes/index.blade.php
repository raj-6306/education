@extends('layouts.app')
@section('title', 'classes')
@section('content')
<div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>All Classes</h1>
            <a href="{{ route('class.add') }}" class="btn btn-primary">+ Add Class</a>
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
                <th>Class Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody style="background-color:#f7eacc;">
            @forelse($classes as $index => $class)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $class->name }}</td>
                    <td>
                        <a href="{{ route('class.edit', $class->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('class.destroy', $class->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No classes found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
