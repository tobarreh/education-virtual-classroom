@extends('template.main')

@section('content')
	<br />

	<div class="panel-heading pull-left">
		<a href="{{ route('categories.create') }} " class="btn btn-primary"> Nueva categoria </a>
	</div>

    <div class="panel panel-body col-md-12">	
		<table class="table table-striped">
			<thead>
				<th class="text-center">ID</th>
				<th class="text-center">Nombre</th>
				<th class="text-center">Materias</th>
				<th class="text-center">Fecha de creacion</th>
				<th class="text-center">Accion</th>
			</thead>
			<tbody>
				@foreach ($categories as $category)
					<tr class="text-center">
						<td><b>{{ $category->id }}</b></td>
						<td>{{ $category->name }}</td>
						<td>{{ $category->n_subjects }}</td>
						<td>{{ $category->created_at->toDateString() }}</td>
						<td>
							<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>

							<a href="{{ route('categories.destroy', $category->id) }}" onclick="return confirm('Seguro desea eliminarla?')" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> </a> 
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	<div>
	
	<div> 
		{!! $categories->render()!!}
	</div>
@endsection