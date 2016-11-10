@extends('template.main')

@section('content')
<br />

<div class="col-md-12">    
    <div class="jumbotron">    
        <h1>Estamos trabajando en esto!</h1>
        <p>estamos realizando ajustes en la pagina principal de administradores</p>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Leer mas
        </button>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Mejoras a realizar</h4>
              </div>
              <div class="modal-body">
                <h4>En este momento estamos agregando preguntas y comentarios para cada articulo</h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <h2 class="text-center"><span class="glyphicon glyphicon-education"> {{ $n_students }}</span></h2>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <h2 class="text-center"><span class="glyphicon glyphicon-apple"> {{ $n_professors }}</span></h2>
            </div>
        </div>

            <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <h2 class="text-center"><span class="glyphicon glyphicon-file"> {{ $n_articles }}</span></h2>
            </div>
        </div>  
    </div>
</div>
@endsection

@section('js')
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
</script>
@endsection