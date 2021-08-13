@extends('layouts.app2')

@section('content')

    <div class="VueComponent-space">
        <home-component></home-component>
    </div>

    <b-container fluid class="bg-dark py-5 text-light">
        <!-- iconos de rrss -->
        <b-row class="pb-5 text-center" align-h="center">
            <b-col cols="8">
                <b-link active href="https://twitter.com/" target="_blank"><i class="fab fa-twitter-square fa-3x p-2"></i></b-link>
                <b-link href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-square fa-3x p-2"></i>
                </b-link>
                <b-link href="https://instagram.com/" target="_blank"><i class="fab fa-instagram-square fa-3x p-2"></i>
                </b-link>
                <b-link href="https://github.com/Gustavz7" target="_blank"><i class="fab fa-github-square fa-3x p-2"></i></b-link>
            </b-col>
        </b-row>

        <!-- Contacto y descripcion -->
        <b-row class="px-5" align-h="center">
            <b-col cols="6">
                <h6 class="text-uppercase fw-bold mb-4">Finalidad</h6>
                <p>Gestor de fondos v2.0: ¡Registra tus gastos y lleva un seguimiento de tu dinero!</p>
            </b-col>

            <b-col cols="5">
                <h6 class="text-uppercase fw-bold  mb-4">Contacto</h6>
                <div>
                    <i class="fas fa-map-marker-alt me-3"></i><p>CFT TWK TEMUCO, ARAUCANIA, CHILE</p>
                </div>
                <div>
                    <i class="fas fa-envelope me-3"></i><p>guz.developer@gmail.com</p>
                </div>
                <div>
                    <i class="fab fa-github me-3"></i><p>github.com/Gustavz7</p>
                </div>

            </b-col>
        </b-row>
        <footer>
            <div class="text-center p-4">
                © 2021 Copyright
                <h1>
                    <b>GuzDev</b>
                </h1>
            </div>
        </footer>
    </b-container>
@endsection

<script>

</script>

<style scoped>
    .VueComponent-space {
        padding-top: 50px;
        padding-bottom: 50px;
        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg width='32' height='26' viewBox='0 0 32 26' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M14 0v3.994C14 7.864 10.858 11 7 11c-3.866 0-7-3.138-7-7.006V0h2v4.005C2 6.765 4.24 9 7 9c2.756 0 5-2.236 5-4.995V0h2zm0 26v-5.994C14 16.138 10.866 13 7 13c-3.858 0-7 3.137-7 7.006V26h2v-6.005C2 17.235 4.244 15 7 15c2.76 0 5 2.236 5 4.995V26h2zm2-18.994C16 3.136 19.142 0 23 0c3.866 0 7 3.138 7 7.006v9.988C30 20.864 26.858 24 23 24c-3.866 0-7-3.138-7-7.006V7.006zm2-.01C18 4.235 20.244 2 23 2c2.76 0 5 2.236 5 4.995v10.01C28 19.765 25.756 22 23 22c-2.76 0-5-2.236-5-4.995V6.995z' fill='%23e9ecef' fill-opacity='0.84' fill-rule='evenodd'/%3E%3C/svg%3E");
    }

    a:link, a:visited {
        color: white;
    }

    a:hover, a:active {
        background-color: transparent;
    }
</style>


