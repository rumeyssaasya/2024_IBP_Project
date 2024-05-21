<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('path/to/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .welcome-container {
            margin-top: 50px;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .card-body {
            padding: 20px;
        }
        .btn-block {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            font-size: 1rem;
            text-align: center;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn:hover {
            opacity: 0.9;
        }
        h5.card-title {
            margin-top: 20px;
            font-size: 1.25rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container welcome-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Welcome</div>
                    <div class="card-body">
                        @guest
                            <h5 class="card-title">Login Links</h5>
                            <a href="{{ route('admin.login') }}" class="btn btn-primary btn-block">Admin Login</a>
                            <form action="C:\Users\aciog\Desktop\Project\IBP\myApp\resources\views\admin\admin_login.blade.php" method="POST">
                            <a href="{{ route('user.login') }}" class="btn btn-primary btn-block">User Login</a>
                        @endguest
                        
                        @auth
                            @if (Auth::user()->is_admin)
                                <h5 class="card-title">Admin Links</h5>
                                <a href="{{ route('admin.user_management') }}" class="btn btn-secondary btn-block">User Management</a>
                                <a href="{{ route('admin.entity_management') }}" class="btn btn-secondary btn-block">Entity Management</a>
                                <a href="{{ route('admin.announcement') }}" class="btn btn-secondary btn-block">Create Announcement</a>
                                <a href="{{ route('admin.read_messages') }}" class="btn btn-secondary btn-block">Read Messages</a>
                            @else
                                <h5 class="card-title">User Links</h5>
                                <a href="{{ route('user.update_password') }}" class="btn btn-secondary btn-block">Update Password</a>
                                <a href="{{ route('user.messages') }}" class="btn btn-secondary btn-block">Messages</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
