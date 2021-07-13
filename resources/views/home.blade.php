@extends('layouts.app2')

@section('content')
    <div>
        <home-component></home-component>
    </div>

    <footer class="text-center text-lg-start bg-dark text-muted">

        <section>
            <div>
                <a href="https://twitter.com/?lang=es">
                    <i class="fab fa-facebook-f">Twitter</i>
                </a>
                <a href="https://facebook.com/">
                    <i class="fab fa-twitter">Facebook</i>
                </a>
                <a href="https://youtube.com/">
                    <i class="fab fa-twitter">YouTube</i>
                </a>
                <a href="https://instagram.com/">
                    <i class="fab fa-twitter">Instagram</i>
                </a>
            </div>
        </section>

        <section>
            <div class="container text-center text-md-start mt-5">

                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Finalidad
                        </h6>
                        <p>
                            Gestor de fondos v1.0: ¡Registra tus gastos y lleva un seguimiento de tu dinero!
                        </p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                        <h6 class="text-uppercase fw-bold mb-4">
                            Contacto
                        </h6>
                        <p><i class="fas fa-home me-3"></i> CFT TWK TEMUCO, ARAUCANIA CHILE</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            guz.developer@gmail.com
                        </p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            github.com/Gustavz7
                        </p>

                    </div>
                </div>
            </div>
        </section>

        <div class="text-center p-4">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="">example.com</a>
        </div>
    </footer>

@endsection
