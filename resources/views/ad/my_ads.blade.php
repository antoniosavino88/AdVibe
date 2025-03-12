<x-layout>
    <div class="bg-page-form min-vh-100">
        <div class="container-fuild overflow-hidden">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center text-title display-4 fw-semibold mt-5 py-4">I Miei Annunci</h2>
                </div>
            </div>
            @if ($myAds->isEmpty())
                <p>Non hai ancora creato annunci.</p>
            @else
                <div class="row m-2 py-3 justify-content-center">
                    @foreach ($myAds as $ad)
                        <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-evenly mb-3">
                            <x-ad_card :ad="$ad" />
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center text-title display-4 fw-semibold mt-5 py-4">Annunci Preferiti</h2>
                </div>
            </div>
            @if ($favoriteAds->isEmpty())
                <p class="text-center">Non hai ancora aggiunto annunci ai preferiti.</p>
            @else
                <div class="row m-2 py-3 justify-content-center">
                    @foreach ($favoriteAds as $ad)
                        <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-evenly mb-3">
                            <x-ad_card :ad="$ad" />
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-layout>
