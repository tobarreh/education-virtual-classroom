<div class="form-group row col-md-8">
	<div class="form-group row">
		{!! Form::open(['route' => ['comment.store', $article->id], 'method' => 'GET']) !!}﻿

			<div class="col-md-12">
				{!! Form::textarea('content', null, ['class' => 'form-control textarea-limited', 'rows' => '4', 'placeholder' => 'Escribe aqui tu comentario!']) !!}
				<br />
				
				{!! Form::submit('Comenta', ['class' => 'btn btn-primary pull-right ']) !!}
			</div>

		{!! Form::close() !!}
	</div>
	<hr>

	@foreach ($comments as $comment)
		<div class="discussion">
			<div class="row">
				@if(isset($me->id))
					@if ($me->id == $comment->user_id or $me->type == 'admin')
						<div class="discussion-delete">
							<span data-toggle="tooltip" data-placement="right" title="Eliminar">
                            	<a href="{{ route('comment.destroy', $comment->id) }}">
                            		<span class="glyphicon glyphicon-minus small" aria-hidden="true"></span>
                            	</a>
                        	</span>
						</div>
					@endif
				@endif

				<div class="discussion-content">
					{!! $comment->content !!}
				</div>
			</div>
	    	
	    	<div class="row">
			 	<div class="discussion-votes">
	    			<span class="votes-sum"><b>{!! $comment->votes !!} votos </b></span>
			 		<a href="{{ route('comment.vote', [$comment->id, 1]) }}">
			 			<span class="glyphicon glyphicon-triangle-top"></span>
			 		</a>
			 		<a href="{{ route('comment.vote', [$comment->id, 0]) }}">
			 			<span class="glyphicon glyphicon-triangle-bottom"></span> 
			 		</a>
	    			<a class="discussion-reply-button" role="button" data-toggle="collapse" href="#reply-comment-{!! $comment->id !!}" aria-expanded="false" aria-controls="">
					  	Responder
					</a>
					
					@if ($comment->n_answers != 0)
						<a class="discussion-answers-button" role="button" data-toggle="collapse" href="#answers-comment-{!! $comment->id !!}" aria-expanded="false" aria-controls="">
							{!! $comment->n_answers !!} Respuesta(s)
						</a>
					@endif
			 	</div>
				<div class="discussion-meta-info">
					<span>
						por <a href="{{ route('users.show', $comment->user_id) }}">
								{!! $comment->user->name !!}
							</a> • {!! $comment->created_at->diffForHumans() !!}
					</span>
				</div>
			</div>
		</div>

		<div class="discussion-reply collapse" id="reply-comment-{!! $comment->id !!}">
			<div class="form-group row">
				{!! Form::open(['route' => ['comment.answer.store', $comment->id], 'method' => 'GET']) !!}﻿

					{!! Form::textarea('content', null, ['class' => 'form-control textarea-limited', 'rows' => '4', 'placeholder' => 'Escribe aqui tu respuesta!']) !!}
					<br />
					
					{!! Form::submit('Responde', ['class' => 'btn btn-primary pull-right']) !!}

				{!! Form::close() !!}
			</div>
		</div>

		<div class="discussion-reply collapse" id="answers-comment-{!! $comment->id !!}">
			@foreach ($comment_answers as $answer)
				@if ($answer->comment_id == $comment->id)
					<div class="discussion-answer">
						<hr>
						<div class="row">
							@if(isset($me->id))
								@if ($me->id == $answer->user_id or $me->type == 'admin')
									<div class="discussion-delete">
										<span data-toggle="tooltip" data-placement="right" title="Eliminar">
			                            	<a href="{{ route('comment.answer.destroy', $answer->id) }}">
			                            		<span class="glyphicon glyphicon-minus small" aria-hidden="true"></span>
			                            	</a>
		                            	</span>
									</div>
								@endif
							@endif

							<div class="answer-content">
								{!! $answer->content !!}
							</div>
						</div>

		 				<div class="row">
		    			 	<div class="discussion-votes">
				    			<span class="votes-sum"><b>{!! $answer->votes !!} votos </b></span>
		    			 		<a href="{{ route('comment.answer.vote', [$answer->comment->id, $answer->id, 1]) }}">
		    			 			<span class="glyphicon glyphicon-triangle-top"></span>
		    			 		</a>
		    			 		<a href="{{ route('comment.answer.vote', [$answer->comment->id, $answer->id, 0]) }}">
						 			<span class="glyphicon glyphicon-triangle-bottom"></span>
		    			 		</a>
		    			 	</div>
			    			<div class="discussion-meta-info">
			    				<span>
			    					por <a href="{{ route('users.show', $comment->user_id) }}">
			    							{!! $answer->user->name !!}
		    							</a> • {!! $answer->created_at->diffForHumans() !!}
		    					</span>
			    			</div>
			    		</div>
					</div>
				@endif
			@endforeach
		</div>
		<hr>
	@endforeach		
</div>