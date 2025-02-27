<x-layout>
    @push('title')
        AdVibe
    @endpush
    <x-success />
    {{-- Snippet messaggio reg Revisor --}}
    @if(session()->has('errorMessage'))
    <div class="alert alert-danger text-center shadow rounded wv-100">
        {{ session('errorMessage') }}
    </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="p-5 text-center ">AdVibe HomePage</h1>
            </div>
            @auth
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 d-flex justify-content-center">
                            <a href="{{ route('insert_ad') }}" class="btn btn-primary">Inserisci annuncio</a>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
        <div class="row justify-content-center py-5">

            <h2 class="text-center p-5">
                Ultimi Annunci
            </h2>
            <div class="row justify-content-evenly">
                @forelse ($ads as $ad)
                    <div class="col-12 col-md-3 d-flex justify-content-evenly">
                        <x-ad_card :ad="$ad" />
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <h4 class="text-muted fst-italic">
                            Nessun annuncio pubblicato
                        </h4>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-layout>
