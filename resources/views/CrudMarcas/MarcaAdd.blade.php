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
                <div class="panel-heading">Agregar Marca</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{ route('marcaAdd') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('marca') ? 'has-error' : ''}}">
                            <label for="marca" class="col-md-1">Marca</label>

                            <div class="col-md-12">
                                <input id="marca" type="text" class="form-control" name="marca" value="{{ old('marca') }}">
                                {!! $errors->first('marca','<span class="help-block">:message</span>') !!}
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

            <a href="{{ route('marca') }}" class="btn btn-link"><i class="icon-description"></i> Listado de Marcas</a>
        </div>
    </div>

@endsection