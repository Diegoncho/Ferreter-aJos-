@extends('layouts.app')

@section('title')
    Reporte
@endsection

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')

<link rel="stylesheet" href="{{ asset('css/reporte.css') }}">

    <div class="row">
        <div class="col-md-7 col-md-offset-plus">

            <div class="module-reporte" id="module-reporte">
                <div class="header-reporte"></div>

                    <div class="reporte-container">
                        <h2>Detalles.</h2>

                        <div class="reporte-title">Cliente</div>
                        <hr>

                        <div class="data-group">
                            <label for="nombre">Nombres**</label>

                            <div class="reporte-info">
                                <p>{{ $Clientes->nombres }}</p>
                            </div>
                        </div>

                        <div class="data-group">
                            <label for="apellidos">Apellidos**</label>

                            <div class="reporte-info">
                                <p>{{ $Clientes->apellidos }}</p>
                            </div>
                        </div>

                        <div class="data-group">
                            <label for="direccion">Dirección**</label>

                            <div class="reporte-info">
                                <p>{{ $Clientes->direccion }}</p>
                            </div>
                        </div>

                        <div class="data-group">
                            <label for="categoria">Categoría**</label>

                            <div class="reporte-info">
                                <p>{{ $Clientes->categoria }}</p>
                            </div>
                        </div>

                        <div class="data-group">
                            <label for="telefono">Teléfono**</label>

                            <div class="reporte-info">
                                <p>{{ $Clientes->telefono }}</p>
                            </div>
                        </div>

                        <div class="data-group">
                            <label for="email">Correo Electrónico**</label>

                            <div class="reporte-info">
                                <p>{{ $Clientes->email }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="logo-application"></div>
                    </div>

            </div>
            
            <div class="print-reporte flexbox">
                <a href="#" onclick="javascript:genPDF();" class="pdf btn btn-link">
                    <i class="icon-cloud_download"></i> Descargar PDF
                </a>

                <a href="{{ route('cliente') }}" class="btn btn-link pull-right">
                    <i class="icon-description"></i> Listado de Clientes
                </a>
            </div>

            <div class="footer-aplication">Copyright © 2018.</div>
        </div>
    </div>

@section('scripts')
<script type="text/javascript">

function genPDF() {
    html2canvas(document.getElementById('module-reporte'), {
        onrendered: function (canvas) {
            var img = canvas.toDataURL('image/png');
            var doc = new jsPDF();
            doc.addImage(img, 'JPEG',20,20);
            doc.save('Cliente{{ $Clientes->id }}.pdf');
        }
    });
}

</script>
@endsection

@endsection
