@extends('template.main')

@section('title', 'Nueva Materia')

@section('content')
<div class="panel panel-body col-md-12">
	{!! Form::open(['route' => 'matters.store', 'method' => 'POST', 'files' => true]) !!}

    <div class="form-group row">
    	<div class="col-md-3">
			{!! Form::label('name', 'Nombre') !!}
    	</div>
		<div class="col-md-4">
			{!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de la materia']) !!}
		</div>
	</div>
	<div class="form-group row">
    	<div class="col-md-3">
			{!! Form::label('category_id', 'Categoria') !!}
    	</div>
		<div class="col-md-2 col-md-offset-2">
			{!! Form::select('category_id', $categories, null, ['class' => 'form-control select-category', 'required']) !!}
		</div>
	</div>
	<div class="form-group row">
    	<div class="col-md-3">
			{!! Form::label('image', 'Imagen') !!}
    	</div>
		<div class="col-md-4">
			{!! Form::file('image') !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::submit('Crear', ['class' => 'btn btn-primary pull-right ']) !!}
	</div>

	{!! Form::close() !!}
</div>
@endsection

@section('js')
<script>
	$(".select-category").chosen({
	 	no_results_text: "No hay opciones disponibles!",
	 	disable_search: true
 	});
</script>
@endsection