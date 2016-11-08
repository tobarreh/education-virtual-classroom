@extends('template.main')

@section('title', $article->title)

@section('content')
<div class=" col-md-12">
	<span>{!! $article->content !!}</span>
	<hr>
</div>

<div class="col-md-10">
	@foreach ($article->tags as $tag)
		<span class="glyphicon glyphicon-tags" data-toggle="tooltip" data-placement="left" title="Tags">
			<span class="label label-default">{{ $tag->name }}</span>
		</span> 
	@endforeach
</div>

<div class="col-md-2">
	<div class="text-right">
    	<span class="glyphicon glyphicon-eye-open"> {!! $article->seen !!}</span>
    	<p>por <a href="{{ route('users.show', $article->user->id) }}">{!! $article->user->name !!}</a></p>
    	<span>{!! $article->created_at->diffForHumans() !!}</span>

    	@if($article->created_at != $article->updated_at)
			<span data-toggle="tooltip" data-placement="right" title="{!! $article->created_at->format('d-m-Y') !!}">
				(Editado)
			</span>	
		@endif	
    </div>
</div>
@endsection

@section('js')
<script>
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
</script>
@endsection