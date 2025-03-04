<div class="card my-3 rounded shadow bg-1 text-color-2 card-container border-0">
    <div class="card-body p-0">
        <img src="{{ $ad->images->isNotEmpty() ? $ad->images->first()->getUrl(300, 300) : 'https://picsum.photos/300' }}"
            alt="{{ $ad->title }}" class="img-card">
        <div class="p-3">
            <h5 class="card-title text-center text-truncate text-title">{{ $ad->title }}</h5>
            <div class="d-flex justify-content-between align-items-center">
                <p class="card-text"><a href="{{ route('ad_category', ['category' => $ad->category]) }} "
                        class="btn btn-sm bg-1 border btn-category transition mt-3"> {{ $ad->category->name }}</a></p>
                <p class="card-text fw-bold">€ {{ $ad->price }}</p>
            </div>
            <a href="{{ route('ad_show', compact('ad')) }}"
                class="btn btn-sm justify-content-center d-flex btn-custom transition">{{ __('ui.detail') }}</a>
        </div>
    </div>
</div>

