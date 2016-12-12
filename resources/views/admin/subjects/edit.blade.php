@extends('template.main')

@section('title', 'Editar asignatura: ' . "<b> $subject->name </b>")

@section('content')
<br />

<div class="panel panel-body col-md-12">
	{!! Form::open(['route' => ['subjects.update', $subject], 'method' => 'PUT']) !!}﻿

	<div class="form-group row">
    	<div class="col-md-3">
			{!! Form::label('matter_id', 'Materia') !!}
    	</div>
		<div class="col-md-2 col-md-offset-2">
			{!! Form::select('matter_id', $matters, $subject->matter_id, ['class' => 'form-control select-matter', 'required']) !!}
		</div>
	</div>
	<div class="form-group row">
    	<div class="col-md-3">
			{!! Form::label('grade_id', 'Grado') !!}
    	</div>
		<div class="col-md-2 col-md-offset-2">
			{!! Form::select('grade_id', $grades, $subject->grade_id, ['class' => 'form-control select-grade', 'required']) !!}
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
	$(".select-grade").chosen({
	 	no_results_text: "No hay opciones disponibles!",
	 	disable_search: true
 	});

	$(".select-matter").chosen({
	 	no_results_text: "No hay opciones disponibles!",
	 	disable_search: true
 	});
</script>
@endsection