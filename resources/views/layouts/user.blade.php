<!DOCTYPE html>
<html>
<head>
    <title>User Panel</title>
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
</head>
<body>
    @include('user.navbar')
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('adminlte/js/adminlte.min.js') }}"></script>
</body>
</html>