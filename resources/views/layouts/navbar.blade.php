<!-- jquery Principal-->
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>

<!-- jquery para Sweetalert -->
<script src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>

<!-- jquery para Html2canvas y Jspdf -->
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="{{ asset('js/html2canvas.js') }}"></script>


<div class="menu-application">

    <div class="navbar-options flexbox">
        <div class="menu-icon"></div>

        <div class="options flex align-items-center">
            <a href="{{ route('menu') }}"><i class="icon-home"></i></a>

            <a href="">Buscar</a>

            <a href="">Agregar</a>

            <form action="{{ route('logout') }}" method="POST" id="form_nav" style="margin:0;">
                {{ csrf_field() }}
        
                <button type="submit" class="btn-none logout-nav flex align-items-center">
                    <i class="icon-power_settings_new" style="margin:0px 5px;"></i> Cerrar Sesión
                </button>
            </form>

        </div>
    </div>

</div>

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
