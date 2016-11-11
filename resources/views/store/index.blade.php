@extends('store.template')
@section('content')
<hr>
<div id="slider" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
    <li data-target="#slider" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <?php foreach ($sliders as $slider): ?>
<div class="carousel-inner" role="listbox" data-slider="{{$slider->id}}">
    <div class="item active"> 
    <img src="../img/sliders/{{ $slider->img_name}}" width="1900px" height="400px">
     <div class="carousel-caption">
        <p><h1> {{ $slider->title }}</h1></p>
       <p><h4>{{ $slider->dec }}</h4></p>
      </div>

    </div>
  
   </div>
    <?php endforeach ?>


  <!-- Controls -->
  <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
    <span class="sr-only">Previous</span>
    <div style="margin-top: 125%;">
    <span class="fa fa-chevron-left fa-3x" aria-hidden="true"></span>
    </div>
  </a>
  <a class="right carousel-control" href="#slider" role="button" data-slide="next">
    <span class="sr-only">Next</span>
    <div style="margin-top: 125%;">
    <span class="fa fa-chevron-right fa-3x" aria-hidden="true"></span>
    </div>
  </a>
</div>

<hr><hr><hr>






<div class="container text-center ">
	<div id="products">
<?php foreach ($products as $product): ?>
	
	<div class="product white-panel">
	<h3>{{$product->name}}</h3><hr>
	<img src="{{$product->image}}" width="200px" height="250px">
	<div class="product-info panel">
		<p>Descripción: {{$product->extract}}</p>
		<h3><span class="label label-success">Precio: $ {{number_format($product->price,2)}}</span></h3>
		<p><a class="btn btn-warning" href="{{ route('cart-add', $product->slug) }}">
				<i class="fa fa-cart-plus"></i>&nbsp; ¡Comprar ya!
			</a></p>
		<p><a class="btn btn-primary" href="{{ route('product-detail', $product->slug) }}"><i class="fa fa-chevron-circle-right"></i>&nbsp;Leer más..</a></p>
	</div>
</div>

<?php endforeach ?>
</div>
</div>
@stop