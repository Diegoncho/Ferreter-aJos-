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
                    Nueva compra
                </div>

                <div class="panel-body">
                    <invoiceC></invoiceC>
                </div>
            </div>
        </div>
    </div>

@section('scripts')
<script type="riot/tag" src="{{ asset('components/invoiceC.tag') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            riot.mount('invoiceC');
        });
    </script>
@endsection

@endsection