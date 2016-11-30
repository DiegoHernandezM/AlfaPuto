@extends('store.template')

@section('content')

  <div class="jumbotron text-center">
  <div class="container text-center">
  <h1>Contacto</h1>

      {!!Form::open(['route'=>'mail.store','method'=>'POST'])!!}

    <legend>Envianos un mensaje</legend>


     <div class="form-group">
      <label for="inputName">Nombre <strong>*</strong></label>
          {!!Form::text('name',null,['required' => 'required', 'placeholder' => 'Nombre', 'class' => 'form-control'])!!}
     </div>

     <div class="form-group">
      <label for="inputEmail">Email <strong>*</strong></label>

          {!!Form::email('email',null,['placeholder' => 'Email', 'required' => 'required', 'class' => 'form-control'])!!}
     </div>

     <div class="form-group">
      <label for="textArea">Para poder resolver tus dudas, escribe aqui tu mensaje<strong>*</strong></label>

          {!!Form::textarea('mensaje',null,['placeholder' => 'Mensaje', 'required' => 'required', 'class' => 'form-control'])!!}
          </br>

         {!! Form::submit('Enviar', array('class'=>'btn btn-primary')) !!}
     </div>
      {!!Form::close()!!}
</div>

@stop