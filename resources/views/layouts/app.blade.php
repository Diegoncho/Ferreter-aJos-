<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Ferreteria') | Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
</head>
<body>

    <div class="navbar-menu">
        @yield('navbar')
    </div>

    <div class="container">

        @yield('content')

    </div>
</body>
</html>