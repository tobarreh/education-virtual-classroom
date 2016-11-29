@extends('template.main')

@section('content')
<br />

<div class="panel panel-body col-md-12">	
	<table class="table table-striped">
		<thead>
			<th class="text-center">ID</th>
			<th class="text-center">Titulo</th>
			<th class="text-center">Tema</th>
			<th class="text-center">Autor</th>
			<th class="text-center">Visto</th>
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
						{{ $article->topic->name }}
					</td>
					<td>
						<a href="{{ route('users.show', $article->user->id) }}">{{ $article->user->name}}
					</td>
					<td>{{ $article->seen }}</td>
					<td>{{ $article->created_at->format('d-m-Y') }}</td>
					<td>
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