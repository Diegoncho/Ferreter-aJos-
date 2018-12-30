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
                <div class="panel-heading">Editar Empleado: {{ $Empleados->nombres }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('empleadoEdit', $Empleados->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group {{ $errors->has('nombres') ? 'has-error' : ''}}">
                            <label for="nombres" class="col-md-1">Nombres</label>

                            <div class="col-md-12">
                                <input id="nombres" type="text" class="form-control" name="nombres" value="{{ $Empleados->nombres }}">
                                {!! $errors->first('nombres','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
                            <label for="apellidos" class="col-md-1">Apellidos</label>

                            <div class="col-md-12">
                                <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ $Empleados->apellidos }}">
                                {!! $errors->first('apellidos','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cargo_id') ? 'has-error' : ''}}">
                            <label for="idcargo" class="col-md-1">Cargo</label>

                            <div class="col-md-12">
                                <select name="cargo_id" id="cargo_id" class="form-control">       
                                    <option value="{{ $VistaEmpleados->cargo_id }}">{{ $VistaEmpleados->cargo }}</option>
                                    
                                @foreach($Cargos as $row)
                                    <option value="{{ $row->id }}">{{ $row->cargo }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('cargo_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                            <label for="direccion" class="col-md-1">Dirección</label>

                            <div class="col-md-12">
                                <textarea name="direccion" id="direccion" class="form-control ajuste" rows="5">{{ $Empleados->direccion }}</textarea>
                                {!! $errors->first('direccion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                            <label for="telefono" class="col-md-1">Teléfono</label>

                            <div class="col-md-12">
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ $Empleados->telefono }}">
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

            <form action="{{ route('empleado') }}/{{ $Empleados->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger">
                <i class="icon-delete_sweep"></i> Eliminar
            </button>

            <a href="{{ route('empleado') }}" class="btn btn-link pull-right">
                <i class="icon-description"></i> Listado de Empleados
            </a>
            </form>

        </div>
    </div>

@endsection