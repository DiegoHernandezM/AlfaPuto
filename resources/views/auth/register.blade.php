@extends('layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet" xmlns="http://www.w3.org/1999/html">


    <body class="hold-transition register-page login-init">
    <div class="register-box">


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

        <div class="register-box-body">
            
            <form action="{{ url('/register') }}" method="post">
                <div class="register-logo">
                    <a href="{{ url('/home') }}"><img src="{{ asset('/img/logo_pagina.png') }}" WIDTH=140 HEIGHT=200 ></a>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.fullname') }}" name="name" value="{{ old('name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.retrypepassword') }}" name="password_confirmation"/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-1">
                        <label>
                            <div class="checkbox_register icheck">
                                <label>
                                    <input type="checkbox" name="terms">
                                </label>
                            </div>
                        </label>
                    </div><!-- /.col -->
                    <div class="col-xs-7">
                        <div class="form-group">
                            <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">Términos y Condiciones</button>
                        </div>
                        

                    </div><!-- /.col -->
                    <div class="col-xs-6 col-xs-push-2">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">¡Registrarme!</button>
                    </div><!-- /.col -->
                </div>
            </form>
            <br>

            <div class="centered">
            <a href="{{ url('/login') }}">¡Ya tengo una cuenta!</a></div>
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    @include('layouts.partials.scripts_auth')

    @include('auth.terms')

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
