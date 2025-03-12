<x-layout>
   <div class="bg-page-form min-vh-100">
    <div class="container">
        <h2 class="mb-4">I Miei Annunci</h2>
    
        @if($myAds->isEmpty())
            <p>Non hai ancora creato annunci.</p>
        @else
            <div class="row">
                @foreach ($myAds as $ad)
                    <div class="col-md-4 mb-3">
                        <x-ad_card :ad="$ad" />
                    </div>
                @endforeach
            </div>
        @endif
    
        <h2 class="mt-5 mb-4">Annunci Preferiti</h2>
    
        @if($favoriteAds->isEmpty())
            <p>Non hai ancora aggiunto annunci ai preferiti.</p>
        @else
            <div class="row">
                @foreach ($favoriteAds as $ad)
                    <div class="col-md-4 mb-3">
                        <x-ad_card :ad="$ad" />
                    </div>
                @endforeach
            </div>
        @endif
    </div>
   </div>
</x-layout>