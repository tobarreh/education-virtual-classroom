<div class="form-group row col-md-8">
	<div class="form-group row">
		{!! Form::open(['route' => ['question.store', $article->id], 'method' => 'GET']) !!}﻿

			<div class="col-md-12">
				{!! Form::textarea('content', null, ['class' => 'form-control textarea-limited', 'rows' => '4', 'placeholder' => 'Escribe aqui tu pregunta!']) !!}
				<br />
				
				{!! Form::submit('Pregunta', ['class' => 'btn btn-primary pull-right ']) !!}
			</div>

		{!! Form::close() !!}
	</div>
	<hr>

	@foreach ($questions as $question)
		<div class="discussion">
			<div class="row">
				@if(isset($me->id))
					@if ($me->id == $question->user_id or $me->type == 'admin')
						<div class="discussion-delete">
							<span data-toggle="tooltip" data-placement="right" title="Eliminar">
                            	<a href="{{ route('question.destroy', $question->id) }}">
                            		<span class="glyphicon glyphicon-minus small" aria-hidden="true"></span>
                            	</a>
                        	</span>
						</div>
					@endif
				@endif

				<div class="discussion-content">
					{!! $question->content !!}
				</div>
			</div>
	    	
	    	<div class="row">
			 	<div class="discussion-votes">
	    			<span class="votes-sum"><b>{!! $question->votes !!} votos </b></span>
			 		<a href="{{ route('questions.vote', [$question->id, 1]) }}">
			 			<span class="glyphicon glyphicon-triangle-top"></span>
			 		</a>
			 		<a href="{{ route('questions.vote', [$question->id, 0]) }}">
			 			<span class="glyphicon glyphicon-triangle-bottom"></span> 
			 		</a>
	    			<a class="discussion-reply-button" role="button" data-toggle="collapse" href="#reply-question-{!! $question->id !!}" aria-expanded="false" aria-controls="">
					  	Responder
					</a>

					@if ($question->n_answers != 0)
						<a class="discussion-answers-button" role="button" data-toggle="collapse" href="#answers-{!! $question->id !!}" aria-expanded="false" aria-controls="">
							{!! $question->n_answers !!} Respuesta(s)
						</a>
					@endif
			 	</div>
				<div class="discussion-meta-info">
					<span>
						por 
						<a href="{{ route('users.show', $question->user_id) }}">
							{!! $question->user->name !!}
						</a> • {!! $question->created_at->diffForHumans() !!}
					</span>
				</div>
			</div>
		</div>

		<div class="discussion-reply collapse" id="reply-question-{!! $question->id !!}">
			<div class="form-group row">
				{!! Form::open(['route' => ['question.answer.store', $question->id], 'method' => 'GET']) !!}﻿

					{!! Form::textarea('content', null, ['class' => 'form-control textarea-limited', 'rows' => '4', 'placeholder' => 'Escribe aqui tu respuesta!']) !!}
					<br />
					
					{!! Form::submit('Responde', ['class' => 'btn btn-primary pull-right']) !!}

				{!! Form::close() !!}
			</div>
		</div>

		<div class="discussion-reply collapse" id="answers-{!! $question->id !!}">
			@foreach ($question_answers as $answer)
				@if ($answer->question_id == $question->id)
					<div class="discussion-answer">
						<hr>
						<div class="row">
							@if(isset($me->id))
								@if ($me->id == $answer->user_id or $me->type == 'admin')
									<div class="discussion-delete">
										<span data-toggle="tooltip" data-placement="right" title="Eliminar">
			                            	<a href="{{ route('question.answer.destroy', $answer->id) }}">
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
		    			 		<a href="{{ route('question.answer.vote', [$answer->question->id, $answer->id, 1]) }}">
		    			 			<span class="glyphicon glyphicon-triangle-top"></span>
		    			 		</a>
		    			 		<a href="{{ route('question.answer.vote', [$answer->question->id, $answer->id, 0]) }}">
						 			<span class="glyphicon glyphicon-triangle-bottom"></span> 
		    			 		</a>
		    			 	</div>
			    			<div class="discussion-meta-info">
			    				<span>
			    					por <a href="{{ route('users.show', $question->user_id) }}">
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