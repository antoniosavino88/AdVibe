<x-layout>
    @push('title')
    {{ __('ui.appName') }} - {{ __('ui.categories') }}
    @endpush
    
    <div class="bg-page-form min-vh-100">
        <div class="container-fuild overflow-hidden">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center text-title display-4 fw-semibold mt-5 py-4">{{ __('ui.adsInCategory') }} <span
                        class="fw-bold">{{ __('ui.' . $category->name) }}</span></h1>
                </div>
            </div>
            <div class="row m-2 py-3 justify-content-center">
                @forelse ($ads as $ad)
                <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-evenly mb-3">
                    <x-ad_card :ad="$ad" />
                </div>
                
                @empty
                <div class="col-12 text-center d-flex flex-column justify-content-center">
                    <h4 class="text-muted fst-italic">
                        {{ __('ui.noAdsInCategory') }}
                    </h4>
                    @auth
                    <div class="container my-3">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                <a href="{{ route('insert_ad') }}" class="btn btn-custom ">{{ __('ui.publishAd') }}</a>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
                @endforelse
                {{-- PAGINATOR --}}
                {{-- <div class="d-flex justify-content-center my-5 mx-0">
                    <div>
                        {{ $ad->$category->links() }}
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    
    
    {{-- Vecchio codice di riserva --}}
    {{-- <div class="bg-page-form min-vh-100">
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
                        <a class="btn btn-custom my-5" href="{{ route('insert_ad') }}">{{ __('ui.publishAd') }}</a>
                        @endauth
                    </div>
                    @endforelse
                </div>
            </div>
        </div> --}}
    </x-layout>
    