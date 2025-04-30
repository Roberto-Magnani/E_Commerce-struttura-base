<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                @auth
                @if (Auth::user()->is_revisor)
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-success btn-sm" href="{{ route('revisor.index') }}">Zona Revisore
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ \App\Models\Article::toBeRevisedCount() }}</span>
                    </a>
                </li>
                @endif
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Articoli
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('article.index') }}">tutti gli articoli</a></li>
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorie
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item text-capitalize" href="#">{{ $category->name }}</a></li>
                                    @if (!$loop->last)
                                        <hr class="dropdown-divider">  
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Search -->
            <form class="d-flex me-2" role="search" action="{{ route('article.search') }}" method="GET">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="input-group-text btn btn-outline-success" type="submit" id="basic-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>

        {{-- notifiche --}}
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary me-2" style="width: 40px; height: 40px;">
                <i class="bi bi-bell"></i>
            </button>

            {{-- lingue --}}
            <div class="dropdown">
                <button class="btn btn-secondary m-0 p-0 rounded-circle" type="button" id="language-menu-button"
                    data="Language" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <x-_locale lang="it" />
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="language-menu-button">
                    <li><x-_locale lang="en" /></li>
                    <li><x-_locale lang="es" /></li>
                </ul>
            </div>

            @auth
                <!-- Profile dropdown -->
                <div class="dropdown">
                    <button class="btn btn-secondary m-0 p-0 rounded-circle" type="button" id="user-menu-button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle" style="width: 40px; height: 40px;" src="./images/image.png"
                            alt="User's profile picture">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="user-menu-button">
                        <li><a class="dropdown-item" href="#">Your Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('create.article') }}">Crea Articolo</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('logout-form').submit();">Sign out</a></li>
                        <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
                            @csrf
                        </form>
                    </ul>
                </div>
            @else
                <div class="dropdown">
                    <button class="btn btn-secondary" type="button" id="user-menu-button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login/Registrati
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="login/register-menu-button">
                        <li><a class="dropdown-item" href="{{ route('login') }}">login</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">register</a></li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</nav>
