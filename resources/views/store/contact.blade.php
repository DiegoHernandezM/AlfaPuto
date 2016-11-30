@extends('store.template')

@section('content')

  <div class="jumbotron text-center">
  <div class="container text-center">
  <h1>Contacto</h1>

      {!!Form::open(['route'=>'mail.store','method'=>'POST'])!!}

    <legend>Envianos un mensaje</legend>


     <div class="form-group">
      <label for="inputName" class="col-lg-2 control-label">Nombre <strong>*</strong></label>
          {!!Form::text('name',null,['required' => 'required', 'placeholder' => 'Nombre'])!!}
     </div>

     <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email <strong>*</strong></label>

          {!!Form::email('email',null,['placeholder' => 'Email', 'required' => 'required'])!!}
     </div>

     <div class="form-group text_center">
      <label for="textArea" class="col-lg-2 control-label">Para poder resolver tus dudas, escribe aqui tu mensaje<strong>*</strong></label>

          {!!Form::textarea('mensaje',null,['placeholder' => 'Mensaje', 'required' => 'required'])!!}
          </br>

         {!! Form::submit('Enviar', array('class'=>'btn btn-primary')) !!}
     </div>
      {!!Form::close()!!}
</div>

@stop