<x-layout>
    @push('title')
        {{ __('ui.appName') }} - {{ __('ui.register') }}
    @endpush
    <div class="container p-5">
        <h1 class="text-center p-5 text-title">{{ __('ui.register') }}</h1>
        <div class="row justify-content-center">
            <x-error />
            <div class="col-6">
                <form method="POST" class="shadow rounded p-5" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.username') }}</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.email') }}</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.password') }}</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('ui.confirmPassword') }}</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-custom transition fs-5 btn-sm my-3 px-3 py-0">{{ __('ui.register') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>