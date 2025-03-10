<x-layout>
    @push('title')
        {{ __('ui.appName') }} - {{ __('ui.register') }}
    @endpush
    <div class="bg-page-form min-vh-100">
        <div class="container-fluid p-5 bg-page-form">
            <h1 class="text-center p-3 text-title display-4 fw-semibold">{{ __('ui.register') }}</h1>
            <div class="row justify-content-center">
                <x-error />
                <div class="col-12 col-md-6 py-5">
                    <form method="POST" class="shadow rounded-4 p-5 bg-form mb-5" action="{{ route('register') }}">
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
                        <button type="submit"
                            class="btn btn-custom transition fs-5 btn-sm my-3 px-3 py-0">{{ __('ui.register') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
