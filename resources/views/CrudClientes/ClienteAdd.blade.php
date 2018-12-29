@extends('layouts.app')

@section('title')
    Agregar
@endsection

@include('layouts.navbar')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar Cliente</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('clienteAdd') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('nombres') ? 'has-error' : ''}}">
                            <label for="nombres" class="col-md-1">Nombres</label>

                            <div class="col-md-12">
                                <input id="nombres" type="text" class="form-control" name="nombres" value="{{ old('nombres') }}">
                                {!! $errors->first('nombres','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
                            <label for="apellidos" class="col-md-1">Apellidos</label>

                            <div class="col-md-12">
                                <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}">
                                {!! $errors->first('apellidos','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                            <label for="direccion" class="col-md-1">Dirección</label>

                            <div class="col-md-12">
                                <textarea name="direccion" id="direccion" class="form-control ajuste" rows="5">{{ old('direccion') }}</textarea>
                                {!! $errors->first('direccion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                            <label for="telefono" class="col-md-1">Teléfono</label>

                            <div class="col-md-12">
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">
                                {!! $errors->first('telefono','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                            <label for="email" class="col-md-3">Correo Electronico</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">                     
                                {!! $errors->first('email','<span class="help-block">:message</span>') !!}
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

            <a href="{{ route('cliente') }}" class="btn btn-link"><i class="icon-description"></i> Listado de Clientes</a>
        </div>
    </div>

@endsection