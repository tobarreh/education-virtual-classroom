@extends('template.main')

@section('content')
<div class="col-md-12">
	<br />
	@foreach ($articles as $article)
		<div class="panel panel-body article">
			<a href="{{ route('articles.show', $article->id) }}">
			    <h4 class="list-group-item-heading">{!! $article->title !!}</h4>
			</a>
		    <p class="list-group-item-text">{!! $article->content !!}</p>
			    
		    <div class="text-right">
		    	<p>por <a href="{{ route('users.show', $article->user->id) }}">{!! $article->user->name !!}</a></p>
		    	<span>{!! $article->created_at->diffForHumans() !!}</span>
		    </div>
		</div>
	@endforeach
</div>
@endsection

@section('js')
<script>
    
</script>
@endsection