<x-layout>
    @push('title')
    {{ __('ui.adVibe') }} - {{ __('ui.revisor') }}
    @endpush
    <div class="container-fluid pt-5">
        <div class="row">
            {{-- MESSAGGIO DI SUCCESSO --}}
            <x-success />
            {{-- MESSAGGIO DI RIFIUTO --}}
            @if (session()->has('rejectMessage'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col d-flex justify-content-center">
                        {{-- Messaggio di rifiuto annuncio --}}
                        <div class="alert alert-danger text-center shadow rounded w-50">
                            {{ __('ui.rejectMessage') }}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-12">
                {{-- TITOLO PAGINA --}}
                <div>
                    <h1 class="text-center pb-2 display-4 fw-semibold text-title">
                        {{ __('ui.revisorDashboard') }}
                    </h1>
                </div>
            </div>
        </div>
        @if (!empty($ad_to_check->images))
        <div class="row justify-content-center py-5 mb-5">
            {{-- COLONNA IMMAGINI --}}
            <div class="col-md-6 shadow rounded m-1">
                <div class="row justify-content-center">
                    @foreach ($ad_to_check->images as $key => $image)
                    <div class="col-4 justify-content-center d-flex p-5">
                        <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded bg-1"
                        alt="Immagine {{ $key + 1 }} dell'articolo '{{ $ad_to_check->title }}'">
                    </div>
                    <div class="col-md-5 ps-3">
                        <div class="card-body">
                            <h5>Labels</h5>
                            @if ($image->labels)
                            @foreach ($image->labels as $label)
                            #{{ $label }},
                            @endforeach
                            @else
                            <p class='fst-italic'>No labels</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body">
                            <h5 class=" ">Ratings</h5>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->adult }}"></div>
                                </div>
                                <div class="col-10">adult</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->violence }}"></div>
                                </div>
                                <div class="col-10">violence</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->spoof }}"></div>
                                </div>
                                <div class="col-10">spoof</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->racy }}"></div>
                                </div>
                                <div class="col-10">racy</div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2">
                                    <div class="text-center mx-auto {{ $image->medical }}"></div>
                                </div>
                                <div class="col-10">medical</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- COLONNA TESTI --}}
            <div class="col-md-5 px-5 d-flex flex-column justify-content-between">
                <div>
                    <h2 class="fw-semibold mb-5 text-title text-center">{{ $ad_to_check->title }}</h2>
                    <h4 class="mb-4">{{ __('ui.author') }}:
                        <span class="text-color-5">{{ ucfirst($ad_to_check->user->name) }}</span>
                    </h4>
                    <h4 class="mb-4">{{ __('ui.price') }}:
                        <span class="text-color-5">{{ $ad_to_check->price }}€</span>
                    </h4>
                    <h4 class="mb-5">
                        {{ __('ui.category') }}:
                        <span class="text-color-5">{{ __('ui.' . $ad_to_check->category->name) }}</span>
                    </h4>
                    <h5>
                        {{ __('ui.description') }}
                    </h5>
                    <p>{{ $ad_to_check->description }}</p>
                </div>
                <div class="d-flex justify-content-around">
                    <form action="{{ route('reject', ['ad' => $ad_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn mb-3 py-2 px-5 fw-bold btn-custom-reject">{{ __('ui.reject') }}</button>
                    </form>
                    <form action="{{ route('accept', ['ad' => $ad_to_check]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn mb-3 py-2 px-5 fw-bold btn-custom-accept">{{ __('ui.accept') }}</button>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div class="row justify-content-center align-items-center height-custom text-center">
            <div class="col-12">
                <h1 class="fst-italic display-4">{{ __('ui.noArticlesToReview') }}</h1>
                <a href="{{ route('welcome') }}" class="mt-5 btn btn-custom">{{ __('ui.backToHomepage') }}</a>
            </div>
        </div>
        @endif
    </div>
</x-layout>


