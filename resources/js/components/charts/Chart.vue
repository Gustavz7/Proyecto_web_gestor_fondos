<script>
import {Line} from 'vue-chartjs'

export default {
    extends: Line,
    props: ['valores_1', 'fechas', 'valores_2'],
    data() {
        return {
            //Data del componenete

            //Config Grafico
            datacollection: {
                labels: this.fechas,
                datasets: [
                    {
                        label: 'Deposito',
                        data: this.valores_1,
                        fill: false,
                        borderColor: 'rgb(37,172,0)',
                        tension: 0.0
                    },
                    {
                        label: 'Retiro',
                        data: this.valores_2,
                        fill: false,
                        borderColor: 'rgb(172,0,0)',
                        tension: 0.0
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        gridLines: {
                            display: true
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: true
                        }
                    }]
                },
                legend: {
                    display: true,
                    position: 'bottom'

                },
                title: {
                    display: true,
                    text: '',
                    position: 'top',
                    color: '#CF1717'
                },
                responsive: true,
                aspectRatio: 0,
                maintainAspectRatio: false,
                layout: {},
            },
        }
    },
    async mounted() {
        this.renderChart(this.datacollection, this.options);
    },
}
</script>
<style scoped>


</style>
