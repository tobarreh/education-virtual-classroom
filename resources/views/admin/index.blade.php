@extends('template.main')

@section('content')
<br />

<!-- report errors -->
@include ('template.partials.errors-report')

<div class="col-md-12">
    

    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <h2 class="text-center"><span class="glyphicon glyphicon-education"> {{ $n_students }}</span></h2>
                <h4 class="text-center">Estudiantes</h4>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <h2 class="text-center"><span class="glyphicon glyphicon-apple"> {{ $n_professors }}</span></h2>
                <h4 class="text-center">Profesores</h4>
            </div>
        </div>

            <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <h2 class="text-center"><span class="glyphicon glyphicon-file"> {{ $n_articles }}</span></h2>
                <h4 class="text-center">Articulos</h4>
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