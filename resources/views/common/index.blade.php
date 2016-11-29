@extends('template.main')

@section('content')
<div  class="col-md-12">
	<!-- Carousel -->
	<div id="carousel-generic" class="carousel slide" data-ride="carousel">
	  	<!-- Indicators -->
	  	<ol class="carousel-indicators">
	    	<li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
	    	<li data-target="#carousel-generic" data-slide-to="1"></li>
	    	<li data-target="#carousel-generic" data-slide-to="2"></li>
	  	</ol>

	  	<!-- Wrapper for slides -->
 		<div class="carousel-inner" role="listbox">
		    <div class="item active" align="center">
		      <img src="https://cdn.kastatic.org/ka-mobile/featured-content-images/v3/antibiotics1168x342.jpg" alt="...">
		      <div class="carousel-caption">
		        <h3>Biologia</h3>
		        <p>Descubre todo sobre Biologia</p>
		        <a href="{{ route('matters.show', '6') }}">
		        	<p><b> Leer mas > </b></p>
        		</a>
		        <br />
		      </div>
		    </div>

		    <div class="item" align="center">
		      <img src="https://cdn.kastatic.org/ka-mobile/featured-content-images/v3/aztec_sun_stone1168x342.jpg" alt="...">
		      <div class="carousel-caption">
		        <h3>Historia</h3>
		        <p>Descubre todo sobre Historia</p>
		        <a href="{{ route('matters.show', '7') }}">
		        	<p><b> Leer mas > </b></p>
	        	</a>
		        <br />
		      </div>
		    </div>

		    <div class="item" align="center">
		      <img src="https://cdn.kastatic.org/ka-mobile/featured-content-images/v3/nebula1168x342.jpg" alt="...">
		      <div class="carousel-caption">
		        <h3>Universo</h3>
		        <p>Descubre todo sobre el Universo</p>
		        <p><b> Leer mas > </b></p>
		        <br />
		      </div>
		    </div>
	  	</div>

	  	<!-- Controls -->
	  	<a class="left carousel-control" href="#carousel-generic" role="button" data-slide="prev">
	    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    	<span class="sr-only">Previous</span>
	  	</a>
	  	<a class="right carousel-control" href="#carousel-generic" role="button" data-slide="next">
	    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    	<span class="sr-only">Next</span>
	  	</a>
	</div>
	<br />
	<!-- End carousel -->

	<!-- Matters -->
	@foreach ($categories as $category)
		<div  class="col-md-12">
				<h4>{!! $category->name !!}</h4>
				
				@foreach ($matters as $matter)					
					@if ($matter->category_id == $category->id)
						<div class="col-md-2">
							<a href="{{ route('matters.show', $matter->id) }}">
								
								<div class="thumbnail text-center">
							      <img src="{{ asset("images/matters/$matter->image") }}" alt="...">
							        <div class="title-matter">{!! $matter->name !!}</div>
							    </div>
							</a>
						</div>
					@endif
				@endforeach
		</div>
	@endforeach
</div>
@endsection

@section('js')
	<script>

	</script>
@endsection