<div class="card my-3 rounded shadow" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{ $ad->title }}</h5>
        <p class="card-text">Prezzo: {{ $ad->price }}€</p>
        <p class="card-text">Categoria: <a href="{{ route('ad_category', ['category' => $ad->category]) }}"
                class="btn btn-sm btn-warning mb-1"> {{ $ad->category->name }}</a></p>
        <a href="{{ route('ad_show', compact('ad')) }}" class="btn btn-primary">Dettaglio annnuncio</a>
    </div>
</div>
