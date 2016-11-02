@extends('admin.template')

@section('content')
	
	<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i>
				Sliders <small>[Gestiona los sliders de tu E-Commerce]</small>
			</h1>
		</div>

		<div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    
                    
                    {!! Form::open(['action' => 'Admin\SliderController@store', 'method'=>'POST', 'files'=>true]) !!}
        
                        <div class="form-group">
                            <label for="name">Subir imagen:</label>
                            
                            {!! Form::file('', array('class'=>'form-control'))!!}
                        </div>

                        <div class="form-group">
                            <label for="name">Titulo de la imagen:</label>
                            
                            {!! 
                                Form::text('title', null, array('class'=>'form-control','placeholder' => 'Ingresa el titulo...',    'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Descripción:</label>
                            
                            {!! 
                                Form::textarea(
                                    'dec', 
                                    null, 
                                    array(
                                        'class'=>'form-control'
                                    )
                                ) 
                            !!}
                        </div>
                        
                        
                        
                        <div class="form-group">
                            {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ url('admin/sliders') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>
        </div>
        

	</div>

@stop