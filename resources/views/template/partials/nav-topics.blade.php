<!-- Dropdown -->
<li><a href="{{ route('home.index') }}">Inicio</a></li>

<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Temas <span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="#">Por materias</a></li>
    <li role="separator" class="divider"></li>
    @foreach ($subjects as $subject)
        <li>
            <a href="{{ route('subjects.show', $subject->id) }}">{!! $subject->name !!}</a>
        </li>
    @endforeach
  </ul>
</li>