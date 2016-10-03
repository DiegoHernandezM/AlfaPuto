@extends('store.template')


@section('content')

<div class="products">
	<?php foreach ($products as $product): ?>

	<div class="product"><h3>
	{{$product->name}}</h3>
	<img src="{{$product->image}}" width="100px">
	</div>
	
	<div class="producto-info">
		<p>Descripción: {{$product->extract}}</p>
		<p>Precio: $ {{number_format($product->price,2)}}</p>
		<p>
			<a href="#">¡Comprar ya!</a>
			<a href="{{ route('product-detail', $product->slug) }}">Leer más..</a>
		</p>
	</div>
<?php endforeach ?>
</div>
@stop