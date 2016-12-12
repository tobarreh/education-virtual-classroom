@extends('template.main')

@section('title', 'Nuevo tema')

@section('content')
<div class="panel panel-body col-md-12">
	{!! Form::open(['route' => 'topics.store', 'method' => 'POST']) !!}

    <div class="form-group row">
    	<div class="col-md-2">
			{!! Form::label('name', 'Nombre') !!}
    	</div>
		<div class="col-md-4 col-md-offset-4">
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del tema']) !!}
		</div>
	</div>

	<div class="form-group row">
    	<div class="col-md-2">
			{!! Form::label('subject_id', 'Asignatura') !!}
    	</div>
		<div class="col-md-4 col-md-offset-4">
			{!! Form::select('subject_id', $subjects, null, ['class' => 'form-control selector', null, 'required']) !!}
		</div>
	</div>

	<div class="form-group row">
		<div class="col-md-10">
			{!! Form::label('description', 'Descripcion') !!}
		</div>
		<div class="col-md-10">
			{!! Form::textarea('description', null, ['class' => 'form-control textarea-content', 'placeholder' => 'Descripcion del tema']) !!}
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
	$(".selector").chosen({
	 	no_results_text: "No hay opciones disponibles!",
	 	disable_search: true
 	});

 	$('.textarea-content').trumbowyg({

	});
</script>
@endsection