<x-layout>
    @push('title')
        {{ __('ui.appName') }}
    @endpush
    <x-success />
    {{-- Snippet messaggio reg Revisor --}}
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger text-center shadow rounded wv-100">
            {{ session('errorMessage') }}
        </div>
    @endif

    <div class="container-fluid header-custom bg-image vh-100 m-0">
        <div class="row d-flex flex-column justify-content-center h-100 align-items-center">
            @if (session()->has('message'))
                <div
                    class="alert alert-success ps-3 list-unstyled d-flex justify-content-between w-50 position-relative">
                    {{ __('ui.successMessageRevisor') }}
                    <button type="button" class="btn-close position-absolute mt-3 me-3 top-0 end-0"
                        data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-md-12 d-flex justify-content-center">
                {{-- <h1 class="p-5 text-center ">AdVibe HomePage</h1> --}}
                <img src="./media/header.png" alt="{{ __('ui.headerImageAlt') }}" class="img-header img-fluid">
            </div>
            @auth
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                            <h3 class="text-center">{{ __('ui.welcomeUser') }}<span
                                    class="text-color-5">{{ ucfirst(auth()->user()->name) }}</span>,
                                {{ __('ui.startPublishing') }}</h3>
                            {{-- <h4>Inizia subito a pubblicare i tuoi annunci!</h4> --}}
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-8 d-flex justify-content-center">
                                        <a href="{{ route('insert_ad') }}"
                                            class="btn btn-custom transition fs-4 m-5">{{ __('ui.insertAd') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
            @guest
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                            <h3 class="text-center">{{ __('ui.welcomeGuest') }}
                                {{ __('ui.registerToPublish') }}</h3>
                            {{-- <h4>Inizia subito a pubblicare i tuoi annunci!</h4> --}}
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-8 d-flex justify-content-center">
                                        <a href="{{ route('register') }}"
                                            class="btn btn-custom transition fs-4 m-5">{{ __('ui.register') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endguest
        </div>
    </div>

    {{-- ULTIMI ANNUNCI --}}
    <div class="container">
        <div class="row justify-content-center pb-5">
            <h2 class="text-center p-5 text-title fw-semibold text-gradient-title display-5">
                {{ __('ui.latestAds') }}
            </h2>
            <div class="row justify-content-evenly">
                @forelse ($ads as $ad)
                    <div class="col-12 col-md-3 d-flex justify-content-evenly mb-5">
                        <x-ad_card :ad="$ad" />
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <h4 class="text-muted fst-italic">
                            {{ __('ui.noAdsPublished') }}
                        </h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- CAROSELLO --}}
    {{-- <div class="container">
        <div class="row py-5">
            <div class="col-12">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false">
                    <div class="carousel-inner carosello">
             
                        <div class="carousel-item active carosello1 position-relative" data-bs-interval="4000">
                            <div
                                class="carousel-caption d-none d-md-block carosello-text w-100 d-flex justify-content-center">
                                <div class="container-fluid">
                                    <h2 class="text-center fw-bold display-5 mb-4 text-gradient text-title"><span><img
                                                src="{{ asset('./media/triangolo.png') }}" alt=""
                                                class="img-triangolo"></span>
                                        Perché
                                        scegliere
                                        AdVibe?</h2>

                                    <div class="row g-4 mb-5 pb-5 justify-content-evenly">
                                        <div class="col-3">
                                            <div class="card card-custom-why-advibe shadow-lg border-0 text-center">
                                                <div class="icon-box mx-auto mb-3">
                                                    <i class="bi bi-lightning-charge-fill"></i>
                                                </div>
                                                <h4 class="fw-bold">Veloce & Intuitivo</h4>
                                                <p class="text-muted">Pubblica annunci in pochi secondi con
                                                    un'interfaccia
                                                    semplice e moderna.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="card card-custom-why-advibe shadow-lg border-0 text-center">
                                                <div class="icon-box mx-auto mb-3">
                                                    <i class="bi bi-shield-lock-fill"></i>
                                                </div>
                                                <h4 class="fw-bold">Sicurezza Garantita</h4>
                                                <p class="text-muted">I tuoi dati e transazioni sono sempre protetti con
                                                    crittografia avanzata.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="card card-custom-why-advibe shadow-lg border-0 text-center">
                                                <div class="icon-box mx-auto mb-3">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>
                                                <h4 class="fw-bold">Community Attiva</h4>
                                                <p class="text-muted">Unisciti a migliaia di utenti che comprano e
                                                    vendono ogni
                                                    giorno!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="carousel-item carosello2 position-relative d-flex justify-content-center"
                            data-bs-interval="4000">
                            <div class="carousel-caption d-none d-md-block carosello-text w-100">
                                <div class="container">
                                    <h2 class="text-center fw-bold display-5 mb-5">📊<span
                                            class="text-gradient text-title">I
                                            Nostri
                                            Numeri</span>
                                    </h2>

                                    <div class="row text-center justify-content-evenly">
                                        <!-- Statistica 1 -->
                                        <div class="col-2">
                                            <div class="stat-box shadow-lg p-1 rounded">
                                                <i class="bi bi-people-fill stat-icon"></i>
                                                <h3 class="fw-bold counter" data-target="50000">0</h3>
                                                <p class="text-muted">Utenti Registrati</p>
                                            </div>
                                        </div>
                                        <!-- Statistica 2 -->
                                        <div class="col-2">
                                            <div class="stat-box shadow-lg p-1 rounded">
                                                <i class="bi bi-megaphone-fill stat-icon"></i>
                                                <h3 class="fw-bold counter" data-target="120000">0</h3>
                                                <p class="text-muted">Annunci Pubblicati</p>
                                            </div>
                                        </div>
                                        <!-- Statistica 3 -->
                                        <div class="col-2">
                                            <div class="stat-box shadow-lg p-1 rounded">
                                                <i class="bi bi-cash-stack stat-icon"></i>
                                                <h3 class="fw-bold counter" data-target="85000">0</h3>
                                                <p class="text-muted">Vendite Concluse</p>
                                            </div>
                                        </div>
                                        <!-- Statistica 4 -->
                                        <div class="col-2">
                                            <div class="stat-box shadow-lg p-1 rounded">
                                                <i class="bi bi-star-fill stat-icon"></i>
                                                <h3 class="fw-bold counter" data-target="98">0%</h3>
                                                <p class="text-muted">Clienti Soddisfatti</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


</x-layout>
