@extends('template.main')

@section('content')
<div class="panel-heading pull-left">
	<a href="{{ route('articles.create') }} " class="btn btn-primary"> Nuevo articulo </a>
</div>

<div class="panel panel-body col-md-12">	
	<table class="table table-striped">
		<thead>
			<th class="text-center">ID</th>
			<th class="text-center">Titulo</th>
			<th class="text-center">Materia</th>
			<th class="text-center">Autor</th>
			<th class="text-center">Fecha de creacion</th>
			<th class="text-center">Accion</th>
		</thead>
		<tbody>
			@foreach ($articles as $article)
				<tr class="text-center">
					<td><b>{{ $article->id }}</b></td>
					<td>
						<a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
					</td>
					<td>
						<a href="{{ route('subjects.show', $article->topic->subject->id) }}">{{ $article->topic->subject->name }}</a>
					</td>
					<td>{{ $article->user->name}}</td>
					<td>{{ $article->created_at->toDateString() }}</td>
					<td>
						<a href="{{ route('articles.edit', $article->id) }}" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>

						<a href="{{ route('articles.destroy', $article->id) }}" onclick="return confirm('Seguro desea eliminarla?')" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> </a> 
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
<div>

<div>
	{!! $articles->render()!!}
</div>
@endsection