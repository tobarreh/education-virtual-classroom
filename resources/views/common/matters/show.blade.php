@extends('template.main')

@section('content')
<div class=" col-md-12">
	<div class="panel panel-body ">
		<h2 class="text-center">{!! $matter->name !!}</h2>
		@foreach ($topics as $topic)
			<hr>
			
			<div class="row">
				<div class="col-md-6">
					<ul style="border-left: 3px solid {{ $topic->subject->color }}">
						<h4>{!! $topic->name !!}</h4>

						@foreach ($topic->articles as $article)
							@if ($topic->id == $article->topic_id)
								<a href="{{ route('articles.show', $article->id) }}"> 
									<ul> {!! $article->title !!} </ul>
								</a>
							@endif
						@endforeach
						
					</ul>
				</div>

				<div class="col-md-6 pull-right">
					<span>{!! $topic->description !!}</span>
				</div>
			</div>
		@endforeach	
	</div>
</div>
@endsection