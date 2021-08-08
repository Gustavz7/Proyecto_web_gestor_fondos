@extends('layouts.app2')

@section('content')
    <div class="VueComponent-space">
        <home-component></home-component>
    </div>
    <div class="pt-5 justify-content-center bg-dark text-white">
        <!-- iconos de rrss -->
        <div class="row m-4 justify-content-center">
            <div class="col-auto">
                <a class="icon_link" href="https://twitter.com/" target="_blank">
                    <i class="fab fa-twitter-square fa-3x"></i>
                </a>
            </div>
            <div class="col-auto">
                <a class="icon_link" href="https://facebook.com/" target="_blank">
                    <i class="fab fa-facebook-square fa-3x"></i>
                </a>
            </div>
            <div class="col-auto">
                <a class="icon_link" href="https://instagram.com/" target="_blank">
                    <i class="fab fa-instagram-square fa-3x"></i>
                </a>
            </div>
            <div class="col-auto">
                <a class="icon_link" href="https://github.com/Gustavz7" target="_blank">
                    <i class="fab fa-github-square fa-3x"></i>
                </a>
            </div>
        </div>
        <!-- Contacto y descripcion -->
        <div class="row justify-content-center pt-5 pl-5 pr-5">

            <div class="col-auto">
                <h6 class="text-uppercase fw-bold mb-4">Finalidad</h6>
                <p>Gestor de fondos v1.0: ¡Registra tus gastos y lleva un seguimiento de tu dinero!</p>
            </div>

            <div class="col-auto">
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

            </div>
        </div>
        <footer>
            <div class="text-center p-4">
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="">GuzDev</a>
            </div>
        </footer>

    </div>
@endsection

<script>

</script>

<style scoped>
    /*
    a {
        text-decoration: none;
        margin-top: 10px;
        color: #ffffff;

    }

    a:link {
        color: #ffffff;
        background-color: transparent;
        text-decoration: none;
    }

    a:visited {
        color: #ffffff;
        background-color: transparent;
        text-decoration: none;
    }

    a:hover {
        color: #ffffff;
        background-color: transparent;
        text-decoration: none;
    }

    a:active {
        color: #ffffff;
        background-color: transparent;
        text-decoration: none;
    }*/
    .VueComponent-space{
        margin-top: 50px;
        margin-bottom: 50px;
    }
</style>


