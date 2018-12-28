@extends('layouts.app')

@section('title')
    Categorias
@endsection

@include('layouts.navbar')

@section('content')

    <div class="panel panel-default" style="min-width: 800px">
        <div class="panel-heading"><b>Listado de categorias</b></div>

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
                <form  action="{{ route('categoria') }}" class="form-search pull-left" method="GET" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Buscar categoria">
                    </div>
                    <button type="submit" class="btn btn-primary" >Buscar <i class="icon-search"></i></button>
                </form>

                <a href="{{ route('categoriaAdd') }}" class="btn btn-success" style="margin:7px 0px;">
                    <i class="icon-play_for_work "></i> Nuevo Registro
                </a>
            </div>

            <p>Hay <b>{{ $Categorias->total() }}</b> categorias</p>
        </div>

        <hr>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-4">Categoria</th>
                    <th class="col-md-1">Acción</th>
                </tr>
            </thead>

            <tbody>
            @foreach($Categorias as $row)
                <tr data-id="{{ $row->id }}">
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->categoria }}</td>
                    <td>
                        <a href="{{ route('categoriaEdit', $row->id) }}" class="btn btn-warning">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        </div>
    </div>

    <div class="footer-aplication">Copyright © 2018.</div>

{{ $Categorias->render() }}

<form action="{{ route('categoria') }}/id" method="POST" id="form-delete">
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