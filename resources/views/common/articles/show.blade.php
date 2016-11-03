@extends('template.main')

@section('title', $article->title)

@section('content')
<div class=" col-md-12">
	<span>{!! $article->content !!}</span>
	<hr>
	
	@foreach ($article->tags as $tag)
		<span class="label label-default">{{ $tag->name }}</span>
	@endforeach

	<div class="text-right">
    	<span class="glyphicon glyphicon-eye-open"> {!! $article->seen !!}</span>
    	<p>por <a href="{{ route('users.show', $article->user->id) }}">{!! $article->user->name !!}</a></p>
    	<span>{!! $article->created_at->diffForHumans() !!}</span>

    	@if($article->created_at != $article->updated_at)
			<span>(Editado)</span>	
		@endif	
    </div>
</div>
@endsection