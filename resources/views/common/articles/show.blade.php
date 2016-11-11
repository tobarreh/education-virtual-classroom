@extends('template.main')

@section('title', $article->title)

@section('content')
<div class=" col-md-12">
	<span>{!! $article->content !!}</span>
	<hr>
</div>

<div class="col-md-10">
	<span class="glyphicon glyphicon-tags" data-toggle="tooltip" data-placement="left" title="Tags">
		@foreach ($article->tags as $tag)
			<span class="label label-default">{{ $tag->name }}</span>
		@endforeach
	</span> 
</div>

<div class="col-md-2">
	<div class="text-right">
    	<span class="glyphicon glyphicon-eye-open"> {!! $article->seen !!}</span>
    	<p>por <a href="{{ route('users.show', $article->user->id) }}">{!! $article->user->name !!}</a></p>
    	<span>{!! $article->created_at->diffForHumans() !!}</span>
    </div>
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
		    	<div class="form-group row col-md-8">
					<div class="form-group row">
						{!! Form::open(['route' => ['questions.store', $article->id], 'method' => 'GET']) !!}﻿

							<div class="col-md-12">
								{!! Form::textarea('content', null, ['class' => 'form-control textarea-limited', 'placeholder' => 'Realiza aqui tu pregunta!', 'required']) !!}

								{!! Form::submit('Pregunta', ['class' => 'btn btn-primary pull-right ']) !!}
							</div>

						{!! Form::close() !!}
					</div>
					<hr>

			 		@foreach ($questions as $question)
			    		<div class="discussion-content">
			    			<p>{!! $question->content !!}</p>
			    		</div>
				    	<div class="discussion-info row">
		    			 	<div class="discussion-votes">
				    			<span class="votes-sum"><b>{!! $question->votes !!} votos </b></span>
		    			 		<a href="">
		    			 			<span class="question-vote glyphicon glyphicon-triangle-top"></span>
		    			 		</a>
		    			 		<a href="">
	    				 			<span class="glyphicon glyphicon-triangle-bottom"></span> 
		    			 		</a>
		    			 	</div>
			    			<div class="discussion-meta-info">
			    				<span>
			    					por <a href="{{ route('users.show', $question->user_id) }}">
			    							{!! $question->user->name !!}
		    							</a> • {!! $question->created_at->diffForHumans() !!}
		    					</span>
			    			</div>
			    		</div>
			    		<hr>
		    		@endforeach
				</div>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="comments">
		    	<div class="form-group row col-md-8">
			    	<p>Esto es un comentario</p>
			    	<hr>
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