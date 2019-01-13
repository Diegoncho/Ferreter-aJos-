@extends('layouts.app')

@section('title')
    Facturas
@endsection

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="min-width: 800px">
                <div class="panel-heading"><b>Listado de comprobantes</b></div>

                @if (Session::has('message-add'))
                    <div class="alert alert-info">
                        <i class="icon-check_circle"></i> {{ Session::get('message-add') }}
                    </div>
                @endif 

                <div class="panel-body">

                <div class="flexbox md-5">
                    <div class="function-crud flex align-items-center">
                        <form  action="{{ route('factura') }}" class="form-search pull-left" method="GET" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Buscar # comprobante">
                            </div>
                            <button type="submit" class="btn btn-primary" >Buscar <i class="icon-search"></i></button>
                        </form>

                        <a href="{{ route('facturaAdd') }}" class="btn btn-success" style="margin:7px 0px;">
                            <i class="icon-play_for_work "></i> Nuevo Registro
                        </a>
                    </div>

                    <p>Hay <b>{{ $model->total() }}</b> comprobantes</p>
                </div>

                <hr>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th style="width:100px;" class="text-right">IVA</th>
                            <th style="width:160px;" class="text-right">Sub Total</th>
                            <th style="width:160px;" class="text-right">Total</th>
                            <th style="width:180px;" class="text-right">Creado</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($model as $row)
                        <tr>
                            <td>{{ str_pad ($row->id, 7, '0', STR_PAD_LEFT)}}</td>
                            <td>
                                <a href="{{ route('facturaDetail', $row->id) }}">
                                    {{ $row->client->nombres }} {{ $row->client->apellidos }}
                                </a>
                            </td>
                            <td class="text-right">$ {{ number_format($row->iva, 2) }}</td>
                            <td class="text-right">$ {{ number_format($row->subtotal, 2) }}</td>
                            <td class="text-right">$ {{ number_format($row->total, 2) }}</td>
                            <td class="text-right">{{ $row->created_at  }}</td>
                            <td class="text-right">
                                <a href="{{ route('facturaPdf', $row->id) }}"class="btn btn-success btn-block btn-xs">
                                    <i class="icon-description"></i> Descargar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>

            {{ $model->render() }}
        </div>  
    </div>

@endsection