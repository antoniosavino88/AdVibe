<x-layout>
    @push('title')
        AdVibe - Login
    @endpush
    <div class="container p-5">
        <h1 class="text-center p-5 text-title">Accedi</h1>
        <div class="row justify-content-center">
            <x-error />
            <div class="col-6">
                <form method="POST" action="{{ route('login') }}" class="shadow rounded p-5">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Accedi</button>
                    <p class="mt-3">Non hai un account? <a href="{{ route('register') }}">Registrati</a></p>
                </form>
            </div>
        </div>
    </div>
</x-layout>
