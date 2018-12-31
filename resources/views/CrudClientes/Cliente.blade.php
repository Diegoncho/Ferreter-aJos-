@extends('layouts.app')

@section('title')
    Clientes
@endsection

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading"><b>Listado de clientes</b></div>

        @if (Session::has('message-delete'))
            <div class="alert alert-success">
                <i class="icon-check_circle"></i> {{ Session::get('message-delete') }}
            </div>
        @endif

        @if (Session::has('message-add'))
            <div class="alert alert-info">
                <i class="icon-check_circle"></i> {{ Session::get('message-add') }}
            </div>
        @endif 

        @if (Session::has('message-edit'))
            <div class="alert alert-warning">
                <i class="icon-check_circle"></i> {{ Session::get('message-edit') }}
            </div>
        @endif 

        <div class="panel-body">

        <div class="flexbox md-5">
            <div class="function-crud flex align-items-center">
                <form  action="{{ route('cliente') }}" class="form-search pull-left" method="GET" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Buscar cliente">
                    </div>
                    <button type="submit" class="btn btn-primary" >Buscar <i class="icon-search"></i></button>
                </form>

                <a href="{{ route('clienteAdd') }}" class="btn btn-success" style="margin:7px 0px;">
                    <i class="icon-play_for_work "></i> Nuevo Registro
                </a>
            </div>

            <p>Hay <b>{{ $Clientes->total() }}</b> clientes</p>
        </div>

        <hr>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-3">Nombres</th>
                    <th class="col-md-3">Apellidos</th>
                    <th class="col-md-2">Teléfono</th>
                    <th >Acción</th>
                </tr>
            </thead>

            <tbody>
            @foreach($Clientes as $row)
                <tr data-id="{{ $row->id }}">
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nombres }}</td>
                    <td>{{ $row->apellidos }}</td>
                    <td>{{ $row->telefono }}</td>
                    <td>
                        <a href="{{ route('clienteView', $row->id) }}" class="btn btn-info"><span class="icon-visibility"></span></a>
                        <a href="{{ route('clienteEdit', $row->id) }}" class="btn btn-warning">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        </div>
    </div>

    <div class="footer-aplication">Copyright © 2018.</div>

{{ $Clientes->render() }}

<form action="{{ route('cliente') }}/id" method="POST" id="form-delete">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}                           
</form>

<script type="text/javascript">
        $(document).ready(function (){
            $('.btn-danger').click(function (e){
                e.preventDefault();

                var row = $(this).parents('tr');
                var id = row.data('id');
                var form = $('#form-delete');
                var url = form.attr('action').replace('id', id);
                var data = form.serialize();

                row.fadeOut();

                $.post(url, data, function(result){
                }).fail(function (){
                    alert('El registro no fue eliminado');
                    row.show();
                });
                
            });
        });
</script>
@endsection