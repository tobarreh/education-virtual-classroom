@extends('template.main')

@section('title', 'Nueva Categoria')

@section('content')
<div class="panel panel-body col-md-12">
	{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
	    <div class="form-group row">
	    	<div class="col-md-3">
				{!! Form::label('name', 'Nombre') !!}
	    	</div>
			<div class="col-md-4">
				{!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de la categoria']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::submit('Crear', ['class' => 'btn btn-primary pull-right ']) !!}
		</div>
	{!! Form::close() !!}
</div>
@endsection

@section('js')

@endsection