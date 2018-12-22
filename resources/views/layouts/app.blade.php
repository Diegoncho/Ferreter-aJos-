<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Ferreteria') | Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
</head>
<body>
    <div class="container">

        @yield('content')

    </div>
</body>
</html>