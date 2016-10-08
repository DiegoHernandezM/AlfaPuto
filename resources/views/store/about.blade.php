@extends('store.template')

@section('content')

	<div class="jumbotron">
		<div class="container text-center">
			<div class="page-header">
		<h1>¿Quienes somos?</h1>
	</div>

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Comenzar
</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h1 class="modal-title" id="myModalLabel">¿Quienes somos?</h1>
      </div>
      <div class="modal-body text-right">
        <p><h2><img class="avatar" src="{{ asset('img/pedro.jpeg')}}">Una empresa 100% comprometida con la satisfacción del cliente, nuestros productos tienen la más alta calidad</h2></p>
        <p><h2>Para nosotros nuestro primer deber es con el cliente, ofreciendo siempre nuevos productos y a los mejores precios.</h2></p>
      </div>
      <div class="modal-footer">
        
        <h4>Atte: Equipo de Iienda Virtual Online</h4>
      </div>
    </div>
  </div>
</div> 

		</div>
	</div>	

 
  
</div>
</div>
<div class="jumbotron"><br><br><br><br><br></div>
@stop
