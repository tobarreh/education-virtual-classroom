<!DOCTYPE html>
<html land="es">
<head>
	<main charset="UTF=8">
	<title>{{ Auth::user()->type }} | @yield('title', '')</title>
	
	<link rel="stylesheet" href="{{ asset('css/general.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css')}}">
</head>
<body>
	<!-- profile -->		
	@include('template.partials.profile')

	<!-- nav -->
	@include('template.partials.nav')

	<!-- container -->		
	<section class="container">
		<!-- error notifications -->				
		@if (session()->has('flash_notification.message'))
			<div class="col-md-12">
				<br />
			    <div class="alert alert-{{ session('flash_notification.level') }}">
			        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			        {!! session('flash_notification.message') !!}
			    </div>
			</div>
		@endif

		@include('template.partials.errors')

		@yield('title', '')

		@yield('content')
	</section>

	<script src="{{ asset('plugins/jquery/js/jquery-2.1.4.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
	<script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>

	@yield('js')
</body>
</html>