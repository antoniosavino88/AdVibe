<x-layout>
    <div class="bg-page-form min-vh-100">
        <div class="container-fuild overflow-hidden">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center mt-5">{{ ucfirst(Auth::user()->name) }}</h1>
                    <h2 class="text-center mt-2">{{ __('ui.personalProfile') }}</h2>
                </div>
                <div class="col-12">
                    <h2 class="text-center text-title display-4 fw-semibold mt-5 py-4">{{ __('ui.myAds') }}</h2>
                </div>
            </div>
            @if ($myAds->isEmpty())
                <p>{{ __('ui.noAdsPosted') }}</p>
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
                    <h2 class="text-center text-title display-4 fw-semibold mt-5 py-4">{{ __('ui.favouriteAds') }}</h2>
                </div>
            </div>
            @if ($favoriteAds->isEmpty())
                <p class="text-center">{{ __('ui.noFavouriteAds') }}</p>
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
