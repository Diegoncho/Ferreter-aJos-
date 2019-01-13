<div class="menu-application">

    <div class="navbar-options flexbox">
        <div class="menu-icon"></div>

        <div class="options flex align-items-center">
            <a href="{{ route('menu') }}" class="flex"><i class="icon-home"></i></a>

            <a href="{{ route('submenu') }}">Buscar</a>

            <a href="{{ route('submenuAdd') }}">Agregar</a>

            <a href="{{ route('factura') }}">Reporte</a>

            <form action="{{ route('logout') }}" method="POST" id="form_nav" style="margin:0;">
                {{ csrf_field() }}
        
                <button type="submit" class="btn-none logout-nav flex align-items-center">
                    <i class="icon-power_settings_new" style="margin:0px 5px;"></i> Cerrar Sesión
                </button>
            </form>

        </div>
    </div>

</div>

@section('navbar-script')
<script type="text/javascript">  
    (function () {
        var form_nav = document.getElementById('form_nav');
        form_nav.addEventListener('submit',SweetAlert_nav);
        
        function SweetAlert_nav(event) {
        // Evitando que el evento "Submit" ocurra
            event.preventDefault();

            swal({
                title: "¿Estas de acuerdo?",
                text: "Aceptar te direccionara al login.",
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
                        text: "Tu sessión ya ha sido cerrada.",
                        icon: "success",
                        buttons: false,
                    });
                
                // Realizando la redireccion "Logout"
                    form_nav.submit();
                } 
                else {
                    swal("Cancelled", "Gracias por seguir interactuando :)", "error");
                }
            });
        }
    })();
</script>
@endsection
