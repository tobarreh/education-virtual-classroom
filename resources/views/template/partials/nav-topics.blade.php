<!-- Subjects dropdown -->
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Temas <span class="caret"></span></a>

  <ul class="dropdown-menu">
    <div class="col-md-6">
      <li><a href="#">Por materia</a></li>
      <li role="separator" class="divider"></li>
      @foreach ($matters as $matter)
          <li>
              <a href="{{ route('matters.show', $matter->id) }}">{!! $matter->name !!}</a>
          </li>
      @endforeach
    </div>
    
    <div class="col-md-6">
      <li><a href="#">Por grado</a></li>
      <li role="separator" class="divider"></li>
      @foreach ($grades as $grade)
          <li>
              <a href="{{ route('grades.show', $grade->id) }}">{!! $grade->name !!}</a>
          </li>
      @endforeach
    </div>
  </ul>
</li>