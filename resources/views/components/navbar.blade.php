<nav class="navbar navbar-expand-lg bg-2 shadow fixed-top transition2" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img class="logo transition" src="{{ asset('./media/logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Elementi a sinistra -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'welcome' ? 'active' : '' }}"
                        aria-current="page" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-color-1  {{ Route::currentRouteName() == 'ad_index' ? 'active' : '' }}"
                        aria-current="page" href="{{ route('ad_index') }}">Annunci</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'ad_category' ? 'active' : '' }} dropdown-toggle"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </a>
                    <ul class="dropdown-menu bg-2">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item dropdown-item-category text-capitalize text-color-1"
                                    href="{{ route('ad_category', ['category' => $category]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </li>
            </ul>
            <!-- Form di ricerca centrato -->
            {{-- <form class="d-flex mx-auto" role="search" action="{{ route('ad_search') }}" method="GET">
                <div class="input-group">
                    <input type="search" name="query" class="form-control border-custom" placeholder="Cerca annuncio"
                        aria-label="search">
                    <button type="submit" class="input-group-text btn btn-search border-custom2 transition"
                        id="basic-addon2">
                        Search
                    </button>
                </div>
            </form> --}}

            <!-- Elementi a destra -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form class="d-flex me-2" role="search" action="{{ route('ad_search') }}" method="GET">
                        <div class="input-group">
                            <input type="search" name="query" class="form-control border-custom"
                                placeholder="Cerca annuncio" aria-label="search">
                            {{-- <button type="submit" class="input-group-text btn btn-outline-success border-custom2"
                                id="basic-addon2">
                                Search
                            </button> --}}
                            <button type="submit" class="input-group-text btn btn-search border-custom2 transition"
                                id="basic-addon2">
                                Search
                            </button>
                        </div>
                    </form>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'register' ? 'active' : '' }}"
                            href="{{ route('register') }}">Registrati</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'login' ? 'active' : '' }}"
                            href="{{ route('login') }}">Login</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'insert_ad' ? 'active' : '' }}"
                            href="{{ route('insert_ad') }}">Inserisci Annuncio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ciao, {{ ucfirst(Auth::user()->name) }}
                            @if (App\Models\Ad::toBeRevisedCount() > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ App\Models\Ad::toBeRevisedCount() }}
                                </span>
                            @endif
                        </a>
                        <ul class="dropdown-menu border-0 bg-2">
                            @if (Auth::user()->is_revisor)
                                <li>
                                    <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'revisor.index' ? 'active' : '' }}"
                                        aria-current="page" href="{{ route('revisor.index') }}">
                                        Revisore
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"></span>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <div class="btn btn-danger ms-1 p-0">
                                    <a class="dropdown-item text-color-1 logout-link transition" href="#"
                                        onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
                                        Logout
                                    </a>
                                </div>
                            </li>
                            <form action="{{ route('logout') }}" method="post" class="d-none" id="form-logout">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
