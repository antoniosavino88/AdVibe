<x-layout>
    @push('title')
        {{ __('ui.appName') }} - {{ __('ui.search') }}
    @endpush
    <div class="bg-page-form min-vh-100">
        <div class="container-fluid">
            <div class="row py-5 justify-content-center align-items-center text-center">
                <div class="col-12">
                    <h1 class="text-center p-3 text-title display-4 fw-semibold">
                        {{ __('ui.resultsForSearch') }}
                        "<span>{{ $query }}</span>"
                    </h1>
                </div>
            </div>

            <div class="row height-custom justify-content-center align-items-center py-5">
                @forelse ($ads as $ad)
                    <div class="col-12 col-md-3 d-flex justify-content-center">
                        <x-ad_card :ad="$ad" />
                    </div>
                @empty
                    <div class="col-12">
                        <h3 class="text-center">
                            {{ __('ui.noResultsFound') }}
                        </h3>
                    </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center">
                {{ $ads->links() }}
            </div>
        </div>
    </div>
</x-layout>
