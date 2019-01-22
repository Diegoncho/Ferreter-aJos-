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

                        <div class="reporte-title">Producto</div>
                        <hr>

                        <div class="data-group">
                            <label for="nombre">Nombre**</label>

                            <div class="reporte-info">
                                <p>{{ $Productos->nombre }}</p>
                            </div>
                        </div>

                        <div class="data-group">
                            <label for="descripcion">Descripción**</label>

                            <div class="reporte-info">
                                <p>{{ $Productos->descripcion }}</p>
                            </div>
                        </div>

                        <div class="data-group">
                            <label for="marca">Marca**</label>

                            <div class="reporte-info">
                                <p>{{ $VistaProductos->marca }}</p>
                            </div>
                        </div>

                        <div class="data-group">
                            <label for="categoria">Categoría**</label>

                            <div class="reporte-info">
                                <p>{{ $VistaProductos->categoria }}</p>
                            </div>
                        </div>

                        <div class="data-group">
                            <label for="cantidad">Cantidad**</label>

                            <div class="reporte-info">
                                <p>{{ $VistaProductos->cantidad }}</p>
                            </div>
                        </div>

                        <div class="data-group">
                            <label for="proveedor">Proveedor**</label>

                            <div class="reporte-info">
                                <p>{{ $VistaProductos->proveedor }}</p>
                            </div>
                        </div>
                        
                        <div class="data-group">
                            <label for="precio_costo">Precio Costo**</label>

                            <div class="reporte-info">
                                <p>${{ $VistaProductos->precio_costo }}</p>
                            </div>
                        </div>

                        <div class="data-group">
                            <label for="precio_venta">Precio Venta**</label>

                            <div class="reporte-info">
                                <p>${{ $VistaProductos->precio_venta }}</p>
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

                <a href="{{ route('producto') }}" class="btn btn-link pull-right">
                    <i class="icon-description"></i> Listado de Productos
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
            doc.save('Producto{{ $Productos->id }}.pdf');
        }
    });
}

</script>
@endsection

@endsection