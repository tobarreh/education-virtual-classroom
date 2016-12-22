<div class="user-info">
    <div class="container user-info-all">
        <div class="user-info-basic">
            @if (\Route::current()->getName() != 'users.edit' or Auth::user()->id != $user->id)
                <div class="float-left user-pic-container">
                    <div data-toggle="modal" data-target=".bs-example-modal-lg">
                        <img class="user-pic" src="{{ asset(Auth::user()->image) }}" alt="...">
                    </div>
                </div>
            @else
                {!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT', 'files' => true]) !!}﻿
                    <div class="float-left user-pic-container">
                        <input type="file" name="image" id="pic-update" class="input-pic" />
                        <label class="input-pic-text" for="pic-update">
                                <span class="glyphicon glyphicon-camera"></span>
                        </label>
                        <img class="user-pic" src="{{ asset(Auth::user()->image) }}" alt="...">
                    </div>

                    <div class="user-pic-update-btn">
                        {!! Form::submit('Cambiar', ['class' => 'btn btn-sm btn-default']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
        </div>

        <div class="user-details">
            <a href="{{ route('users.show', Auth::user()->id) }}">
                <div class="user-name-container">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                </div>
                <div class="user-type">
                    <span class="user-type-text">{{ Auth::user()->type }}</span>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Profile picture modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="user-pic-max-container ">
            <img class="user-pic-max" src="{{ asset(Auth::user()->image) }}" alt="...">
        </div>
    </div>
</div>