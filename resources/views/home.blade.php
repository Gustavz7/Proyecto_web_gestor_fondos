@extends('layouts.app2')

@section('content')

    <div class="VueComponent-space">
        <home-component></home-component>
    </div>

    <br>
    <b-container fluid class="bg-dark py-5 mt-5 text-light">
        <!-- iconos de rrss -->
        <b-row class="pb-5 text-center" align-h="center">
            <b-col cols="8">
                <b-link active href="https://twitter.com/" target="_blank"><i class="fab fa-twitter-square fa-3x p-2"></i></b-link>
                <b-link href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-square fa-3x p-2"></i></b-link>
                <b-link href="https://instagram.com/" target="_blank"><i class="fab fa-instagram-square fa-3x p-2"></i></b-link>
                <b-link href="https://github.com/Gustavz7" target="_blank"><i class="fab fa-github-square fa-3x p-2"></i></b-link>
            </b-col>
        </b-row>

        <!-- Contacto y descripcion -->
        <b-row class="px-5" align-h="center">
            <b-col cols="6">
                <h6 class="text-uppercase fw-bold mb-4">Finalidad</h6>
                <p>Gestor de fondos v1.0: ¡Registra tus gastos y lleva un seguimiento de tu dinero!</p>
            </b-col>

            <b-col cols="4">
                <h6 class="text-uppercase fw-bold  mb-4">
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

            </b-col>
        </b-row>
        <footer>
            <div class="text-center p-4">
                © 2021 Copyright <a class="text-reset fw-bold" href="">GuzDev</a>
            </div>
        </footer>
    </b-container>
@endsection

<script>

</script>

<style scoped>
    .VueComponent-space {
        margin-top: 50px;
        margin-bottom: 50px;
    }
    a:link, a:visited {
        color: white;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    a:hover, a:active {
        background-color: transparent;
    }
</style>


