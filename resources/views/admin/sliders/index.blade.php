@extends('admin.template')

@section('content')

	<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-picture-o"></i>
				Sliders <a href="{{ route('admin.sliders.panel-slider') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Add Slider</a>
                <!--<form href="{{route('admin.category.index')}}" class="navbar-form navbar-left pull-right" role="search"  method="GET">
                    <div class="form-group">
                        <input class="form-control" name="name" type="text" placeholder="Pon el nombre">
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>-->
			</h1>
		</div>
		<div class="page">
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
							<tr>
								<td><img src="../img/sliders/{{ $slider->img_name}}" width="60x" height="60px"></td>

								
								<td>{{ $slider->title }}</td>
								<td>{{ $slider->dec }}</td>

								<td><a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-primary">
										<i class="fa fa-pencil-square"></i>
									</a></td>
								<td>
									{!! Form::open(['route' => ['admin.sliders.destroy', $slider]]) !!}
        								<input type="hidden" name="_method" value="DELETE">
        								<button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
        									<i class="fa fa-trash-o"></i>
        								</button>
        							{!! Form::close() !!}
								</td>
								
								
								
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
@stop