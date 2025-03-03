<nav class="navbar navbar-expand-lg bg-2 shadow fixed-top transition2" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img class="logo transition" src="{{ asset('./media/logo.png') }}" alt="{{ __('ui.logoAlt') }}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('ui.toggleNavigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Elementi a sinistra -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'welcome' ? 'active' : '' }}"
                        aria-current="page" href="{{ route('welcome') }}">{{ __('ui.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-color-1  {{ Route::currentRouteName() == 'ad_index' ? 'active' : '' }}"
                        aria-current="page" href="{{ route('ad_index') }}">{{ __('ui.ads') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'ad_category' ? 'active' : '' }} dropdown-toggle"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.categories') }}
                    </a>
                    <ul class="dropdown-menu bg-2" id="dropdown-menu">
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
            <!-- Elementi a destra -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form class="d-flex me-2" role="search" action="{{ route('ad_search') }}" method="GET">
                        <div class="input-group">
                            <input type="search" name="query" class="form-control border-custom"
                                placeholder="{{ __('ui.searchAd') }}" aria-label="search">
                            <button type="submit" class="input-group-text btn btn-search border-custom2 transition"
                                id="basic-addon2">
                                {{ __('ui.search') }}
                            </button>
                        </div>
                    </form>
                </li>
               <x-locale lang="it"/>
               <x-locale lang="en"/>
               <x-locale lang="es"/>

                @guest
                    <li class="nav-item">
                        <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'register' ? 'active' : '' }}"
                            href="{{ route('register') }}">{{ __('ui.register') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'login' ? 'active' : '' }}"
                            href="{{ route('login') }}">{{ __('ui.login') }}</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link dropdown-toggle position-relative" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('ui.hello') }}, {{ ucfirst(Auth::user()->name) }}
                            @if (App\Models\Ad::toBeRevisedCount() > 0)
                                @if (Auth::user()->is_revisor)
                                    <span
                                        class="position-absolute top-0 start-100 mt-1 translate-middle badge rounded-pill bg-4">
                                        {{ App\Models\Ad::toBeRevisedCount() }}
                                    </span>
                                @endif
                            @endif
                        </a>
                        <ul class="dropdown-menu border-0 bg-2">
                            @if (Auth::user()->is_revisor)
                                <li>
                                    <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'revisor.index' ? 'active' : '' }}
                                    @if (App\Models\Ad::toBeRevisedCount() > 0) vibrate @endif"
                                        aria-current="page" href="{{ route('revisor.index') }}">
                                        {{ __('ui.revisor') }}
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link text-color-1 {{ Route::currentRouteName() == 'insert_ad' ? 'active' : '' }}"
                                    href="{{ route('insert_ad') }}">{{ __('ui.insertAd') }}</a>
                            </li>
                            <li>
                                <div class="btn btn-danger ms-1 p-0">
                                    <a class="dropdown-item text-color-1 logout-link transition" href="#"
                                        onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
                                        {{ __('ui.logout') }}
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