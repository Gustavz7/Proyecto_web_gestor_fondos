<template>
    <div>
        <!-- esta tarjeta se mostrara si no hay errores en la request axios -->
        <b-card v-if="error" align="center">

            <b-card-text>

                <b-row>
                <b-col cols="4">
                    <p class="error_dinero_principal">Error al cargar la información </p>
                </b-col>
                <b-col cols="4">
                    <b-button @click="api_request_monto" variant="primary">
                Reintentar
                <b-icon
                    icon="arrow-clockwise"
                    variant="light">
                </b-icon>
            </b-button>
                </b-col>

            </b-row>
            </b-card-text>
        </b-card>

        <!-- esta tarjeta se mostrara si hay errores en la request axios -->
        <b-card v-else align="center">
            <b-overlay :show="loading" rounded="sm">
                <b-card-text class="texto_dinero_principal">
                    {{ monto_total }} {{tipo_moneda}}
                </b-card-text>
            </b-overlay>
        </b-card>
    </div>
</template>

<script>
export default {
    name: "DineroPrincipalComponent",
    data: () => {
        return {
            info_dinero: [],
            monto_total: 0,
            error_estado: false,
            loading: false,
            error: false,
            retry_btn: false,
            tipo_moneda: "",
        }
    },
    mounted() {
        this.api_request_monto();
    },
    methods: {
        api_request_monto() {
            axios
                .get('/dinero_principal')
                .then((response) => {
                    this.loading = true;
                    this.error = false;
                    this.info_dinero = response.data;
                })
                .catch(error => {
                    //console.log(error);
                    this.error = true;
                    this.retry_btn = true;
                })
                .finally(() => {
                    this.loading = false;
                    this.sum_monto();
                })
        },
        sum_monto(){
            for (let item of this.info_dinero){
                if (item.tipo_movimiento){
                    this.monto_total = this.monto_total + item.monto;
                }else{
                    this.monto_total = this.monto_total - item.monto;
                }
                //console.log("item: ",item);
                }
            var formatter = new Intl.NumberFormat('en-US', {
                 style: 'currency',
                currency: 'CLP',
            });
            this.monto_total = formatter.format(this.monto_total);
        }
    },
    computed: {

    }
}
</script>

<style scoped>
.texto_dinero_principal {
    font-weight: bold;
    font-size: 60px;
}

.error_dinero_principal {
    font-weight: bold;
    font-size: 30px;
}
</style>

