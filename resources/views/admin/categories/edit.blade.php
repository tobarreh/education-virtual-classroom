@extends('template.main')

@section('title', 'Editar categoria: ' . "<b> $category->name </b>")

@section('content')
<div class="panel panel-body col-md-12">
	{!! Form::open(['route' => ['categories.update', $category], 'method' => 'PUT', 'files' => true]) !!}﻿
	    <div class="form-group row">
	    	<div class="col-md-3">
				{!! Form::label('name', 'Nombre') !!}
	    	</div>
			<div class="col-md-4">
				{!! Form::text('name', $category->name, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre de la categoria']) !!}
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