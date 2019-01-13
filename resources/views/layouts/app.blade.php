<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Ferreteria') | Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
</head>
<body>

    <div class="navbar-menu">
        @yield('navbar')
    </div>

    <div class="container">

        @yield('content')

    </div>
</body>

<!-- jquery Principal-->
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>

<!-- jquery para Sweetalert -->
<script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>

<!-- jquery para Datepicker -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- jquery para Html2canvas y Jspdf -->
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="{{ asset('js/html2canvas.js') }}"></script>

<!-- jquery para Masked-Input -->
<script src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>

<!-- jquery para Select-Complete -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.js') }}"></script>


@yield('scripts')
@yield('navbar-script')

</html>