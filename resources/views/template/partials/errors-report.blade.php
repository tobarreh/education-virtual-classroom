<div class="row">
	<div class="btn-report">
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#reportProblem" data-whatever="@mdo">
			<span class="glyphicon glyphicon-wrench problem-media-icon"></span>
		</button>
	</div>
</div>


<div class="modal fade" id="reportProblem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	{!! Form::open(['route' => 'errors.store', 'method' => 'GET']) !!}﻿
      		
      		<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="exampleModalLabel">Reportar un problema</h4>
	      	</div>
      
	      	<div class="modal-body">
	        	<div class="form-group row">
					<div class="col-md-12">
						<div class="col-md-4">
							{!! Form::label('title', 'Titulo') !!}
						</div>

						<div class="col-md-8">
								{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Escribe un titulo para el problema']) !!}	
						</div>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-12">
						<div class="col-md-12">
							{!! Form::label('content', 'Problema') !!}
						</div>

						<div class="col-md-12">
							{!! Form::textarea('content', null, ['class' => 'form-control textarea-limited', 'rows' => '4', 'placeholder' => 'Escribe aqui el problema!']) !!}	
						</div>
					</div>
				</div>
					
	      	</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			{!! Form::submit('Reportar', ['class' => 'btn btn-primary pull-right']) !!}
	      </div>
	
		{!! Form::close() !!}
    </div>
  </div>
</div>