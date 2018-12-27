@extends('layouts.app')

@section('title')
    Marcas
@endsection

@section('content')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading"><b>Listado de marcas</b></div>
        <div class="panel-body">

        <div class="flexbox md-5">
            <div class="function-crud flex align-items-center">
                <form  action="{{ route('marca') }}" class="form-search pull-left" method="GET" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Buscar marca">
                    </div>
                    <button type="submit" class="btn btn-primary" >Buscar <i class="icon-search"></i></button>
                </form>


                <a href="" class="btn btn-success" style="margin:7px 0px;"><i class="icon-play_for_work "></i> Nuevo Registro</a>
            </div>

            <p>Hay <b>{{ $Marcas->total() }}</b> marcas</p>
        </div>

        <hr>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="col-md-1">#</th>
                        <th class="col-md-4">Marca</th>
                        <th class="col-md-1">Acción</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($Marcas as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->marca }}</td>
                        <td>
                            <a href="#" class="btn btn-warning">Editar</a>
                            <a href="#" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer-aplication">Copyright © 2018.</div>

{{ $Marcas->render() }}

@endsection