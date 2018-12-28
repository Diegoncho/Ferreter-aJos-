@extends('layouts.app')

@section('title')
    Editar
@endsection

@include('layouts.navbar')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Categoria: {{ $Categorias->categoria }}</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('categoriaEdit', $Categorias->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group {{ $errors->has('categoria') ? 'has-error' : ''}}">
                            <label for="categoria" class="col-md-1">Categoria</label>

                            <div class="col-md-12">
                                <input id="categoria" type="text" class="form-control" name="categoria" value="{{ $Categorias->categoria }}">
                                {!! $errors->first('categoria','<span class="help-block">:message</span>') !!}
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

            <form action="{{ route('categoria') }}/{{ $Categorias->id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger">
                <i class="icon-delete_sweep"></i> Eliminar
            </button>

            <a href="{{ route('categoria') }}" class="btn btn-link pull-right"><i class="icon-description"></i> Listado de Categorias</a>
            </form>

        </div>
    </div>

@endsection