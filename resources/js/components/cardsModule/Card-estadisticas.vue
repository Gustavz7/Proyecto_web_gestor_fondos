<template>
    <b-card
        border-variant="warning"
        bg-variant=""
        text-variant="dark"
        title=""
        style="
            max-width: 16rem;
            max-height: 25rem;
            min-width: 16rem;
            min-height: 25rem;"
        img-src="https://i.postimg.cc/yxR9WSxB/estadisticas.png"
        img-top
        img-alt="Card image"
        img-width="16opx"
        img-height="230px"
        class="m-2"
        body-class="text-center">
        <b-card-text>Te permite ver datos estadisticos de tus movimientos</b-card-text>

        <!-- Seccion del modal -->
        <b-button class="text-dark" href="#" variant="outline-warning"
                  @click="modalShow = !modalShow"> estadisticas
        </b-button>
        <b-modal class="justify-content-center"
                 title="Estadisticas de tus movimientos"
                 v-model="modalShow"
                 size="lg"
                 centered
                 ok-only
                 ok-title="volver"
                 ok-variant="secondary">

            <estadisticas-chart></estadisticas-chart>


        </b-modal>
    </b-card>
</template>

<script>

import estadisticasChart from "../charts/estadisticasChart";

export default {
    name: "Card-estadisticas",
    components: {estadisticasChart},
    data() {
        return {
            modalShow: false,
        }
    },
    methods: {},
    computed: {}
}
</script>

<style scoped>

</style>
