@extends('template.main')

@section('content')

@if ($me->id != $user->id and $me->type == 'admin')
	<div class="panel-heading pull-right">
		<a href="{{ route('users.edit', $user->id) }} " class="btn btn-default">
			<span class="glyphicon glyphicon-pencil"></span>   
			Editar  
	 	</a>
	</div>
@else
	<br />
@endif

<div class="col-md-12">
	<div class="panel panel-body">
		<div class="row">
			<div class="col-md-12">
				<h4>Informacion general</h4>
				<hr>
			</div>	
		</div>
		
		<div class="col-md-12">
			<div class="col-md-10">					
				<p><span class="glyphicon glyphicon-gift"> {{ $user->birth_date }} </span></p>
				<p><span class="glyphicon glyphicon-envelope"> {{ $user->email }} </span></p>
				<p><span class="glyphicon glyphicon-phone"> {{ $user->cell_phone }} </span></p>
				<p><span class="glyphicon glyphicon-home"> {{ $user->city }} </span></p>
				<br />
				<p><span class="glyphicon"> Sobre mi </span></p>
				<div class="col-md-12">
					@if (empty($user->about_me))
						<p>No hay informacion</p>
					@else
						<p> {{ $user->about_me }} </p>
					@endif
				</div>	
			</div>
			
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="panel panel-body">
		<h4>Social</h4>
		<hr>
			
		<div>
			@if (empty($user->twitter) and empty($user->facebook) and empty($user->linkedIn) and empty($user->youtube))
				<div class="col-md-12">
					<p>No hay redes sociales</p>
				</div>
			@else
				<ul>
					@if (!empty($user->twitter))
						<li class="social-media-item">
							<a class="social-media-link" href="{{ $user->twitter }}">
								<img class="social-media-icon" src="{{ asset("images/social/twitter.png") }}">		
							</a>
						</li>
					@endif

					@if (!empty($user->facebook))
						<li class="social-media-item">
							<a class="social-media-link" href="{{ $user->facebook }}">
								<img class="social-media-icon" src="{{ asset("images/social/facebook.png") }}">		
							</a>
						</li>
					@endif

					@if (!empty($user->linkedIn))
						<li class="social-media-item">
							<a class="social-media-link" href="{{ $user->linkedIn }}">
								<img class="social-media-icon" src="{{ asset("images/social/linkedIn.png") }}">
							</a>	
						</li>
					@endif

					@if (!empty($user->youtube))
						<li class="social-media-item">
							<a class="social-media-link" href="{{ $user->youtube }}">
								<img class="social-media-icon" src="{{ asset("images/social/youtube.png") }}">
							</a>	
						</li>
					@endif
				</ul>
			@endif
		</div>
	</div>
</div>
@endsection