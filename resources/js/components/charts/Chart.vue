<script>
import {Line} from 'vue-chartjs'

export default {
    extends: Line,
    data() {
        return {
            datacollection: {
                labels: ['01 ago', '02 ago', '03 ago',
                    '04 ago', '05 ago', '06 ago',
                    '07 ago', '08 ago', '09 ago',
                    '10 ago', '11 ago', '12 ago',
                    '13 ago', '14 ago', '15 ago'
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
                title:{
                    display: true,
                    text: '',
                    position: 'top',
                    color: '#CF1717'
                },
                responsive: false,
                aspectRatio: 0,
                maintainAspectRatio: false,
                layout:{

                },
            },

        }
    },
    mounted() {
        this.renderChart(this.datacollection, this.options)
    }
}
</script>
<style scoped>


</style>
