<x-layout>
    @push('title')
        AdVibe
    @endpush
    <x-success />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="p-5 text-center">Example</h1>
            </div>
            @auth
            <a href="{{ route('insert_ad') }}" class="btn btn-primary">Inserisci annuncio</a>
            @endauth
        </div>
    </div>
</x-layout>
