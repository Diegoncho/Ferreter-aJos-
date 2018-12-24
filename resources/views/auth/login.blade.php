@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
<hr>
@if (session()->has('flash'))
    <div class="alert alert-info">{{ session('flash') }}</div>
@endif

<link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-login">

				<div class="panel-heading">
                    <div class="row">
						<div class="col-xs-12 flex align-items-center">                
                            <div class="panel-icon"></div>
                            <h1 class="panel-title">Acceso a la aplicación</h1> 
						</div>
					</div>
					<hr>
                </div>
                
				<div class="panel-body">
                    <form action="{{ route('login') }}" method="POST" autocomplete="off">
                        
                        {{ csrf_field() }}    

                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <input class="form-control" type="text" name="name" placeholder="Username" value="{{ old('name') }}">

                        {!! $errors->first('name','<span class="help-block">:message</span>') !!}
                        </div>

                         <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                            <input class="form-control" type="password" name="password" placeholder="Password">

                        {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                        </div>

                        <button class="btn btn-primary col-md-5">Acceder</button>
                    </form>
                </div>

            </div>

            <div class="footer-login">Copyright © 2018.</div>
        </div>
    </div>
@endsection