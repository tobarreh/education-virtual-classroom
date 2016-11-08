@extends('template.main')

@section('content')
<div class="col-md-12">
	<br />
	@foreach ($articles as $article)
		<a href="{{ route('articles.show', $article->id) }}">
			<div class="panel panel-body article">
			    <h4 class="list-group-item-heading">{!! $article->title !!}</h4>
			    <p class="list-group-item-text">{!! $article->content !!}</p>
			    
			    <div class="text-right">
			    	<p>por <b>{!! $article->user->name !!}</b></p>
			    	<span>{!! $article->created_at->diffForHumans() !!}</span>

			    	@if($article->created_at != $article->updated_at)
						<span>(Editado)</span>
					@endif
			    </div>
			</div>
  		</a>
	@endforeach
</div>
@endsection

@section('js')
<script>
    
</script>
@endsection