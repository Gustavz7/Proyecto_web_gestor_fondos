<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Incons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>

<div id="app">
    <b-navbar toggleable="lg" type="dark" variant="dark">
        <b-navbar-brand href="{{ url('/home') }}">{{ config('app.name', 'Laravel') }}</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
        <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
                <b-nav-item href="{{ url('/about') }}">About</b-nav-item>
            </b-navbar-nav>

            <b-navbar-nav class="ml-auto">
                <b-nav-item-dropdown text="Usuario & Sesion">
                @guest
                    <!-- Si te estas logueando -->
                        @if (Route::has('login'))
                            <b-dropdown-item href="{{ route('login') }}">{{ __('Login') }}</b-dropdown-item>
                        @endif
                        <b-dropdown-divider></b-dropdown-divider>
                        <!-- si te estas registrando -->
                        @if (Route::has('register'))
                            <b-dropdown-item href="{{ route('register') }}"> {{ __('Register') }}</b-dropdown-item>
                        @endif
                    @else
                    <!-- si ya ingresaste al home -->
                        <template #button-content>
                            <em>{{ Auth::user()->name }}</em>
                        </template>

                        <b-dropdown-item href="{{ url('/perfil') }}">
                            <div class="text-dark"> Ver Perfil</div>
                        </b-dropdown-item>

                        <b-dropdown-divider></b-dropdown-divider>

                        <b-dropdown-item
                            variant="danger"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesion') }}

                            <form id="logout-form"
                                  action="{{ route('logout') }}"
                                  method="POST"
                                  class="d-none">
                                @csrf
                            </form>
                        </b-dropdown-item>
                    @endguest
                </b-nav-item-dropdown>
            </b-navbar-nav>
        </b-collapse>
    </b-navbar>

    <main>
        @yield('content')
    </main>

</div>

</body>
</html>

<style scoped>

</style>
