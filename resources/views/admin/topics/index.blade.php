@extends('template.main')

@section('content')
<div class="panel-heading pull-left">
	<a href="{{ route('topics.create') }} " class="btn btn-primary"> Nuevo tema </a>
</div>

<div class="panel panel-body col-md-12">	
	<table class="table table-striped">
		<thead class="text-center">
			<th class="text-center">ID</th>
			<th class="text-center">Nombre</th>
			<th class="text-center">Asignatura</th>
			<th class="text-center">Articulos</th>
			<th class="text-center">Fecha de creacion</th>
			<th class="text-center">Accion</th>
		</thead>
		<tbody>
			@foreach ($topics as $topic)
				<tr class="text-center">
					<td><b>{{ $topic->id }}</b></td>
					<td>{{ $topic->name }}</td>
					<td>{{ $topic->subject->name }}</td>
					<td>{{ $topic->n_articles }}</td>
					<td>{{ $topic->created_at->toDateString() }}</td>
					<td>
						<a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>

						<a href="{{ route('topics.destroy', $topic->id) }}" onclick="return confirm('Seguro desea eliminarlo?')" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> </a> 
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
<div>

<div> 
	{!! $topics->render()!!}
</div>
@endsection