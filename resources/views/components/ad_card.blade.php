<div class="card my-3 rounded shadow bg-1 text-color-2 card-container border-0">
    <div class="card-body p-0">
        <img src="https://picsum.photos/200" alt="immagine annuncio" class="img-card">
        <div class="p-3">
            <h5 class="card-title text-center text-truncate">{{ $ad->title }}</h5>
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-text"><a href="{{ route('ad_category', ['category' => $ad->category]) }} "
                    class="btn btn-sm bg-1 border btn-category transition mt-3"> {{ $ad->category->name }}</a></p>
                <p class="card-text fw-bold">€ {{ $ad->price }}</p>
                </div>
                <a href="{{ route('ad_show', compact('ad')) }}" class="btn bg-6 btn-sm justify-content-center d-flex btn-dettaglio transition">Dettaglio</a>
            </div>
        </div>
    </div>
    