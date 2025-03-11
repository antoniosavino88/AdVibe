<div>

    <button wire:click="toggleSavedAds" class="border-0 bg-transparent">
        @if ($isFavorite)
            <i class="bi bi-heart-fill text-danger"></i> <!-- Cuore pieno -->
        @else
            <i class="bi bi-heart"></i> <!-- Cuore vuoto -->
        @endif
    </button>
</div>
