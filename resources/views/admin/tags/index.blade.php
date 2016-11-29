@extends('template.main')

@section('content')
<div class="panel-heading pull-left">
	<a href="{{ route('tags.create') }}" class="btn btn-primary"> Nuevo tag </a>
</div>

<div class="panel panel-body col-md-12">	
	<table class="table table-striped">
		<thead>
			<th class="text-center">ID</th>
			<th class="text-center">Nombre</th>
			<th class="text-center">Utilizado</th>
			<th class="text-center">Accion</th>
		</thead>
		<tbody>
			@foreach ($tags as $tag)
				<tr class="text-center">
					<td><b>{{ $tag->id }}</b></td>
					<td>{{ $tag->name }}</td>
					<td>{{ $tag->n_articles }}</td>
					<td>
						<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>

						<a href="{{ route('tags.destroy', $tag->id) }}" onclick="return confirm('Seguro desea eliminarlo?')" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> </a> 
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<div> 
	{!! $tags->render()!!}
</div>
@endsection