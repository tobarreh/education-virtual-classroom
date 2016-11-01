@extends('template.main')

@section('title', 'Editar materia: ' . "<b> $subject->name </b>")

@section('content')
<div class="panel panel-body col-md-12">
	{!! Form::open(['route' => ['subjects.update', $subject], 'method' => 'PUT', 'files' => true]) !!}﻿

    <div class="form-group row">
    	<div class="col-md-3">
			{!! Form::label('name', 'Nombre') !!}
    	</div>
		<div class="col-md-4">
			{!! Form::text('name', $subject->name, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de la materia']) !!}
		</div>
	</div>
	<div class="form-group row">
    	<div class="col-md-3">
			{!! Form::label('category_id', 'Categoria') !!}
    	</div>
		<div class="col-md-2 col-md-offset-2">
			{!! Form::select('category_id', $categories, $subject->category_id, ['class' => 'form-control select-category', 'required']) !!}
		</div>
	</div>
	<div class="form-group row">
    	<div class="col-md-3">
			{!! Form::label('image', 'Imagen') !!}
    	</div>
		<div class="col-md-8">
			@if( !empty($subject->image) )
				<div class="thumbnail col-md-3">
	      			<img src="{{ asset("images/subjects/$subject->image") }}" alt="{{ $subject->name }} image">
	    		</div>
  			@endif
		</div>
		<div class="col-md-8 col-md-offset-3">
			
			{!! Form::file('image') !!}
		</div>
	</div>
	
	<!-- Topics conteiner -->
	
	<!-- end topics conteiner -->

	<div class="form-group">
		{!! Form::submit('Actualizar', ['class' => 'btn btn-primary pull-right ']) !!}
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