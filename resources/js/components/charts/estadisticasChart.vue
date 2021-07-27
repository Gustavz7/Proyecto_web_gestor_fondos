<template>
    <div>
        <Chart v-bind="info_estadisticas, dat_fecha"> No se pudo mostrar el grafico</Chart>
        <p> info desde chart padre: {{info_estadisticas}}</p>
        <p v-for="item in dat_fecha">
            fecha: {{ item.created_at }}
        </p>
    </div>
</template>

<script>
import Chart from "./Chart";

export default {
    name: 'estadisticasChart',
    components: {Chart},
    data: () => ({
        info_estadisticas: [],
        dat_fecha: [],
    }),
    async created() {
        axios.get('/estadisticas').then((response) => {
            this.info_estadisticas = response.data;
            console.log("info_estadisticas (desde estadisticasChart.vue):");
            console.log(this.info_estadisticas);
        });
        axios.get('/fecha_actual').then((response) => {
            console.log("info_fecha (desde estadisticasChart.vue):");
            this.dat_fecha = response.data;
            console.log(this.dat_fecha[0].created_at);
        });
    },
    mounted() {

    },


    methods: {}
}
</script>
<style scoped>
.cont {
    justify-content: center;
}

</style>
