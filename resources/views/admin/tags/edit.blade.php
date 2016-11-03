@extends('template.main')

@section('title', 'Editar tag: ' . "<b> $tag->name </b>")

@section('content')
<div class="panel panel-body col-md-12">
	{!! Form::open(['route' => ['tags.update', $tag], 'method' => 'PUT', 'files' => true]) !!}﻿


    <div class="form-group row">
    	<div class="col-md-3">
			{!! Form::label('name', 'Nombre') !!}
    	</div>
		<div class="col-md-4">
			{!! Form::text('name', $tag->name, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre del tag']) !!}
		</div>
	</div>

	<div class="form-group">
		{!! Form::submit('Actualizar', ['class' => 'btn btn-primary pull-right ']) !!}
	</div>

	{!! Form::close() !!}
</div>
@endsection

@section('js')

@endsection