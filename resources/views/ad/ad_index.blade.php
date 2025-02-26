<x-layout>
    @push('title')
        AdVibe - Annunci
    @endpush
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center p-5">Annunci</h1>
            </div>

        </div>
        <div class="row">
            @forelse ($ads as $ad)
                <div class="col d-flex justify-content-evenly">
                    <x-ad_card :ad="$ad" />
                </div>

            @empty
                <div class="col-12 text-center d-flex justify-content-center">
                    <h4 class="text-muted fst-italic">
                        Nessun annuncio pubblicato
                    </h4>
                    @auth
                        <a href="{{ route('insert_ad') }}" class="btn btn-primary ">Inserisci annuncio</a>
                    @endauth
                </div>
            @endforelse
            <div class="d-flex justify-content-center my-5">
                <div>
                    {{ $ads->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
