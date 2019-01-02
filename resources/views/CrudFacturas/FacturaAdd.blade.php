@extends('layouts.app')

@section('title')
    Agregar
@endsection

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')

<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar Factura</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('facturaAdd') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">

                            <label for="fecha" class="col-md-1">Fecha</label>

                            <div class="col-md-12">
                                <input id="fecha" readonly type="text" class="form-control" name="fecha" value="{{ old('fecha') }}">
                                {!! $errors->first('fecha','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('producto_id') ? 'has-error' : ''}}">
                            <label for="idproducto" class="col-md-1">Producto</label>

                            <div class="col-md-12">
                                <select name="producto_id" id="producto_id" class="form-control">       
                                    <option Selected disabled>Seleccione el Producto</option>
                                    
                                @foreach($Productos as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('producto_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
                            <label for="marca" class="col-md-3">Marca</label>

                            <div class="col-md-12">
                                <input id="marca" readonly type="text" class="form-control" name="marca">
                                {!! $errors->first('marca','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
                            <label for="cantidad" class="col-md-1">Cantidad</label>

                            <div class="col-md-12">
                                <input id="cantidad" type="number" min="1" class="form-control" name="cantidad" value="{{ old('cantidad') }}">
                                {!! $errors->first('cantidad','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('precio') ? 'has-error' : ''}}">
                            <label for="precio" class="col-md-3">Precio</label>

                            <div class="col-md-12">
                                <input id="precio" type="number" min="0.00" step="0.01" class="form-control" name="precio" value="{{ old('precio') }}">                              
                                {!! $errors->first('precio','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : ''}}">
                            <label for="id_cliente" class="col-md-1">Cliente</label>

                            <div class="col-md-12">
                                <select name="cliente_id" id="cliente_id" class="form-control">       
                                    <option Selected disabled>Seleccione el Cliente</option>
                                    
                                @foreach($Clientes as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombres }} {{ $row->apellidos }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('cliente_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                            <label for="direccion" class="col-md-1">Dirección</label>

                            <div class="col-md-12">
                                <textarea name="direccion" readonly id="direccion" class="form-control ajuste" rows="5"></textarea>
                                {!! $errors->first('direccion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                            <label for="telefono" class="col-md-1">Teléfono</label>

                            <div class="col-md-12">
                                <input id="telefono" readonly type="text" class="form-control" name="telefono">
                                {!! $errors->first('telefono','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success col-md-6">
                                   <i class="icon-attach_file"></i> Agregar
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

            <a href="{{ route('factura') }}" class="btn btn-link"><i class="icon-description"></i> Listado de Facturas</a>
        </div>
    </div>

<script type="text/javascript">

    $(document).ready(function() {
        $("#fecha").datepicker({
        changeYear:true,
        yearRange: "1950:2100"
        });
    });

    $('#producto_id').on('change', function() {
        // Usaremos el método 'get' para obtener los 
        // datos del desarrollador mediante ajax.

        $.get(encodeURI('getProducto/'+ this.value), function(VistaProductos) {
            console.log(VistaProductos)
            // Con el método 'each' recorremos los datos.

            $.each(VistaProductos, function(key, data) {
                // Buscamos un input que tenga el mismo nombre
                // que nuestro campo, y establecemos su valor
                // con los datos del desarrollador.

                $("input[name="+ key +"]").val(data);
            });
        });
    })

    $('#cliente_id').on('change', function() {
        // Usaremos el método 'get' para obtener los 
        // datos del desarrollador mediante ajax.

        $.get(encodeURI('getCliente/'+ this.value), function(Clientes) {
            console.log(Clientes)
            // Con el método 'each' recorremos los datos.

            $.each(Clientes, function(key, data) {
                // Buscamos un input que tenga el mismo nombre
                // que nuestro campo, y establecemos su valor
                // con los datos del desarrollador.

                $("input[name="+ key +"]").val(data);
                $("textarea[name="+ key +"]").val(data); 
            });
        });
    })

</script>
@endsection