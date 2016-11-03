@extends('template.main')

@section('title', 'Editar articulo ' . "<b> $article->title </b>")

@section('content')
<div class="panel panel-body col-md-12">	
	{!! Form::open(['route' => ['articles.update', $article], 'method' => 'PUT']) !!}﻿

		<div class="form-group row">
			<div class="col-md-3">
				{!! Form::label('title', 'Titulo') !!}
			</div>
			<div class="col-md-4">
				{!! Form::text('title', $article->title, ['class' => 'form-control', 'placeholder' => 'Titulo del articulo']) !!}
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-3">
				{!! Form::label('subject_id', 'Materia') !!}
			</div>
			<div class="col-md-2 col-md-offset-2">
				{!! Form::select('subject_id', $subjects, $article->topic->subject->id, ['class' => 'form-control select-subject', null, 'required']) !!}
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-3">
				{!! Form::label('topic_id', 'Tema') !!}
			</div>
			<div class="col-md-2 col-md-offset-2">
				{!! Form::select('topic_id', $topics, $article->topic_id, ['class' => 'form-control select-topic', null, 'required']) !!}
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-10">
				{!! Form::label('content', 'Contenido') !!}
			</div>
			<div class="col-md-10">
				{!! Form::textarea('content', $article->content, ['class' => 'form-control textarea-content', 'placeholder' => 'Escriba aqui el contenido del articulo']) !!}
			</div>
		</div>

		<div class="form-group row">
			<div class="col-md-3">
				{!! Form::label('tags', 'Tags') !!}
			</div>
			<div class="col-md-7">
				{!! Form::select('tags[]', $tags, $article_tags, ['class' => 'form-control select-tag', 'multiple', 'required']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::submit('Actualizar', ['class' => 'btn btn-primary pull-right']) !!}
		</div>

	{!! Form::close() !!}
</div>
@endsection

@section('js')
<script>
	$(".select-subject").chosen({
	 	no_results_text: 'No hay opciones disponibles!',
	 	disable_search: true
 	});

 	$(".select-topic").chosen({
	 	no_results_text: 'No hay opciones disponibles!',
	 	disable_search: true
 	});

	$('.textarea-content').trumbowyg({

	});
	  
	$(".select-tag").chosen({
	 	placeholder_text_multiple: 'Seleccione algun tag',
	 	no_results_text: 'No hay opciones disponibles!'
 	});
</script>
@endsection