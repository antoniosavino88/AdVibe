<x-layout>
    <h1 class="text-center p-5">Annunci</h1>
    <div class="container">
        <div class="row">
            @foreach ($ads as $ad)
                <div class="col-12 col-md-3">
                    <div class="card my-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $ad->title }}</h5>
                            <p class="card-text">Prezzo: {{ $ad->price }}€</p>
                            <p class="card-text">Categoria: {{ $ad->category }}</p>
                            <a href="{{ route('ad_show', compact('ad'))}}" class="btn btn-primary">Dettaglio annnuncio</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center my-5">
        <div>
            {{ $ads->links() }}
        </div>
    </div>
</x-layout>
