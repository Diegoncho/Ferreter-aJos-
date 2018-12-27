@extends('layouts.app')

@section('title')
    Marcas
@endsection

@section('content')

@include('layouts.navbar')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading"><b>Listado de marcas</b></div>

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
                <form  action="{{ route('marca') }}" class="form-search pull-left" method="GET" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Buscar marca">
                    </div>
                    <button type="submit" class="btn btn-primary" >Buscar <i class="icon-search"></i></button>
                </form>


                <a href="{{ route('marcaAdd') }}" class="btn btn-success" style="margin:7px 0px;"><i class="icon-play_for_work "></i> Nuevo Registro</a>
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
                <tr data-id="{{ $row->id }}">
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->marca }}</td>
                    <td>
                        <a href="{{ route('marcaEdit', $row->id) }}" class="btn btn-warning">Editar</a>
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

<form action="{{ route('marca') }}/id" method="POST" id="form-delete">
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