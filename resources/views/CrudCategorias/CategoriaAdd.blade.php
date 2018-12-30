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
                <div class="panel-heading">Agregar Categoria</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('categoriaAdd') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('categoria') ? 'has-error' : ''}}">
                            <label for="cargp" class="col-md-1">Categoria</label>

                            <div class="col-md-12">
                                <input id="categoria" type="text" class="form-control" name="categoria" value="{{ old('categoria') }}">
                                {!! $errors->first('categoria','<span class="help-block">:message</span>') !!}
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

            <a href="{{ route('categoria') }}" class="btn btn-link"><i class="icon-description"></i> Listado de Categorias</a>
        </div>
    </div>

@endsection