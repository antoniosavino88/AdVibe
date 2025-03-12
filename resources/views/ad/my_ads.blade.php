<x-layout>
    @push('title')
        {{ __('ui.adVibe') }} - {{ __('ui.profile') }}
    @endpush
    <div class="bg-page-form min-vh-100">
        <div class="container-fuild overflow-hidden">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center mt-5 text-title text-color-2 ">{{ __('ui.hello') }} <span
                            class="text-color-5 text-title">{{ ucfirst(Auth::user()->name) }}</span>{{ __('ui.yourProfile') }}
                    </h1>
                </div>
                <div class="col-12">
                    <h2 class="ms-4 text-title fs-1 fw-semibold mt-3 py-4 text-gradient-title">{{ __('ui.myAds') }}</h2>
                </div>
            </div>
            @if ($myAds->isEmpty())
                <p class="fst-italic text-center p-5">{{ __('ui.noAdsPosted') }}</p>
            @else
                <div class="row m-2 py-3 justify-content-center">
                    @foreach ($myAds as $ad)
                        <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-evenly mb-3">
                            <x-ad_card :ad="$ad" />
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h2 class="ms-4 text-title fs-1 fw-semibold mt-3 py-4 text-gradient-title">
                        {{ __('ui.favouriteAds') }}</h2>
                </div>
            </div>
            @if ($favoriteAds->isEmpty())
                <p class="fst-italic text-center p-5">{{ __('ui.noFavouriteAds') }}</p>
            @else
                <div class="row m-2 py-3 justify-content-center">
                    @foreach ($favoriteAds as $ad)
                        <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-evenly mb-3">
                            <x-ad_card :ad="$ad" />
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layout>
