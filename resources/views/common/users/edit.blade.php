@extends('template.main')

@section('content')
<br />
<div class="col-md-12 ">
	<div class="panel panel-body">
		{!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT']) !!}﻿
			<h4>Informacion general</h4>
			<hr>

			@if ($me->type == 'admin')
				<div class="form-group row">
					<div class="col-md-12">
						<div class="col-md-6">
							{!! Form::label('type', 'Usuario') !!}
						</div>
						<div class="col-md-2 col-md-offset-2">	
							{!! Form::select('type', ['admin' => 'Administrador', 'professor' => 'Profesor', 'student' => 'Estudiante'], $user->type, ['class' => 'form-control select-user-type']) !!}
						</div>						
					</div>
				</div>
			@endif
				
				<div class="form-group row">
					<div class="col-md-12">
						@if ($me->id == $user->id)	
							<div class="col-md-6">
								{!! Form::label('name', 'Nombre') !!}
							</div>

							<div class="col-md-4">	
									{!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre completo']) !!}	
							</div>
						@else
							<div class="col-md-12">
								<h4>{{ $user->name }}</h4>
							</div>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-12">	
						@if ($me->id == $user->id)
							<div class="col-md-6">
								{!! Form::label('birth_date', 'Fecha de nacimiento') !!}
							</div>

							<div class="col-md-2 col-md-offset-2">
								{!! Form::date('birth_date', $user->birth_date, ['id' => 'birth_date', 'class' => 'form-control', 'placeholder' => 'yyyy-mm-dd']) !!}	
							</div>
						@else
							<div class="col-md-12">
								<p><span class="glyphicon glyphicon-gift"> {{ $user->birth_date }} </span></p>
							</div>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-12">
						@if ($me->id == $user->id)
							<div class="col-md-6">
								{!! Form::label('email', 'Email') !!}
							</div>

							<div class="col-md-4"> 	
								{!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@mail.com']) !!}
							</div>
						@else
							<div class="col-md-12">
								<p><span class="glyphicon glyphicon-envelope"> {{ $user->email }} </span></p>
							</div>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-12">
						@if ($me->id == $user->id)
							<div class="col-md-6">
								{!! Form::label('cell_phone', 'Telefono celular') !!}
							</div>

							<div class="col-md-4">	
								{!! Form::text('cell_phone', $user->cell_phone, ['class' => 'form-control', 'placeholder' => '+598 091234567']) !!}
							</div>
						@else
							<div class="col-md-12">
								<p><span class="glyphicon glyphicon-phone"> {{ $user->cell_phone }} </span></p>
							</div>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-12">
						@if ($me->id == $user->id)
							<div class="col-md-6">
								{!! Form::label('city', 'Ciudad') !!}
							</div>

							<div class="form-group col-md-4"> 
								{!! Form::text('city', $user->city, ['class' => 'form-control', 'placeholder' => 'Montevideo']) !!}
							</div>
						@else
							<div class="col-md-12">
								<p><span class="glyphicon glyphicon-home"> {{ $user->city }} </span></p>
							</div>
						@endif
					</div>
				</div>
			
				<div class="form-group row">
					<div class="col-md-10">
						<div class="col-md-12">
							{!! Form::label('about_me', 'Sobre mi') !!}
						</div>

						<div class="col-md-12"> 
							@if ($me->id == $user->id)
								{!! Form::textarea('about_me', $user->about_me, ['class' => 'form-control textarea-limited', 'placeholder' => 'Escribe algo sobre ti...']) !!}
							@else
								<div class="col-md-12">
									@if (empty($user->about_me))
										<p>No hay informacion</p>
									@else
										<p>{{ $user->about_me }}</p>
									@endif
								</div>
							@endif	
						</div>
					</div>
				</div>
				<br />
			
			@if ($me->id == $user->id)
				<h4>Social</h4>
				<hr>

				<div class="col-md-10">
					<div class="form-group row">
					  	<ul class="nav nav-tabs" role="tablist">
					    	<li role="presentation" class="active social-media-item">
					    		<a class="social-media-link" style="padding: 0px;" href="#twitter" aria-controls="twitter" role="tab" data-toggle="tab">
					    			<img class="social-media-icon" src="{{ asset("images/social/twitter.png") }}">
					    		</a>
				    		</li>
				    		<li role="presentation" class="social-media-item">
					    		<a class="social-media-link" style="padding: 0px;" href="#facebook" aria-controls="facebook" role="tab" data-toggle="tab">
					    			<img class="social-media-icon" src="{{ asset("images/social/facebook.png") }}">
					    		</a>
				    		</li>
						    <li role="presentation" class="social-media-item">
						    	<a class="social-media-link" style="padding: 0px;" href="#linkedIn" aria-controls="linkedIn" role="tab" data-toggle="tab">
						    		<img class="social-media-icon" src="{{ asset("images/social/linkedIn.png") }}">
						    	</a>
					    	</li>
						    <li role="presentation" class="social-media-item">
						    	<a class="social-media-link" style="padding: 0px;" href="#youtube" aria-controls="youtube" role="tab" data-toggle="tab">
						    		<img class="social-media-icon" src="{{ asset("images/social/youtube.png") }}">		
						    	</a>
					    	</li>
					  	</ul>

					  	<div class="tab-content">
						    <div role="tabpanel" class="tab-pane active" id="twitter">
						    	<div class="form-group row">
								    	<div class="col-md-12">
								    		{!! Form::text('twitter', $user->twitter, ['class' => 'form-control', 'placeholder' => 'URL']) !!}
								    	</div>
								</div>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="facebook">
						    	<div class="form-group row">
								    	<div class="col-md-12">
								    		{!! Form::text('facebook', $user->facebook, ['class' => 'form-control', 'placeholder' => 'URL']) !!}
								    	</div>
								</div>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="linkedIn">
						    	<div class="form-group row">
							    	<div class="col-md-12">	
								    	{!! Form::text('linkedIn', $user->linkedIn, ['class' => 'form-control', 'placeholder' => 'URL']) !!}
									</div>
								</div>
						    </div>
						    <div role="tabpanel" class="tab-pane" id="youtube">
						    	<div class="form-group row">
							    	<div class="col-md-12">    	
								    	{!! Form::text('youtube', $user->youtube, ['class' => 'form-control', 'placeholder' => 'URL']) !!}
									</div>
								</div>
						    </div>
					  	</div>
					</div>
				</div>
			@endif

			<div class="col-md-12">
				{!! Form::submit('Actualizar', ['class' => 'btn btn-primary pull-right']) !!}
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection

@section('js')
<script>
	$(".select-user-type").chosen({
	 	no_results_text: "No hay opciones disponibles!",
	 	disable_search: true
 	});
</script>
@endsection 