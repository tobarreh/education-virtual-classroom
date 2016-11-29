@extends('template.main')

@section('content')
<div class="panel-heading pull-left">
	<a href="{{ route('grades.create') }} " class="btn btn-primary"> Nuevo grado </a>
</div>

<div class="panel panel-body col-md-12">	
	<table class="table table-striped">
		<thead class="text-center">
			<th class="text-center">ID</th>
			<th class="text-center">Nombre</th>
			<th class="text-center">Asignaturas</th>
			<th class="text-center">Fecha de creacion</th>
			<th class="text-center">Accion</th>
		</thead>
		<tbody>
			@foreach ($grades as $grade)
				<tr class="text-center">
					<td><b>{{ $grade->id }}</b></td>
					<td>
						<a href="{{ route('grades.show', $grade->id) }}">{{ $grade->name }}</a>
					</td>
					<td>{{ $grade->n_subjects }}</td>
					<td>{{ $grade->created_at->toDateString() }}</td>
					<td>
						<a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

						<a href="{{ route('grades.destroy', $grade->id) }}" onclick="return confirm('Seguro desea eliminarlo?')" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> </a> 
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
<div>

<div> 
	{!! $grades->render()!!}
</div>
@endsection