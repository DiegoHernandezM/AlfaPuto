@extends('admin.template')

@section('content')

<div class="container text-center">
	<div class="page-header">
		<h1>Proveedores 
		<a href="{{ url('admin/providers/create')}}" class="btn btn-warning"><i class="fa fa-plus-circle"></i>&nbsp;Agregar proveedor</a>
            <form href="{{route('admin.providers.index')}}" class="navbar-form navbar-left pull-right" role="search"  method="GET">
                <div class="form-group">
                    <input class="form-control" name="name" type="text" placeholder="Pon el nombre">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
		</h1>
	</div>
	<div class="page">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Contacto</th>
					<th>RFC</th>
					<th>Telefono</th>
					<th>Celular</th>
					<th>Email</th>
					<th>Dirección</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($provider as $providers): ?>
				<tr>
					<td>{{ $providers-> name}}</td>
					<td>{{ $providers-> contact}}</td>
					<td>{{ $providers-> RFC}}</td>
					<td>{{ $providers-> telefono}}</td>
					<td>{{ $providers-> celular}}</td>
					<td>{{ $providers-> email}}</td>
					<td>{{ $providers-> direccion}}</td>
					<td>
						<a href="{{ route('admin.providers.edit', $providers) }}" class="btn btn-primary"><i class="fa fa-pencil-square"></i></a>
					</td>
					<td>
						{!! Form::open(['route' => ['admin.providers.destroy', $providers]]) !!}
        								<input type="hidden" name="_method" value="DELETE">
        								<button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
        									<i class="fa fa-trash-o"></i>
        								</button>
        							{!! Form::close() !!}
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>

	</div>
	</div>
</div>



@stop