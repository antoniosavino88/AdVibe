<x-layout>
    @push('title')
        {{ __('ui.appName') }} - {{ __('ui.adsTitle') }}
    @endpush
    <div class="bg-page-form min-vh-100">
        <div class="container-fuild overflow-hidden">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center p-3 mt-5 text-title display-4 fw-semibold">{{ __('ui.allAds') }}</h1>
                </div>
            </div>
            <div class="row m-5">
                @forelse ($ads as $ad)
                    <div class="col d-flex justify-content-evenly">
                        <x-ad_card :ad="$ad" />
                    </div>

                @empty
                    <div class="col-12 text-center d-flex flex-column justify-content-center">
                        <h4 class="text-muted fst-italic">
                            {{ __('ui.noAdsPublished') }}
                        </h4>
                        @auth
                            <div class="container my-3">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-6 d-flex justify-content-center">
                                        <a href="{{ route('insert_ad') }}"
                                            class="btn btn-custom ">{{ __('ui.insertAd') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    </div>
                @endforelse
                <div class="d-flex justify-content-center my-5 mx-0">
                    <div>
                        {{ $ads->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
