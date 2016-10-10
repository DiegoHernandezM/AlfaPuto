@extends('layouts.auth')

@section('htmlheader_title')
    Password recovery
@endsection

@section('content')
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

<body class="login-page login-init">
    <div class="login-box">
        <div class="login-logo">
        <a href="{{ url('/home') }}"><img src="{{ asset('/img/logo_pagina.png') }}" WIDTH=140 HEIGHT=200 ></a>   
        </div><!-- /.login-logo -->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>¡Error!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-box-body">
            <p class="login-box-msg">Recupera tu contraseña</p>
            <form action="{{ url('/password/email') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <br>
                <div class="row">
                    
                    <div class="col-xs-14">
                       <center><button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.sendpassword') }}</button></center>
                    </div><!-- /.col -->
                    <div class="col-xs-2">
                    </div><!-- /.col -->
                </div>
            </form>
            <br>

            <center>
                <a href="{{ url('/login') }}"> Iniciar sesión</a><br>
                <a href="{{ url('/') }}" class="text-center">Ír a la página de inicio</a>
            </center>

        </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    @include('layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
