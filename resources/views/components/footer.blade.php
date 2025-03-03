<footer class="bg-2 text-color-1 text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
        <!--Grid row-->
        <div class="row justify-content-between">
            <!--Grid column-->
            <div class="col-lg-5 col-md-12 mb-4 mb-md-0 p-3">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img class="logo transition py-2" src="{{ asset('./media/logo.png') }}" alt="">
                </a>
                <p>
                    Stai cercando qualcosa di unico? Vuoi vendere ciò che non usi più? AdVibe è il posto giusto per te!
                    La nostra piattaforma di annunci gratuiti ti mette in contatto con acquirenti e venditori di tutta
                    Italia. Con AdVibe puoi pubblicare i tuoi annunci in pochi clic e navigare tra migliaia di offerte
                    con un'interfaccia intuitiva. Trova articoli di ogni tipo, dalle auto ai vestiti, dai mobili agli
                    animali domestici. I tuoi annunci saranno visti da migliaia di utenti interessati. La nostra
                    piattaforma è sicura e affidabile. Unisciti alla community di AdVibe! Pubblica i tuoi annunci
                    gratuitamente e scopri le migliori offerte del web.
                </p>
                <!--Grid row-->
                @auth
                    @if (!Auth::user()->is_revisor)
                        <div class="col-12 d-flex justify-content-start">
                            <h5 class="align-content-center m-0 fw-bold">Vuoi diventare revisore?</h5>
                            <a href="{{ route('become.revisor') }}" class="btn bg-5 fw-bold text-color-1 ms-5">Clicca
                                qui</a>
                        </div>
                    @endif
                @endauth

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-5 col-md-12 mb-4 mb-md-0 p-3 text-end">
                <h5 class="text-uppercase py-2">DevAlchemy</h5>

                <p>
                    DevAlchemy è il team di sviluppatori visionari che ha trasformato un'idea in realtà, creando AdVibe,
                    la piattaforma di annunci che sta rivoluzionando il mercato.

                    Chi sono?

                    Un gruppo di esperti appassionati di tecnologia, con una solida esperienza nello sviluppo di
                    piattaforme web innovative. La loro missione è creare soluzioni digitali intuitive, performanti e
                    user-friendly.

                    Cosa fanno?

                    Curano ogni dettaglio di AdVibe, dal design all'implementazione delle funzionalità, garantendo
                    un'esperienza utente ottimale. Sono sempre alla ricerca di nuove tecnologie per migliorare
                    costantemente la piattaforma.
                </p>
            </div>
        </div>

    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">

        <p class="fs-none"> © 2025 Copyright: DevAlchemy</p>
    </div>
    <!-- Copyright -->
</footer>
