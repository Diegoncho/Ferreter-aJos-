@extends('layouts.app')

@section('title')
    Agregar
@endsection

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="min-width: 830px">
                <div class="panel-heading">
                    Nuevo comprobante
                </div>

                <div class="panel-body">
                    <invoice></invoice>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
<script type="riot/tag" src="{{ asset('components/invoice.tag') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            riot.mount('invoice');
        });
    </script>
@endsection

@endsection