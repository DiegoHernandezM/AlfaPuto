@extends('admin.template')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-shopping-cart"></i>
                Producto <small>[Editar producto]</small>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6">

                <div class="page">

                    @if (count($errors) > 0)
                        @include('admin.partials.errors')
                    @endif
                    {!! Form::model($product, array('route' => array('admin.products.update', $product->slug))) !!}

                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label class="control-label" for="provider_id">Proveedor</label>
                            {!! Form::select('provider_id', $providers, null, ['class' => 'form-control']) !!}
                        </div>

                         <div class="form-group">
                            <label class="control-label" for="category_id">Categoria</label>
                            {!! Form::select('category_id', $category, null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
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

                        <div class="form-group">
                            <label for="extract">Extracto:</label>

                            {!!
                                Form::text(
                                    'extract',
                                    null,
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el extracto...',
                                    )
                                )
                            !!}
                        </div>

                        <div class="form-group">
                            <label for="description">Descripción:</label>

                            {!!
                                Form::textarea(
                                    'description',
                                    null,
                                    array(
                                        'class'=>'form-control'
                                    )
                                )
                            !!}
                        </div>

                        <div class="form-group">
                            <label for="price">Precio:</label>

                            {!!
                                Form::text(
                                    'price',
                                    null,
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el precio...',
                                    )
                                )
                            !!}
                        </div>

                        <div class="form-group">
                            <label for="image">Imagen:</label>

                           
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ url('admin/products') }}" class="btn btn-warning">Cancelar</a>
                    </div>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>

        <div>

        </div>

    </div>

@stop