@extends('template.main')

@section('content')
<div class="panel-heading pull-left">
	<a href="{{ route('subjects.create') }} " class="btn btn-primary"> Nueva asignatura </a>
</div>

<div class="panel panel-body col-md-12">	
	<table class="table table-striped">
		<thead class="text-center">
			<th class="text-center">ID</th>
			<th class="text-center">Materia</th>
			<th class="text-center">Grado</th>
			<th class="text-center">Temas</th>
			<th class="text-center">Fecha de creacion</th>
			<th class="text-center">Accion</th>
		</thead>
		<tbody>
			@foreach ($subjects as $subject)
				<tr class="text-center">
					<td><b>{{ $subject->id }}</b></td>
					<td>
						<a href="{{ route('matters.show', $subject->matter->id) }}">{{ $subject->matter->name }}</a>
					</td>
					<td>
						<a href="{{ route('grades.show', $subject->grade->id) }}">{{ $subject->grade->name }}</a>
					</td>
					<td>{{ $subject->n_topics }}</td>
					<td>{{ $subject->created_at->toDateString() }}</td>
					<td>
						<a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

						<a href="{{ route('subjects.destroy', $subject->id) }}" onclick="return confirm('Seguro desea eliminarla?')" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> </a> 
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
<div>

<div> 
	{!! $subjects->render()!!}
</div>
@endsection