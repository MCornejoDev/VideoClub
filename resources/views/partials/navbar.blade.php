
<style>

.divNav{
    display: block;
    padding: .5rem 1rem;
}

@media screen and (max-width:426px){
    .centrado{
        text-align:center !important;
    }
}

@media screen and (min-width:426px) and (max-width:768px){
    .centrado{
        text-align:center !important;
    }
}

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        @if(Auth::check())
            <a class="navbar-brand" href="{{route('catalog')}}" style="color:#777"><i class="fa fa-film"></i> Video Store</a>
        @else
            <a class="navbar-brand" href="/" style="color:#777"><i class="fa fa-film"></i> Video Store</a>
        @endif

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if(Auth::check())
            <div class="collapse navbar-collapse centrado" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto enlinea">
                    <li class="nav-item">
                        <div class="divNav">
                            <i class="fa fa-user brand"></i> {{ Auth::user()->name }}
                        </div>
                    </li>
                    <li class="nav-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{route('catalog')}}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            Catalog
                        </a>
                    </li>
                    <li class="nav-item {{  Request::is('catalog/create') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('create')}}">
                            <span>&#10010</span> New Movie
                        </a>
                    </li>
                </ul>
                
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="display:inline">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <div class="collapse navbar-collapse centrado" id="navbarSupportedContent">
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Register</a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>

