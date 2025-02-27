<x-layout>
    @push('title')
        AdVibe - Search
    @endpush
    <div class="container-fluid">
        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">
                    Risultati per la ricerca
                    <span class="fst-italic">{{ $query }}</span>
                </h1>
            </div>
        </div>

        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($ads as $ad)
                <div class="col-12 col-md-3">
                    <x-ad_card :ad="$ad" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">
                        Nessun articolo corrisponde alla tua ricerca
                    </h3>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $ads->links() }}
        </div>
    </div>

</x-layout>
