/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


require('./bootstrap');

window.Vue = require('vue').default;
Vue.use(BootstrapVue)
Vue.use (BootstrapVueIcons)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


//home & principal navegation
Vue.component('about-component', require('./components/about/aboutComponent').default);
Vue.component('home-component', require('./components/HomeComponent').default);
Vue.component('cards-Component', require('./components/CardsComponent').default);

Vue.component('dineroMonedas-component', require('./components/DineroMonedasComponent').default);
Vue.component('dineroPrincipal-component', require('./components/DineroPrincipalComponent').default);
Vue.component('historial-component', require('./components/HistorialComponent').default);
//historial detalles
Vue.component('detallesMov-component', require('./components/Historial_detalles_movimientos/detalles_movComponent').default);
Vue.component('editar_detalles_mov-component', require('./components/Historial_detalles_movimientos/editar_detalles_mod').default);
Vue.component('historial_cambios-component', require('./components/Historial_detalles_movimientos/historial_cambios').default);
Vue.component('ver_detalles_cambio-component', require('./components/Historial_detalles_movimientos/ver_detalle_cambio').default);


//cards
Vue.component('card-agregarDinero', require('./components/cardsModule/Card-agregarDinero').default);
Vue.component('card-retirarDinero', require('./components/cardsModule/Card-RetirarDinero').default);
Vue.component('card-estadisticas', require('./components/cardsModule/Card-estadisticas').default);
Vue.component('card-Empty', require('./components/cardsModule/Card-Empty').default);

//charts
Vue.component('estadisticasChart', require('./components/charts/estadisticasChart').default);
Vue.component('Chart', require('./components/charts/Chart').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue(
    {
        el: '#app',
});

