@extends('template.main')

@section('content')
<br />

<div class="panel panel-body">
	<div class="article-title">
		<h2>
			<a data-toggle="collapse" href="#article-content" aria-expanded="true" aria-controls="collapseExample">
				{!! $article->title !!}
			</a>
		</h2>
	</div>

	<div class="row">
		<div id="article-content" class="collapse in article-content">
			<span>{!! $article->content !!}</span>

			<div class="article-tool">
				<span>{!! $article->tool !!}</span>
			</div>
		</div>
	</div>
	<hr>

	<div class="col-md-8">
		<span class="glyphicon glyphicon-tags" data-toggle="tooltip" data-placement="left" title="Tags">
			@foreach ($article->tags as $tag)
				<span class="label label-default">{{ $tag->name }}</span>
			@endforeach
		</span> 
	</div>

	<div class="col-md-4 text-right">
		<span class="glyphicon glyphicon-eye-open"> {!! $article->seen !!}</span>
		<p>por <a href="{{ route('users.show', $article->user->id) }}">{!! $article->user->name !!}</a></p>
		<span>{!! $article->created_at->diffForHumans() !!}</span>
	</div>

	<div class="col-md-10">
		<div class="form-group row">
		  	<ul class="nav nav-tabs" role="tablist">
		    	<li role="presentation" class="active">
		    		<a href="#questions" aria-controls="questions" role="tab" data-toggle="tab">
		    			<p>Preguntas</p>
		    		</a>
	    		</li>
	    		<li role="presentation">
		    		<a  href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
		    			<p>Comentarios</p>
		    		</a>
	    		</li>
		  	</ul>

		  	<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="questions">
			    	@include ('template.partials.articles.questions')
		    	</div>

			    <div role="tabpanel" class="tab-pane" id="comments">
			    	@include ('template.partials.articles.comments')
			    </div>
		  	</div>
		</div>
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