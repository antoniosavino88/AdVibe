<div class="card my-3 rounded shadow bg-1 text-color-2" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{ $ad->title }}</h5>
        <img src="https://picsum.photos/200" alt="immagine annuncio">
        <p class="card-text">Prezzo: {{ $ad->price }}€</p>
        <p class="card-text">Categoria: <a href="{{ route('ad_category', ['category' => $ad->category]) }}"
                class="btn btn-sm bg-1 shadow mb-1"> {{ $ad->category->name }}</a></p>
        <a href="{{ route('ad_show', compact('ad')) }}" class="btn bg-6">Dettaglio annnuncio</a>
    </div>
</div>
