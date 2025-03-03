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

    <div class="container header-custom">
        <div class="row justify-content-center">
            @if (session()->has('message'))
                <div class="alert alert-success text-center shadow rounded w-50">
                    {{ session('message') }}
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
                            <h3 class="text-center">{{ __('ui.welcomeUser') }}<span class="text-color-5">{{ ucfirst(auth()->user()->name) }}</span>,
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

    <div class="container">
        <div class="row justify-content-center pb-5">
            <h2 class="text-center p-5">
                {{ __('ui.latestAds') }}
            </h2>
            <div class="row justify-content-evenly">
                @forelse ($ads as $ad)
                    <div class="col-12 col-md-3 d-flex justify-content-evenly">
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
</x-layout>
