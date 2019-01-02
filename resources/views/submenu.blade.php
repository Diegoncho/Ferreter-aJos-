@extends('layouts.app')

@section('title')
    SubMenu
@endsection

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')

<link rel="stylesheet" href="{{ asset('css/submenu.css') }}">

    <div class="panel-menu">

        <a href="{{ route('empleado') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Buscar un Empleado.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-person_pin"></i>
                </div>
            </div>
        </a>

        <a href="{{ route('cliente') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Buscar un Cliente.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-recent_actors"></i>
                </div>
            </div>
        </a>
            
        <a href="{{ route('proveedor') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Buscar un Proveedor.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-monetization_on"></i>
                </div>
            </div>
        </a>

        <a href="{{ route('producto') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Buscar un Producto.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-shopping_basket"></i>
                </div>
            </div>
        </a>
            
        <a href="{{ route('marca') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Buscar una Marca.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-local_offer"></i>
                </div>
            </div>
        </a>

        <a href="{{ route('categoria') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Buscar una Categoría.</h4>
                        <p>Modo desarrollador personalizado.</p>
                    </div>
                </div>

                <div class="section-icon-2">
                    <i class="icon-library_books"></i>
                </div>
            </div>
        </a>

        <a href="{{ route('cargo') }}">
            <div class="panel-module flexbox">
                <div class="section-menu flex align-items-center">
                    <div class="section-icon">
                        <i class="icon-arrow_forward"></i>
                    </div>

                    <div class="section-info">
                        <h4>Buscar un Cargo.</h4>
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
