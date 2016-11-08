@extends('template.main')

@section('content')
<div class=" col-md-12">
	<div class="panel panel-body ">
		<h2 class="text-center">{{ $subject->name }}</h2>
		@foreach ($subject->topics as $topic)
				<hr>

				<ul>
					<h4>{{ $topic->name }}</h4>

					@foreach ($topic->articles as $article)
						@if ($topic->id == $article->topic_id)
							<div class="row">
								<div class="col-md-4">
									<a href="{{ route('articles.show', $article->id) }}"> 
										<ul> {{ $article->title }} </ul>
									</a>
								</div>
							</div>
						@endif
					@endforeach						
				</ul>
		@endforeach	
	</div>
</div>
@endsection