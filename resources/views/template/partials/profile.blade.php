<div class="user-info">
    <div class="container user-info-all">
        <div class="user-info-basic">
            <div class="float-left user-pic-container">
                <img class="user-pic" src="">
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
</div>