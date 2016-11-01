@extends('template.main')

@section('content')
<div class="panel-heading pull-left">
	<a href="{{ route('subjects.create') }} " class="btn btn-primary"> Nueva materia </a>
</div>

<div class="panel panel-body col-md-12">	
	<table class="table table-striped">
		<thead class="text-center">
			<th class="text-center">ID</th>
			<th class="text-center">Nombre</th>
			<th class="text-center">Categoria</th>
			<th class="text-center">Articulos</th>
			<th class="text-center">Fecha de creacion</th>
			<th class="text-center">Accion</th>
		</thead>
		<tbody>
			@foreach ($subjects as $subject)
				<tr class="text-center">
					<td><b>{{ $subject->id }}</b></td>
					<td>
						<a href="{{ route('subjects.show', $subject->id) }}">{{ $subject->name }}</a>
					</td>
					<td>{{ $subject->category->name }}</td>
					<td><span class="badge">{{ $subject->n_articles }}</span></td>
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