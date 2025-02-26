<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">AdVibe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'welcome' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'ad_index' ? 'active' : '' }}"
                        aria-current="page" href="{{ route('ad_index') }}">Annunci</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ Route::currentRouteName() == 'ad_category' ? 'active' : '' }} dropdown-toggle"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item text-capitalize"
                                    href="{{ route('ad_category', ['category' => $category]) }}">{{ $category->name }}</a>
                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'register' ? 'active' : '' }}"
                            href="{{ route('register') }}">Registrati</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'login' ? 'active' : '' }}"
                            href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'insert_ad' ? 'active' : '' }}"
                            href="{{ route('insert_ad') }}">Inserisci Annuncio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                            href="#">Ciao, {{ ucfirst(Auth::user()->name) }}</a>
                        <ul class="dropdown-menu border-0">
                            @if (Auth::user()->is_revisor)
                                <li>
                                    <a class="nav-link {{ Route::currentRouteName() == 'revisor.index' ? 'active' : '' }}"
                                        aria-current="page" href="{{ route('revisor.index') }}">Revisore</a>
                                </li>
                            @endif
                            <li>
                                <div class="btn btn-danger">
                                    <a class="dropdown-item logout-link " href="#"
                                        onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                                </div>
                            </li>
                            <form action="{{ route('logout') }}" method="post" class="d-none" id="form-logout">@csrf
                            </form>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
