@extends('store.template')

@section('content')
	<h1>Detalle del Producto</h1>

	<div class="product-block">
		<img src="{{ $product->image }}" width="300px">
	</div>

	<div class="product-block">
		<h3>{{$product->name}}</h3><hr>
	<div class="product-info">
		
		<p>Descripción: {{$product->description}}</p>
		<p>Precio: $ {{number_format($product->price,2)}}</p>
		<p><a href="#">La quiero!</a></p>
	</div>

	</div>

<a href="{{ route('home')}}">Regresar</a>
@stop
