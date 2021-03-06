@extends('store.template')
@section('content')
    <div class="container text-center">
        <div class="page-header">
            <h1><i class="fa fa-shopping-cart">&nbsp; </i> Carrito de Compras</h1>
        </div>
        <div class="table-cart">
            @if(count($cart))

                <p>
                    <a href="{{ route('cart-trash') }}" class="btn btn-danger">
                        Vaciar carrito <i class="fa fa-trash"></i>
                    </a>
                </p>
        <div class="table-responsive">
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Quitar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td><img src="../img/products/{{ $item->image}}" width="40px" ></td>
                        <td>{{ $item->name }}</td>
                        <td>${{ number_format($item->price,2) }}</td>
                        <td>
                            <input
                                    type="number"
                                    min="1"
                                    max="100"
                                    value="{{ $item->quantity }}"
                                    id="product_{{ $item->id }}"
                            >
                            <a
                                    href="#"
                                    class="btn btn-warning btn-update-item"
                                    data-href="{{ route('cart-update', $item->slug) }}"
                                    data-id = "{{ $item->id }}"
                            >
                                <i class="fa fa-refresh"></i>
                            </a>
                        </td>
                        <td>${{ number_format($item->price * $item->quantity,2) }}</td>
                        <td>
                            <a href="{{ route('cart-delete', $item->slug) }}" class="btn btn-danger">
                                <i class="fa fa-remove"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                <div class="alert alert-dismissible alert-info">
                    <strong>Toda compra genera un conto de envio de $100.00 MN por gastos de envio</strong>
                </div>
            <hr>
            <h3>
					<span class="label label-success">
						Total: ${{ number_format($total,2) }}
					</span>
            </h3>
        </div>
            @else
                <h3><span class="label label-info">No hay productos</span></h3>
            @endif
            <hr>
            <p>
                <a href="{{ route('index') }}" class="btn btn-primary">
                    <i class="fa fa-chevron-circle-left"></i> Seguir comprando
                </a>

                <a href="{{ route('order-detail') }}" class="btn btn-primary">
                    Continuar <i class="fa fa-chevron-circle-right"></i>
                </a>
            </p>
        </div>

    </div></br></br>
@stop
