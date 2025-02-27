<x-layout>
    @push('title')
        AdVibe - Revisore
    @endpush
    <div class="container-fluid pt-5">
        <x-success />
        {{-- Messaggio di rifiuto annuncio --}}
        @if(session()->has('rejectMessage'))
        <div class="alert alert-danger text-center shadow rounded wv-100">
            {{ session('rejectMessage') }}
        </div>
        @endif
        <div class="row">
            <div class="col-3">
                <div class="rounded shadow bg-body-secondary">
                    <h1 class="display-5 text-center pb-2">
                        Revisor Dashboard
                    </h1>
                </div>
            </div>
        </div>
        @if ($ad_to_check)
            <div class="row justify-content-center pt-5">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-6 col-md-4 mb-4 text-center">
                                <img src="https://picsum.photos/300" class="img-fluid rounded shadow"
                                    alt="Immgìagine segnaposto">
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1>{{ $ad_to_check->title }}</h1>
                        <h3>Autore: {{ $ad_to_check->user->name }}</h3>
                        <h4>{{ $ad_to_check->price }}$</h4>
                        <h4 class="fst-italic text-muted">#{{ $ad_to_check->category->name }}</h4>
                        <p class="h6">{{ $ad_to_check->description }}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-around">
                        <form action="{{ route('reject', ['ad' => $ad_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger py-2 px-5 fw-bold">Rifiuta</button>
                        </form>
                        <form action="{{ route('accept', ['ad' => $ad_to_check])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success py-2 px-5 fw-bold">Accetta</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center height-custom text-center">
                <div class="col-12">
                    <h1 class="fst-italic display-4">Nessun articolo da revisionare</h1>
                    <a href="{{ route('welcome') }}" class="mt-5 btn btn-success">Torna all'homepage</a>
                </div>
            </div>
        @endif
    </div>
</x-layout>
