<div id="wrapper">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">Admin Panel</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="{{route('/')}}" target="_blank"><i class="fa fa-home fa-fw"></i> Thief News</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> {{\Illuminate\Support\Facades\Auth::user()->name}} <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{route('profile', \Illuminate\Support\Facades\Auth::user()->id)}}"><i class="fa fa-user fa-fw"></i> Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <div class="mx-auto" style="margin-left: 20px;">
                        <button type="submit" class="btn btn-outline btn-primary btn-sm"><i class="fa fa-sign-out fa-fw"></i>Log Out</button>
                        </div>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{route('admin.index')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>

                <li>
                    <a href="{{route('admin.sources')}}"><i class="fa fa-table fa-fw"></i> Sources</a>
                </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
    </div>
</nav>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
