<x-layout>
    @push('title')
        {{ __('ui.appName') }} - {{ __('ui.login') }}
    @endpush
    <div class="container p-5">
        <h1 class="text-center pb-5 display-4 fw-semibold">{{ __('ui.login') }}</h1>
        <div class="row justify-content-center">
            <x-error />
            <div class="col-6 py-5">
                <form method="POST" action="{{ route('login') }}" class="shadow rounded p-5">
                    @csrf
                    <div class="py-3">
                        <label class="form-label">{{ __('ui.email') }}</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="py-3">
                        <label class="form-label">{{ __('ui.password') }}</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-custom transition fs-5 btn-sm my-3 px-3 py-0">{{ __('ui.login') }}</button>
                    <p class="mt-3">{{ __('ui.noAccount') }} <a href="{{ route('register') }}" class="fw-bold text-color-5">{{ __('ui.register') }}</a></p>
                </form>
            </div>
        </div>
    </div>
</x-layout>