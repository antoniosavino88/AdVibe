<x-layout>
    @push('title')
        {{ __('ui.adVibe') }} - {{ __('ui.revisor') }}
    @endpush
    <div class="container-fluid pt-5">
        <div class="row">
            <x-success />
            @if (session()->has('rejectMessage'))
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col d-flex justify-content-center">
                            {{-- Messaggio di rifiuto annuncio --}}
                            <div class="alert alert-danger text-center shadow rounded w-50">
                                {{ session('rejectMessage') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-12">
                <div>
                    <h1 class="text-center pb-2 display-4 fw-semibold">
                        {{ __('ui.revisorDashboard') }}
                    </h1>
                </div>
            </div>
        </div>
        @if ($ad_to_check)
            <div class="row justify-content-center py-5">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        @for ($i = 0; $i < 4; $i++)
                            <div class="col-6 col-md-6 text-center p-3">
                                <img src="https://picsum.photos/300" class="img-fluid rounded shadow"
                                    alt="{{ __('ui.placeholderImage') }}">
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="col-md-6 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1 class="pt-2 text-start">{{ $ad_to_check->title }}</h1>
                        <h3>{{ __('ui.author') }}: {{ ucfirst($ad_to_check->user->name) }}</h3>
                        <h4>{{ $ad_to_check->price }}€</h4>
                        <h4 class="fst-italic text-muted">#{{ $ad_to_check->category->name }}</h4>
                        <p class="h6">{{ $ad_to_check->description }}</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <form action="{{ route('reject', ['ad' => $ad_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn mb-3 bg-5 py-2 px-5 fw-bold">{{ __('ui.reject') }}</button>
                        </form>
                        <form action="{{ route('accept', ['ad' => $ad_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn mb-3 bg-4 py-2 px-5 fw-bold">{{ __('ui.accept') }}</button>
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
