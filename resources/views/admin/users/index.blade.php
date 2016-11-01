@extends('template.main')

@section('content')
<br />

<div class="panel panel-body">
	<table class="table table-striped">
		<thead>
			<th class="text-center">ID</th>
			<th class="text-center">Nombre</th>
			<th class="text-center">Email</th>
			<th class="text-center">Fecha de creacion</th>
			<th class="text-center">Tipo</th>
			<th class="text-center">Accion</th>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr class="text-center">
					<td><b>{{ $user->id }}</b></td>
					<td>
						<a href="{{ route('users.show', $user->id) }}" class=""> {{ $user->name }} </a>
					</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->created_at->toDateString() }}</td>	
					<td>
						@if($user->type == "professor")
							<span class="label label-primary">{{ $user->type }}</span>
						@else
							<span class="label label-default">{{ $user->type }}</span>
						@endif
					</td>
					<td class="text-center">
						<a href="{{ route('users.destroy', $user->id) }}" onclick="return confirm('Seguro desea eliminarlo?')" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> </a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

<div> 
	{!! $users->render()!!}
</div>
@endsection