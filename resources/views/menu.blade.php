@extends('layouts.app')

@section('title')
    Menu
@endsection

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')

<link rel="stylesheet" href="{{ asset('css/menu.css') }}">

    <div class="panel-menu">

        <a href="{{ route('submenu') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Buscar un Registro.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-search"></i>
                </div>
            </div>
        </a>

        <a href="{{ route('submenuAdd') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Insertar un Registro.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-create_new_folder "></i>
                </div>
            </div>
        </a>

        <a href="{{ route('factura') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Generar un Reporte.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-assignment"></i>
                </div>
            </div>
        </a>

        <form action="{{ route('logout') }}" method="POST" id="form">
            {{ csrf_field() }}

            <button type="submit" class="btn-none">
                
                <div class="panel-logout">
                    <div class="module-logout">
                        <i class="icon-power_settings_new"></i>
                    </div>

                    <div class="module-title">Cerrar Sesión.</div>

                    <div class="module-footer"></div>
                </div>

            </button>
        </form>

    </div>

@section('scripts')
<script type="text/javascript">
    (function () {
        var form = document.getElementById('form');
        form.addEventListener('submit',SweetAlert);
        
        function SweetAlert(event) {
        // Evitando que el evento "Submit" ocurra
            event.preventDefault();

            swal({
                title: "¿Estas de acuerdo?",
                text: "Al aceptar, su sesión sera cerrada.",
                icon: "warning",
                buttons: [
                    'Cancelar',
                    'Aceptar'
                ],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        title: "Good bye!",
                        text: "Gracias vuelva pronto.",
                        icon: "success",
                        buttons: false,
                    });
                
                // Realizando la redireccion "Logout"
                    form.submit();
                } 
                else {
                    swal("Cancelled", "Continúe con su mantenimiento. :D", "error");
                }
            });
        }
    })();
</script>
@endsection

@endsection