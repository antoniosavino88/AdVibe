<x-layout>
    @push('title')
        AdVibe - Registrati
    @endpush
    <div class="container p-5">
        <h1 class="text-center p-5">Registrati</h1>
        <div class="row justify-content-center">
            <x-error />
            <div class="col-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Conferma password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrati</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
