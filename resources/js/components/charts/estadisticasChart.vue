<template>
    <div>
        <Chart v-if="ready"
               :valores_1="values"
               :fechas="dates"
               :valores_2="values_2"
               class="chart"
        > No se pudo mostrar el grafico</Chart>
        <div v-else>
            <b-spinner variant="primary" type="border"></b-spinner>
            <p>Consultando datos...</p>
        </div>
    </div>
</template>

<script>
import Chart from "./Chart";

export default {
    name: 'estadisticasChart',
    components: {Chart},
    data: () => ({
        data_all: [],

        values: [],
        values_2:[],
        dates: [],

        ready: false,
    }),
    created() {

    },
    async mounted() {
        this.ready = false;
        const response = await axios.get('/estadisticas');
        this.data_all = response.data;

        for (let item of this.data_all) {
            const fecha = new Date(item.created_at).toLocaleDateString();
            this.dates.push(fecha);
            if(item.tipo_movimiento){
                this.values.push(item.monto);
                this.values_2.push(null)
            }else{
                this.values_2.push(item.monto);
                this.values.push(null)
            }

        }
        this.ready = true;
        console.log(this.data_all, this.values, this.dates);
    },


    methods: {}
}
</script>
<style scoped>
.cont {
    justify-content: center;
}
.chart{
}
</style>
