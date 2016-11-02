@extends('admin.template')

@section('title', 'Panel Slider')

@section('content')

    <!-- Begin page content -->
    <div class="container panel-container text-center">

        <div class="page-header">
            <h1>
                <i class="fa fa-picture-o"></i>
                Sliders <a href="#0" class="btn btn-warning" data-toggle="modal" data-target="#modalSlider"><i class="fa fa-plus-circle"></i> Add Slider</a>
                
                <!--<form href="{{route('admin.category.index')}}" class="navbar-form navbar-left pull-right" role="search"  method="GET">
                    <div class="form-group">
                        <input class="form-control" name="name" type="text" placeholder="Pon el nombre">
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>-->
            </h1>
        </div>

       
        <div class="bs-example" data-example-id="media-alignment">
            <div class="media">
                <div class="media-left media-middle">
                  
                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="{{ asset('img/help.png') }}" data-holder-rendered="true" width="64" height="64">
                    
                </div>
                <div class="media-body">
                    <h3 class="media-heading">Ayuda</h3>
                    <p><h4>Gestiona las imagenes del Slider de tu tienda. Se recomienda subir imagenes con una resolución de <code>880 x 490 pixeles</code>. Tenga en cuenta que las imagenes que no cumplan con está cualidad serán modificadas.</h4></p>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalSlider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">


                {!! Form::open(['action' => 'Admin\SliderController@store', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nueva imagen para Slider</h4>
                    </div>
                    <div class="modal-body">

                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Título</label>
                                <div class="col-sm-10">
                                    <input name="title" type="text" class="form-control" id="title" placeholder="Ingresa un título" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dec" class="col-sm-2 control-label">Descripción</label>
                                <div class="col-sm-10">
                                    <textarea name="dec" class="form-control" rows="3" id="dec" placeholder="Ingresa una descripción" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-2 control-label">Imagen</label>
                                <div class="col-sm-10">
                                    {!! Form::file('img_name', ['accept' => 'image/jpg,image/png', 'id' => 'img_name', 'class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>

        <div class="panel-slider-container">

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <div class="panel-slider-container-item containerId" data-slider="{{$slider->id}}">
                            <tr>
                                <td><img src="../img/sliders/{{ $slider->img_name}}" width="60x" height="60px"></td>

                                
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->dec }}</td>

                                <td><a href="#" class="btn btn-primary">
                                        <i class="fa fa-pencil-square"></i>
                                    </a></td>
                                <td>
                                   {!! Form::open(['route' => ['admin.sliders.destroy', $slider], 'method' => 'DELETE', 'class' => 'form-slider-destroy']) !!}
                                  
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                                
                                
                                
                            </tr></div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
                    

        </div>
<!-- Modal UPDATE -->


@endsection

@section('extra-scripts')
    <script>$('header div ul li:nth-child(1) a').addClass('active-menu');</script>
    <script src=" {{ asset('js/panel-slider.js') }}"></script>
@endsection
