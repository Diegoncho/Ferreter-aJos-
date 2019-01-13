@extends('layouts.app')

@section('title')
    Editar
@endsection

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Proveedor: {{ $Proveedores->nombre }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('proveedorEdit', $Proveedores->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                            <label for="nombre" class="col-md-1">Nombre</label>

                            <div class="col-md-12">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $Proveedores->nombre }}">
                                {!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                            <label for="direccion" class="col-md-1">Dirección</label>

                            <div class="col-md-12">
                                <textarea name="direccion" id="direccion" class="form-control ajuste" rows="5">{{ $Proveedores->direccion }}</textarea>
                                {!! $errors->first('direccion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                            <label for="telefono" class="col-md-1">Teléfono</label>

                            <div class="col-md-12">
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ $Proveedores->telefono }}">
                                {!! $errors->first('telefono','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-warning col-md-6">
                                   <i class="icon-border_color"></i> Actualizar
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <form action="{{ route('proveedor') }}/{{ $Proveedores->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger">
                <i class="icon-delete_sweep"></i> Eliminar
            </button>

            <a href="{{ route('proveedor') }}" class="btn btn-link pull-right">
                <i class="icon-description"></i> Listado de Proveedores
            </a>
            </form>

        </div>
    </div>

@section('scripts')
<script type="text/javascript">

    $(document).ready(function(){
        $('#telefono').mask("9999-9999")
    });

</script>
@endsection

@endsection