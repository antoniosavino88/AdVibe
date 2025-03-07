<x-layout>
    @push('title')
        {{ __('ui.appName') }} - {{ __('ui.detail') }}
    @endpush
    <div class="bg-page-form">
        <div class="container">
            <div class="col-8 col-md-2 position-fixed z-1 my-5">
                <a href="{{ route('ad_index') }}" class="mb-5 mt-3 position-relative"><i
                        class="bi bi-arrow-left-circle fs-1 text-color-5 transition"></i></a>
            </div>
            <div class="row height-custom justify-content-between py-5">
                {{-- COLONNA IMMAGINI --}}
                <div class="col-12 col-md-5 my-5 py-5">
                    @if ($ad->images->count() > 0)
                        <div id="carouselExample" class="carousel slide carousel-dark slide img-show">
                            <div class="carousel-inner">
                                @foreach ($ad->images as $key => $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ $image->getUrl(300, 300) }}" class="d-block w-100 rounded shadow"
                                            alt="Immagine{{ $key + 1 }} dell'articolo {{ $ad->title }}">
                                    </div>
                                @endforeach
                            </div>
                            @if ($ad->images->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>
                    @else
                        <img src="https://picsum.photos/400" alt="Nessuna foto inserita dall'utente">
                    @endif
                </div>
                {{-- COLONNA TESTI --}}
                <div class="col-12 col-md-5 my-5 py-5 text-start">
                    <div class="row justify-content-end">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <h1 class="text-title"> {{ $ad->title }}</h1>
                            <h2 class="text-title">€ {{ $ad->price }}</h2>
                        </div>
                    </div>
                    <div class="row mt-4 p-3 border-custom rounded shadow-sm align-items-center">
                        <div class="col-7">
                            <h5 class="mb-2">{{ __('ui.seller') }}: {{ $ad->user->name }}</h5>
                            <p class="text-muted m-0">{{ __('ui.creationDate') }}:
                                {{ $ad->created_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="col-5 d-flex justify-content-end">
                            <a href="#" class="btn btn-sm p-2 btn-custom">{{ __('ui.contactSeller') }}</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <h5>{{ __('ui.description') }}:</h5>
                        <p class="text-start">{{ $ad->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
