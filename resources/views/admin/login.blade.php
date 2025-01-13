<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-card {
            width: 500px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .login-card h2 {
            margin-bottom: 20px;
            color: #333333;
        }
        .btn-primary {
            background: #007bff;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-card py-5">



        	
	 @if ($errors->any())
     <div class="alert alert-danger">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif

 <div class="d-flex  justify-content-center align-items-center">
    <img class="mb-3 img-fluid" src="/images/icons/logo-01.png" alt="" height="100" width="200">
</div>
    <h2 class="text-center">Admin Login</h2>
        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
        </form>
        {{-- <p class="text-center mt-3 text-muted">Forgot your password? <a href="#" class="text-decoration-none">Reset here</a></p> --}}
    </div>
</body>
</html>
