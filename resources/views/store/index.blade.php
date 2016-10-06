@extends('store.template')


@section('content')
<div class="container text-center ">
	<div id="products">
<?php foreach ($products as $product): ?>
	
	<div class="product white-panel">
	<h3>{{$product->name}}</h3><hr>
	<img src="{{$product->image}}" width="200px" height="200px">
	<div class="product-info panel">
		<p>Descripción: {{$product->extract}}</p>
		<p>Precio: $ {{number_format($product->price,2)}}</p>
		<p>
			<a class="btn btn-warning" href="#"><i class="fa fa-cart-plus"></i>&nbsp; ¡Comprar ya!</a></p>
			<p><a class="btn btn-primary" href="{{ route('product-detail', $product->slug) }}"><i class="fa fa-chevron-circle-right"></i>&nbsp;Leer más..</a>
		</p>
	</div>
</div>

<?php endforeach ?>
</div>
</div>
@stop