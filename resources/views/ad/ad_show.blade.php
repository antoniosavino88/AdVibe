<x-layout>
    @push('title')
    {{ __('ui.appName') }} - {{ __('ui.detail') }}
    @endpush
    <div class="container">
        {{-- <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12 mt-2">
                <h1 class="display-4 text-title mt-5">{{ $ad->title }}</h1>
            </div>
        </div> --}}
        
        <div class="row height-custom justify-content-center py-5">
            <div class="col-12 col-md-6">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/400" class="d-block w-100 rounded shadow" alt="{{ __('ui.adImage') }}">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/400" class="d-block w-100 rounded shadow" alt="{{ __('ui.adImage') }}">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/400" class="d-block w-100 rounded shadow" alt="{{ __('ui.adImage') }}">
                        </div>
                    </div>
                    
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">{{ __('ui.previous') }}</span>
                </button>
                
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('ui.next') }}</span>
            </button>
        </div>
    </div>
    <div class="col-12 col-md-6 height-custom text-start d-flex flex-column justify-content-between">
        <div class="row">
            <h2 class="display-5 text-title"><span class="text-title"></span> {{ $ad->title }}</h2>
            <h4>€ {{ $ad->price }}</h4>
        </div>    
            <div class="row ">
                <h5 class="text-muted">{{ __('ui.description') }}:</h5>
                <p class="text-start">{{ $ad->description }}</p>
            </div>
        </div>
    </div>
</div>
</div>
</x-layout>