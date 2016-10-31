@extends('admin.template')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1><i class="fa fa-rocket"></i> MY LARAVEL STORE - DASHBOARD</h1>
        </div>
        
        <h2>Bienvenido(a) {{ Auth::user()->user }} al Panel de administración de tu tienda en línea.</h2><hr>
        
        <div class="row">
            
        <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a href="{{url('admin/sliders') }}" class="btn btn-warning btn-block btn-home-admin">Slider Promociones</a>
                </div>
            </div> 

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a href="{{url('admin/category') }}" class="btn btn-warning btn-block btn-home-admin">Categorias</a>
                </div>
            </div> 

            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt icon-home"></i>
                    <a href="{{url('admin/providers') }}" class="btn btn-warning btn-block btn-home-admin">Proovedores</a>
                </div>
            </div>       
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  icon-home"></i>
                    <a href="{{url('admin/products') }}" class="btn btn-warning btn-block btn-home-admin">Poductos</a>
                </div>
            </div>
                    
        </div>
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-cc-paypal  icon-home"></i>
                    <a href="" class="btn btn-warning btn-block btn-home-admin">Pedidos</a>
                </div>
            </div> 
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users  icon-home"></i>
                    <a href="" class="btn btn-warning btn-block btn-home-admin">Usuarios</a>
                </div>
            </div>
                    
        </div>
        
    </div>
    <hr>

@stop