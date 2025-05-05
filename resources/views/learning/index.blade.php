@extends('layouts.app')

@section('title', 'Subjects')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>All Subjects</h1>
        <a href="{{ route('subject.add') }}" class="btn btn-primary">+ Add Subject</a>
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
                <th>Subject Name</th>
                <th>class Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody style="background-color:#f7eacc;">
            @forelse($subjects as $index => $subject)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->class_name }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-link p-0 text-dark" type="button" id="dropdownMenuButton{{ $subject->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i> {{-- Requires Font Awesome --}}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $subject->id }}">
                                <li>
                                    <a class="dropdown-item" href="{{ route('topic.list', $subject->id) }}">Topic List</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('subject.edit', $subject->id) }}">Edit</a>
                                    {{-- {{ route('subject.destroy', $subject->id) }} --}}
                                </li>
                                <li>
                                    <form action="{{ route('subject.destroy', $subject->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subject?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No subjects found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
