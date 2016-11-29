@extends('template.main')

@section('content')
<div class="panel-heading pull-left">
	<a href="{{ route('matters.create') }} " class="btn btn-primary"> Nueva materia </a>
</div>

<div class="panel panel-body col-md-12">	
	<table class="table table-striped">
		<thead class="text-center">
			<th class="text-center">ID</th>
			<th class="text-center">Nombre</th>
			<th class="text-center">Categoria</th>
			<th class="text-center">Asignaturas</th>
			<th class="text-center">Fecha de creacion</th>
			<th class="text-center">Accion</th>
		</thead>
		<tbody>
			@foreach ($matters as $matter)
				<tr class="text-center">
					<td><b>{{ $matter->id }}</b></td>
					<td>
						<a href="{{ route('matters.show', $matter->id) }}">{{ $matter->name }}</a>
					</td>
					<td>{{ $matter->category->name }}</td>
					<td>{{ $matter->n_subjects }}</td>
					<td>{{ $matter->created_at->toDateString() }}</td>
					<td>
						<a href="{{ route('matters.edit', $matter->id) }}" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

						<a href="{{ route('matters.destroy', $matter->id) }}" onclick="return confirm('Seguro desea eliminarla?')" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> </a> 
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
<div>

<div> 
	{!! $matters->render()!!}
</div>
@endsection