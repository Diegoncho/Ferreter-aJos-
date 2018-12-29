@extends('layouts.app')

@section('title')
    Agregar
@endsection

@include('layouts.navbar')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Agregar Producto</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('productoAdd') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                            <label for="nombre" class="col-md-1">Nombre</label>

                            <div class="col-md-12">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                                {!! $errors->first('nombre','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
                            <label for="descripcion" class="col-md-1">Descripción</label>

                            <div class="col-md-12">
                                <textarea name="descripcion" id="descripcion" class="form-control ajuste" rows="5">{{ old('descripcion') }}</textarea>
                                {!! $errors->first('descripcion','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('marca_id') ? 'has-error' : ''}}">
                            <label for="idmarca" class="col-md-1">Marca</label>

                            <div class="col-md-12">
                                <select name="marca_id" id="marca_id" class="form-control">       
                                    <option Selected disabled>Seleccione la Marca</option>
                                    
                                @foreach($Marcas as $row)
                                    <option value="{{ $row->id }}">{{ $row->marca }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('marca_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : ''}}">
                            <label for="idcategoria" class="col-md-1">Categoria</label>

                            <div class="col-md-12">
                                <select name="categoria_id" id="categoria_id" class="form-control">       
                                    <option Selected disabled>Seleccione la Categoria</option>
                                    
                                @foreach($Categorias as $row)
                                    <option value="{{ $row->id }}">{{ $row->categoria }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('categoria_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
                            <label for="cantidad" class="col-md-1">Cantidad</label>

                            <div class="col-md-12">
                                <input id="cantidad" type="number" min="1" class="form-control" name="cantidad" value="{{ old('cantidad') }}">
                                {!! $errors->first('cantidad','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('proveedor_id') ? 'has-error' : ''}}">
                            <label for="idproveedor" class="col-md-1">Proveedor</label>

                            <div class="col-md-12">
                                <select name="proveedor_id" id="proveedor_id" class="form-control">       
                                    <option Selected disabled>Seleccione el Proveedor</option>
                                    
                                @foreach($Proveedores as $row)
                                    <option value="{{ $row->id }}">{{ $row->nombre }}</option>
                                @endforeach
                                </select>
                                {!! $errors->first('proveedor_id','<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                         <div class="form-group {{ $errors->has('precio_costo') ? 'has-error' : ''}}">
                            <label for="precio_costo" class="col-md-3">Precio Costo</label>

                            <div class="col-md-12">
                                <input id="precio_costo" type="number" min="0.00" step="0.01" class="form-control" name="precio_costo" value="{{ old('precio_costo') }}">                              
                                {!! $errors->first('precio_costo','<span class="help-block">:message</span>') !!}
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

            <a href="{{ route('producto') }}" class="btn btn-link"><i class="icon-description"></i> Listado de Productos</a>
        </div>
    </div>

@endsection