<footer class="bg-2 text-color-1 text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row justify-content-between">
            <!--Grid column-->
            <div class="col-lg-5 col-md-12 mb-4 mb-md-0 p-3">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img class="logo transition py-2" src="{{ asset('./media/logo.png') }}" alt="{{ __('ui.logoAlt') }}">
                </a>
                <p>
                    {{ __('ui.footerDescription') }}
                </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-5 col-md-12 mb-4 mb-md-0 p-3 text-end">
                <h5 class="py-2 fw-bold"><span class="text-color-5">Dev</span>Alchemy</h5>

                <p>
                    {{ __('ui.teamDescription') }}
                </p>
            </div>
        </div>

    </div>
    <!-- Grid container -->

    @auth
        @if (!Auth::user()->is_revisor)
            <div class="row justify-content-center w-100">
                <div class="col-md-6 d-flex justify-content-center flex-column align-items-center">
                    <h5 class="align-content-center m-0 fw-bold fs-3">{{ __('ui.becomeRevisorQuestion') }} <span
                            class="text-color-5">
                            AdVibe</span> {{ __('ui.footerRevisor') }}</h5>

                    {{-- bottone da scegliere --}}
                    {{-- <a href="{{ route('become.revisor') }}" class="btn btn-custom transition mb-5 mt-3 fw-bold w-25">{{ __('ui.clickHere') }}</a> --}}
                    <a href="{{ route('become.revisor') }}"
                        class="btn btn-footer transition mb-5 mt-3 fw-bold w-25">{{ __('ui.clickHere') }}</a>
                </div>
            </div>
        @endif
    @endauth
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 d-flex justify-content-center">
                <a href="#" class="mx-4 text-reset text-decoration-none logo-social transition">
                    <i class="bi bi-facebook fs-3 text-center text-color-5 logo-social transition"></i>
                </a>
                <a href="#" class="mx-4 text-reset text-decoration-none logo-social transition">
                    <i class="bi bi-instagram fs-3 text-center text-color-5 logo-social transition"></i>
                </a>
                <a href="#" class="mx-4 text-reset text-decoration-none logo-social transition">
                    <i class="bi bi-twitter-x fs-3 text-center text-color-5 logo-social transition"></i>
                </a>
                <a href="#" class="mx-4 text-reset text-decoration-none logo-social transition">
                    <i class="bi bi-tiktok fs-3 text-center text-color-5 logo-social transition"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="text-center p-3 mt-3 border-top mx-5" style="background-color: rgba(0, 0, 0, 0.05);">

        <p class="fs-none"> © 2025 {{ __('ui.copyright') }}: DevAlchemy</p>
    </div>
    <!-- Copyright -->
</footer>
