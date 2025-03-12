<x-layout>
    @push('title')
        {{ __('ui.adVibe') }} - {{ __('ui.revisor') }}
    @endpush
    <div class="bg-page-form min-vh-100">
        <div class="container-fluid pt-5 mb-5">
            <div class="row">
                {{-- MESSAGGIO DI SUCCESSO --}}
                <div class="w-100 d-flex justify-content-center">
                    <x-success />
                </div>
                {{-- MESSAGGIO DI RIFIUTO --}}
                @if (session()->has('rejectMessage'))
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col d-flex justify-content-center">
                                {{-- Messaggio di rifiuto annuncio --}}
                                <div
                                    class="alert alert-danger ps-3 list-unstyled d-flex justify-content-between w-50 position-relative">
                                    {{ __('ui.rejectMessage') }}
                                    <button type="button" class="btn-close position-absolute mt-3 me-3 top-0 end-0"
                                        data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-12">
                    {{-- TITOLO PAGINA --}}
                    <div>
                        <h1 class="text-center mt-5 py-4 display-4 fw-semibold text-title text-gradient-title">
                            {{ __('ui.revisorDashboard') }}
                        </h1>

                    </div>
                </div>
            </div>
            @if (!empty($ad_to_check->images))
                <div class="row justify-content-center">
                    {{-- COLONNA IMMAGINI --}}
                    <div class="col-md-6 shadow bg-1 rounded m-1">
                        <div class="row d-flex align-items-center">
                            @foreach ($ad_to_check->images as $key => $image)
                                <div class="col-6 justify-content-center p-3">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid-revisor rounded bg-1"
                                        alt="Immagine {{ $key + 1 }} dell'articolo '{{ $ad_to_check->title }}'">
                                    <div class="mt-2 text-truncate">
                                        @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                                #{{ $label }},
                                            @endforeach
                                        @else
                                            <p class='fst-italic'>No labels</p>
                                        @endif
                                    </div>
                                </div>
                                {{-- RATINGS --}}
                                <div class="col-md-5 mb-4">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>👤 Adult</span>
                                            <span class="text-center {{ $image->adult }}"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>⚠️ Violence</span>
                                            <span class="text-center {{ $image->violence }}"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>🎭 Spoof</span>
                                            <span class="text-center {{ $image->spoof }}"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>🔥 Racy</span>
                                            <span class="text-center {{ $image->racy }}"></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>🏥 Medical</span>
                                            <span class="text-center {{ $image->medical }}"></span>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    {{-- COLONNA TESTI --}}
                    <div class="col-md-5 px-5 d-flex flex-column justify-content-between text-revisor">
                        <h2 class="fw-semibold mb-4 text-title text-center text-title-show">{{ $ad_to_check->title }}
                        </h2>
                        {{-- Button Accetta/Rifiuta --}}
                        <div class="d-flex justify-content-around">
                            <!-- Pulsante per aprire la modale di conferma rifiuto -->
                            <button type="button" class="btn mb-3 py-2 px-5 fw-bold btn-custom-reject"
                                data-bs-toggle="modal" data-bs-target="#rejectModal">
                                {{ __('ui.reject') }}
                            </button>
                            <!-- Form per accettare l'annuncio -->
                            <form action="{{ route('accept', ['ad' => $ad_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn mb-3 py-2 px-5 fw-bold btn-custom-accept ">
                                    {{ __('ui.accept') }}
                                </button>
                            </form>

                            <!-- Modale di conferma rifiuto -->
                            <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="rejectModalLabel">{{ __('ui.modalTitle') }}
                                            </h5>
                                            <button type="button" class="btn-close btn-close-modal"
                                                data-bs-dismiss="modal" aria-label="Chiudi"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            {{ __('ui.modalMessage') }}
                                        </div>
                                        <div class="modal-footer justify-content-around">
                                            <button type="button" class="btn  fw-bold btn-custom-accept btn-sm"
                                                data-bs-dismiss="modal">{{ __('ui.modalRejectMessage') }}</button>
                                            <!-- Form di conferma -->
                                            <form action="{{ route('reject', ['ad' => $ad_to_check]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="btn fw-bold btn-custom-reject btn-sm">{{ __('ui.modalAcceptMessage') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Fine button accetta/rifiuta --}}
                        <h4 class="mb-4 mt-3">{{ __('ui.author') }}:
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
                        <p class="text-title-show">{{ $ad_to_check->description }}</p>
                    </div>

                </div>
            @else
                <div class="row justify-content-center align-items-center height-custom text-center">
                    <div class="col-12">
                        <h1 class="fst-italic display-4 text-title">{{ __('ui.noArticlesToReview') }}</h1>
                        <a href="{{ route('welcome') }}" class="mt-5 btn btn-custom">{{ __('ui.backToHomepage') }}</a>
                    </div>
                </div>
            @endif
        </div>

         <!-- Tabelle Revisore -->
        <div class="container mt-4">
            <div class="row">
                <!-- Colonna per gli annunci rifiutati -->
                <div class="col-md-6 col-12">
                    @if ($ads_to_reject->isNotEmpty())
                        <h4 class="text-danger text-center">{{ __('ui.rejectedAds') }}</h4>
                        <table class="table table-bordered table-striped shadow-sm">
                            <thead>
                                <tr>
                                    <th scope="col">{{__('ui.title') }}</th>
                                    <th scope="col">{{ __('ui.author') }}</th>
                                    <th scope="col">{{ __('ui.updated') }}</th>
                                    <th scope="col">{{ __('ui.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ads_to_reject as $ad)
                                    <tr>
                                        <td>{{ $ad->title }}</td>
                                        <td>{{ ucfirst($ad->user->name) }}</td>
                                        <td>{{ $ad->updated_at->format('d/m/Y H:i') }}</td>
                                        <td class="d-flex justify-content-center">
                                            <form action="{{ route('revisor.undo', ['ad' => $ad->id]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm fw-bold btn-custom-reject">{{ __('ui.modalRejectMessage') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted">{{ __('ui.noAdsRejected') }}</p>
                    @endif
                </div>

                <!-- Colonna per gli annunci accettati -->
                <div class="col-md-6 col-12">
                    @if ($ads_to_accepted->isNotEmpty())
                        <h4 class="text-success text-center">{{ __('ui.acceptedAds') }}</h4>
                        <table class="table table-bordered table-striped shadow-sm">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('ui.title') }}</th>
                                    <th scope="col">{{ __('ui.author') }}</th>
                                    <th scope="col">{{ __('ui.updated') }}</th>
                                    <th scope="col">{{ __('ui.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ads_to_accepted as $ad)
                                    <tr>
                                        <td>{{ $ad->title }}</td>
                                        <td>{{ ucfirst($ad->user->name) }}</td>
                                        <td>{{ $ad->updated_at->format('d/m/Y H:i') }}</td>
                                        <td class="d-flex justify-content-center">
                                            <form action="{{ route('revisor.undo', ['ad' => $ad->id]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm fw-bold btn-custom-reject">{{ __('ui.modalRejectMessage') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-muted">{{ __('ui.noAdsAccepted') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
