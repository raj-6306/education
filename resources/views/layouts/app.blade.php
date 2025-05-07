<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'Dashboard')</title>
  
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Arial, sans-serif; display: flex; height: 100vh; background-color: #f4f6f9; }

    .sidebar {
      width: 220px;
      background: #60794e;
      color: white;
      padding: 20px;
      height: 100vh;
    }

    .sidebar h2 {
      margin-bottom: 30px;
      font-size: 24px;
      border-bottom: 1px solid #555;
      padding-bottom: 10px;
      font-weight: 600;
      color: black;
    }

    .sidebar a {
      display: block;
      color: black;
      text-decoration: none;
      margin: 15px 0;
      padding: 8px 10px;
      border-radius: 4px;
      transition: background 0.3s;
    }

    .sidebar a:hover {
      background: #283f18;
    }

    .main-content {
      flex-grow: 1;
      padding: 30px;
      /* background: #ffffff; */
      background: #f9e5b0;
      min-height: 100vh;
    }

    .main-content h1 {
      font-size: 26px;
      margin-bottom: 20px;
      /* color: #343a40; */
      color: black;
      font-weight: 600;
    }
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  @yield('style')
</head>
<body>

  <div class="sidebar">
    @if(session('role')==0)
    <h2>Dashboard</h2>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{route('class.index')}}">Classes</a>
    <a href="{{route('learning.index')}}">Learning</a>
    <a href="{{ route('quiz.index') }}">Quizzes</a>
    <a href="{{ route('test.index') }}">Missons</a>
    <a href="{{ route('logout') }}">Logout</a>
    @else
    <h2>TheoremTrack</h2>
      <a href="{{ route('dashboard') }}">Dashboard</a>
      <a href="{{ route('test.index') }}">Missions</a>
      {{-- <a href="{{ route('logical') }}">Logical Reasoning</a> --}}
      <a href="{{ route('certificate') }}">Certificate</a>
      <a href="{{ route('logout') }}">Logout</a>
    @endif
    {{-- <a href="{{ route('logout') }}">Logout</a>  --}}
  </div>

  <div class="main-content">
    @yield('content')
  </div>

  <!-- Bootstrap JS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
