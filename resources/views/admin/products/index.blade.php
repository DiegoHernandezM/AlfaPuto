@extends('admin.template')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1>Productos
                <a href="{{ url('admin/products/create')}}" class="btn btn-warning"><i class="fa fa-plus-circle"></i>&nbsp;Agregar producto</a>
            </h1>
        </div>
        <div class="page">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Proveedor</th>
                        <th>Categoria</th>
                        <th>Extracto</th>
                        <th>Precio</th>
                        <th>Visible</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($products as $product): ?>
                    
                        <tr>

                            <td><img src="{{ $product->image }}" width="40"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->provider->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->extract }}</td>
                            <td>${{ number_format($product->price,2) }}</td>
                            <td>{{ $product->visible == 1 ? "Si" : "No" }}</td>

                            <td>
                                <a href="{{ route('admin.products.edit', $product->slug) }}" class="btn btn-primary">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['admin.product.destroy', $product->slug]]) !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <hr>
        </div>
    </div>



@stop