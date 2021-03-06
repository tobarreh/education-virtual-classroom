@extends('template.main')

@section('title', 'Editar tema '. "<b> $topic->name </b>")

@section('content')
<div class="panel panel-body col-md-12">
	{!! Form::open(['route' => ['topics.update', $topic], 'method' => 'PUT']) !!}﻿

    <div class="form-group row">
    	<div class="col-md-2">
			{!! Form::label('name', 'Nombre') !!}
    	</div>
		<div class="col-md-4 col-md-offset-4">
			{!! Form::text('name', $topic->name, ['class' => 'form-control', 'placeholder' => 'Nombre del tema']) !!}
		</div>
	</div>

	<div class="form-group row">
    	<div class="col-md-2">
			{!! Form::label('subject_id', 'Asignatura') !!}
    	</div>
		<div class="col-md-4 col-md-offset-4">
			{!! Form::select('subject_id', $subjects, $topic->subject_id, ['class' => 'form-control select-subject', null, 'required']) !!}
		</div>
	</div>

	<div class="form-group row">
		<div class="col-md-10">
			{!! Form::label('description', 'Descripcion') !!}
		</div>
		<div class="col-md-10">
			{!! Form::textarea('description', $topic->description, ['class' => 'form-control textarea-content', 'placeholder' => 'Descripcion del tema']) !!}
		</div>
	</div>	

	<div class="form-group">
		{!! Form::submit('Actualizar', ['class' => 'btn btn-primary pull-right ']) !!}
	</div>

	{!! Form::close() !!}
</div>
@endsection

@section('js')
<script>
	$(".select-subject").chosen({
	 	no_results_text: "No hay opciones disponibles!",
	 	disable_search: true
 	});

 	$('.textarea-content').trumbowyg({

	});
</script>
@endsection