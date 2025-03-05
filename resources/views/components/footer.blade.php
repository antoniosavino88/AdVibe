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
                <h5 class="py-2 fw-bold">DevAlchemy</h5>
                
                <p>
                    {{ __('ui.teamDescription') }}
                </p>
            </div>
        </div>
        
    </div>
    <!-- Grid container -->
    
    @auth
    @if (!Auth::user()->is_revisor)
    <div class="row justify-content-center">
        <div class="col-md-6 d-flex justify-content-center flex-column align-items-center">
            <h5 class="align-content-center m-0 fw-bold fs-3">{{ __('ui.becomeRevisorQuestion') }} <span>                    <img class="logo-footer" src="{{ asset('./media/logo.png') }}" alt="{{ __('ui.logoAlt') }}"></span>{{__('ui.footerRevisor')}}</h5>
            <a href="{{ route('become.revisor') }}" class="btn btn-custom transition mb-5 mt-3 fw-bold w-25">{{ __('ui.clickHere') }}</a>
        </div>
    </div>
    @endif
    @endauth
    <!-- Copyright -->
    <div class="text-center p-3 mt-5 border-top mx-5" style="background-color: rgba(0, 0, 0, 0.05);">
        
        <p class="fs-none"> © 2025 {{ __('ui.copyright') }}: DevAlchemy</p>
    </div>
    <!-- Copyright -->
</footer>