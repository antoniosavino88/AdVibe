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
                <!--Grid row-->
                @auth
                    @if (!Auth::user()->is_revisor)
                        <div class="col-12 d-flex justify-content-start">
                            <h5 class="align-content-center m-0 fw-bold">{{ __('ui.becomeRevisorQuestion') }}</h5>
                            <a href="{{ route('become.revisor') }}" class="btn btn-custom transition m-5 fw-bold fs-5">{{ __('ui.clickHere') }}</a>
                        </div>
                    @endif
                @endauth
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-5 col-md-12 mb-4 mb-md-0 p-3 text-end">
                <h5 class="text-uppercase py-2">{{ __('ui.teamName') }}</h5>

                <p>
                    {{ __('ui.teamDescription') }}
                </p>
            </div>
        </div>

    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">

        <p class="fs-none"> © 2025 {{ __('ui.copyright') }}: DevAlchemy</p>
    </div>
    <!-- Copyright -->
</footer>