@extends('layouts.app')

@section('title')
    Productos
@endsection

@include('layouts.navbar')

@section('content')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading"><b>Listado de productos</b></div>

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
                <form  action="{{ route('producto') }}" class="form-search pull-left" method="GET" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Buscar producto">
                    </div>
                    <button type="submit" class="btn btn-primary" >Buscar <i class="icon-search"></i></button>
                </form>

                <a href="{{ route('productoAdd') }}" class="btn btn-success" style="margin:7px 0px;">
                    <i class="icon-play_for_work "></i> Nuevo Registro
                </a>
            </div>

            <p>Hay <b>{{ $VistaProductos->total() }}</b> productos</p>
        </div>

        <hr>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th class="col-md-2">Nombre</th>
                    <th class="col-md-2">Marca</th>
                    <th class="col-md-2">Categoria</th>
                    <th class="col-md-1">Cantidad</th>
                    <th class="col-md-2">Precio Costo</th>
                    <th>Acción</th>
                </tr>
            </thead>

            <tbody>
            @foreach($VistaProductos as $row)
                <tr data-id="{{ $row->id }}">
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nombre }}</td>
                    <td>{{ $row->marca }}</td>
                    <td>{{ $row->categoria }}</td>
                    <td>{{ $row->cantidad }}</td>
                    <td>${{ $row->precio_costo }}</td>
                    <td>
                        <a href="{{ route('productoView', $row->id) }}" class="btn btn-info"><span class="icon-visibility"></span></a>
                        <a href="{{ route('productoEdit', $row->id) }}" class="btn btn-warning">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        </div>
    </div>

    <div class="footer-aplication">Copyright © 2018.</div>

{{ $VistaProductos->render() }}

<form action="{{ route('producto') }}/id" method="POST" id="form-delete">
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