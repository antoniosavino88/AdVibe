<x-layout>
    @push('title')
        {{ __('ui.appName') }} - {{ __('ui.categories') }}
    @endpush
    <div class="bg-page-form min-vh-100">
        <div class="container">
            <div class="row py-5 justify-content-center align-items-center text-center">
                <div class="col-12 pt-5">
                    <h1 class="display-4 text-title">{{ __('ui.adsInCategory') }} <span
                            class="fw-bold">{{ __('ui.' . $category->name) }}</span></h1>
                </div>
            </div>
            <div class="row height-custom justify-content-center align-items-center py-5">
                @forelse ($ads as $ad)
                    <div class="col-12 col-md-3">
                        <x-ad_card :ad="$ad" />
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <h3>
                            {{ __('ui.noAdsInCategory') }}
                        </h3>
                        @auth
                            <a class="btn btn-dark my-5" href="{{ route('insert_ad') }}">{{ __('ui.publishAd') }}</a>
                        @endauth
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>
