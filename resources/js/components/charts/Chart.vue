
<script>
import {Line} from 'vue-chartjs'

export default {
    extends: Line,
    props: ['info_est', 'dat_fecha'],
    data() {
        return {
            //Data del componenete


            //Config Grafico
            datacollection: {
                labels: ['1'
                ],
                datasets: [
                    {
                        label: 'Deposito',
                        data: [65500, 59000, 80000, 81340, 56100, 55230, 40450],
                        fill: false,
                        borderColor: 'rgb(37,172,0)',
                        tension: 0.0
                    },
                    {
                        label: 'Retiro',
                        data: [23000, 34000, 34000, 9000, 100, 100, null, 10000, null, 21000, 23000],
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
                responsive: false,
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
