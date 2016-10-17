@extends('admin.template')

@section('content')
    
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-shopping-cart"></i>
                Provedoores <small>[Editar proveedor]</small>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    
                    
                     

                     

                     {!! Form::model($providers, ['url' => ['admin/providers/update', $providers]]) !!}

                      <input type="hidden" name="_method" value="PUT">
        
                        <div class="form-horizontal">
                            <label for="name">Nombre:</label>
                            
                            {!! 
                                Form::text(
                                    'name', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el nombre...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div>
                             <label for="description">Contacto:</label>
                            
                           {!! Form::text('contact', null, array('class'=>'form-control'))!!}
                        </div>
                        
                          <div class="form-group">
                            <label for="description">RFC:</label>
                            
                            {!! Form::text('RFC', null, array('class'=>'form-control'))!!}
                        </div>
                        
                          <div class="form-group">
                            <label for="description">Telefono:</label>
                            
                            {!! Form::text('telefono', null, array('class'=>'form-control'))!!}
                        </div>
                        
                          <div class="form-group">
                            <label for="description">Celular:</label>
                            
                            {!! Form::text('celular', null, array('class'=>'form-control'))!!}
                        </div>
                        
                          <div class="form-group">
                            <label for="description">Email:</label>
                            
                            {!! Form::text('email', null, array('class'=>'form-control'))!!}
                        </div>
                        
                          <div class="form-group">
                            <label for="description">Dirección:</label>
                            
                            {!! Form::text('direccion', null, array('class'=>'form-control'))!!}
                        </div>
                        
                        
                        
                        <div class="form-group">
                            {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ url('admin/providers/index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>
        </div>
        
        <div>
            
        </div>

    </div>

@stop