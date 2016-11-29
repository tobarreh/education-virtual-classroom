@extends('template.main')

@section('title', 'Nuevo articulo')

@section('content')
<div class="panel panel-body col-md-12">	
	{!! Form::open(['route' => 'articles.store', 'method' => 'POST']) !!}

		<div class="form-group row">
			<div class="col-md-3">
				{!! Form::label('title', 'Titulo') !!}
			</div>
			<div class="col-md-4 col-md-offset-3">
				{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Titulo del articulo']) !!}
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-3">
				{!! Form::label('matter_id', 'Materia') !!}
			</div>
			<div class="col-md-2 col-md-offset-5">
				{!! Form::select('matter_id', $matters, null, ['id' => 'subject', 'class' => 'form-control selector', null, 'required']) !!}
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-3">
				{!! Form::label('topic_id', 'Tema') !!}
			</div>
			<div class="col-md-2 col-md-offset-5">
				{!! Form::select('topic_id', $topics, null, ['id' => 'topic', 'class' => 'form-control selector', null, 'required']) !!}
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-10">
				{!! Form::label('content', 'Contenido') !!}
			</div>
			<div class="col-md-10">
				{!! Form::textarea('content', null, ['class' => 'form-control textarea-content', 'placeholder' => 'Escriba aqui el contenido del articulo']) !!}
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-1">
				<img src="{{ asset("images/tools/geogebra.png") }}" alt="image">
			</div>
			<div class="col-md-7 col-md-offset-2">
				{!! Form::text('tool', null, ['class' => 'form-control', 'placeholder' => 'URL']) !!}
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-3">
				{!! Form::label('tags', 'Tags') !!}
			</div>
			<div class="col-md-7">
				{!! Form::select('tags[]', $tags, null, ['class' => 'form-control select-tag', 'multiple', '']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::submit('Crear', ['class' => 'btn btn-primary pull-right']) !!}
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

	/*$('#subject').on('change',function(e){
		console.log(e);

		var subject_id = e.target.value;

		//ajax
		$.get('/topics?subject_id' + subject_id, function(data){
			//success data
			console.log(data);
		})
	});*/
	
	$('.textarea-content').trumbowyg({

	});
	  
	$(".select-tag").chosen({
	 	placeholder_text_multiple: 'Seleccione algun tag',
	 	no_results_text: 'No hay tags!'
 	});
</script>
@endsection