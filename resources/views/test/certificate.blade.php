@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Claim Your Certificates</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('fail'))
        <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif

    {{-- Certificate Section --}}
    <div class="row mb-5">


        @php
            $certificates = [
                ['badge' => 100, 'title' => 'Bronze Certificate'],
                ['badge' => 1000, 'title' => 'Silver Certificate'],
                ['badge' => 2000, 'title' => 'Gold Certificate'],
            ];
        @endphp

        @foreach($certificates as $certificate)
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <!-- Add Image Here -->
                    <img src="{{ asset('assets/dummy/certificate.jpg') }}" alt="Certificate Image" class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                    
                    <h5 class="card-title">{{ $certificate['title'] }}</h5>
                    <p>Requires {{ $certificate['badge'] }} badges</p>
                    
                    <form action="{{ route('certificate.download') }}" method="POST">
                        @csrf
                        <input type="hidden" name="badge_required" value="{{ $certificate['badge'] }}">
                        <button type="submit" class="btn btn-success">Download Certificate</button>
                    </form>
                </div>
            </div>
        </div>        
        @endforeach
    </div>
</div>
@endsection
