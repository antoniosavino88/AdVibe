<x-layout>
    @push('title')
        {{ __('ui.appName') }} - {{ __('ui.search') }}
    @endpush
    <div class="bg-page-form min-vh-100">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center text-center">
                <div class="col-12">
                    <h1 class="text-center mt-5 py-4 text-title display-4 fw-semibold text-gradient-title">
                        {{ __('ui.resultsForSearch') }}
                        "<span class="text-title">{{ $query }}</span>"
                    </h1>
                </div>
            </div>

            <div class="row height-custom justify-content-center align-items-center m-2 py-3">
                @forelse ($ads as $ad)
                    <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center">
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
