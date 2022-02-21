<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Thief News</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('/')}}">All News</a>
            </li>
        </ul>
    </div>
    <span class="navbar-text">
        @if(!Auth::user())
        <a href="{{route('login')}}" class="link-primary">Log in</a>
        @else
            <a href="{{route('admin.index')}}" class="link-primary">Admin Panel</a>
      </span>
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-link" style="margin-left: 5px;"><i class="fa fa-sign-out fa-fw"></i>Log Out</button>
    </form>
    @endif
</nav>
