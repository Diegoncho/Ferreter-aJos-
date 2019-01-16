@extends('layouts.app')

@section('title')
    SubMenuAdd
@endsection

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')

<link rel="stylesheet" href="{{ asset('css/submenu.css') }}">

    <div class="panel-menu">

        <a href="{{ route('empleadoAdd') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Agregar un Empleado.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-person_pin"></i>
                </div>
            </div>
        </a>

        <a href="{{ route('clienteAdd') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Agregar un Cliente.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-recent_actors"></i>
                </div>
            </div>
        </a>
            
        <a href="{{ route('proveedorAdd') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Agregar un Proveedor.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-monetization_on"></i>
                </div>
            </div>
        </a>

        <a href="{{ route('compraAdd') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Agregar una Compra.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-shopping_cart"></i>
                </div>
            </div>
        </a>

        <a href="{{ route('productoAdd') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Agregar un Producto.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-shopping_basket"></i>
                </div>
            </div>
        </a>
            
        <a href="{{ route('marcaAdd') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Agregar una Marca.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-local_offer"></i>
                </div>
            </div>
        </a>

        <a href="{{ route('categoriaAdd') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Agregar una Categoría.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-library_books"></i>
                </div>
            </div>
        </a>

        <a href="{{ route('cargoAdd') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Agregar un Cargo.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-widgets"></i>
                </div>
            </div>
        </a>

    </div>

@endsection
