@extends('store.template')

@section('content')

  <div class="jumbotron text-center">
  <div class="container text-center">
  <h1>Contacto</h1>
  
  <form class="form-horizontal text-center">
  <fieldset>
    <legend>Envianos un mensaje</legend>
     <div class="form-group">
      <label for="inputName" class="col-lg-2 control-label">Nombre <strong>*</strong></label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Nombre">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email <strong>*</strong></label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>
    <div class="form-group text_center">
      <label for="textArea" class="col-lg-2 control-label">Para poder resolver tus dudas, escribe aqui tu mensaje<strong>*</strong></label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea"></textarea></br>    
    </div></br>
    
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
  </fieldset>
</form>
</div>
</div>

@stop