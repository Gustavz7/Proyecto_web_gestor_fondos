<template>
        <Chart width="700" height="500"> No se pudo mostrar el grafico</Chart>
</template>

<script>
import Chart from "./Chart";
export default {
    name: 'estadisticasChart',
    components: {Chart},
    data: () => ({
        info_estadisticas: []
    }),
    mounted() {
        axios.get('/estadisticas').then((response) => {
            this.info_estadisticas = response.data[0];
        });

    }
}
</script>
<style scoped>
.cont{
    justify-content: center;
}

</style>
