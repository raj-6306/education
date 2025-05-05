
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Learning Platform</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body,
        html {
            height: 100%;
        }

        body {
            background: url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .login-container {
            position: relative;
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            max-width: 400px;
            width: 90%;
            z-index: 1;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input:focus {
            border-color: #4a90e2;
            outline: none;
        }

        .login-btn {
            width: 100%;
            padding: 0.75rem;
            border: none;
            background-color: #4a90e2;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        .login-btn:hover {
            background-color: #357ab8;
        }

        @media (max-width: 600px) {
            .login-container {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="login-container">
        <h2>Login to Learn</h2>
        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        @if(session('fail'))
            <div style="color: red;">{{ session('fail') }}</div>
        @endif

        @if($errors->any())
            <ul style="color: red;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{route("login.check")}}" method="POST">
          @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required />
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
    </div>
</body>

</html>