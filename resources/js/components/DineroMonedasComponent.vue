<template>
    <div>
        <!-- Esta tajeta se mostrara en caso de ocurrir un error en la consulta de axios,
        la variable "error" sera true si hubo error, sino false -->
        <div v-if="error">
            <b-card>
                <b-row>
                    <b-col cols="8">
                        <h4>
                            <b>
                                Error al cargar los valores
                            </b>
                        </h4>
                    </b-col>
                    <b-col cols="4">
                        <b-button
                            @click="api_request_monto"
                            variant="primary"
                            size="md"
                        > Reintentar
                            <b-icon
                                icon="arrow-clockwise"
                                variant="light">
                            </b-icon>
                        </b-button>
                    </b-col>
                </b-row>
                <b-alert variant="danger" v-model="alert"> {{error_msj}}
                    <b-icon icon="exclamation-triangle-fill" variant="secondary"></b-icon>
                </b-alert>
            </b-card>
        </div>

        <!-- esta es la tarjeta que se mostrara si la consulta de axios es exitosa, es decir,
         que la variable error == false -->
        <div v-else>
            <b-overlay :show="loading" rounded="sm">

                <b-card>
                    <b-row>
                        <b-col>
                            <p class="titulo_moneda"><b>Dolares</b></p>
                            <p class="monto">{{ dinero_en_dolares }}</p>
                        </b-col>
                        <b-col>
                            <p class="titulo_moneda"><b> Euros</b></p>
                            <p class="monto"> {{ dinero_en_euros }} </p>
                        </b-col>

                        <b-col>
                            <b-button
                                @click="api_request_monto"
                                variant="secondary"
                                size="sm"
                            >
                                <b-icon
                                    icon="arrow-clockwise"
                                    variant="light">
                                </b-icon>
                            </b-button>
                        </b-col>
                    </b-row>
                </b-card>

            </b-overlay>
        </div>

    </div>
</template>

<script>
export default {
    name: "DineroMonedasComponent",
    data: () => {
        return {
            //info monto principal
            monto: null,

            //peso_chileno
            peso: 'CLP',

            //dolar
            dinero_en_dolares: null,
            intercambio_dolar: 0.0013,

            //euro
            dinero_en_euros: null,
            intercambio_euro: 0.0011,

            //manejo de estados
            loading: false,
            error: false,
            retry_btn: false,

            //errores
            error_msj:"",
            alert: false,
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
                    this.alert = false;
                    this.loading = true;
                    this.error = false;
                    this.monto = response.data[0];
                })
                .catch(error => {
                    //console.log(error);
                    this.error_msj = error;
                    this.error = true;
                    this.retry_btn = true;
                    this.alert = true;
                })
                .finally(() => {
                    if (this.error) {
                        console.log("request error on DineroMonedasComponent");
                    } else {
                        this.dinero_en_dolares = this.monto.monto_principal * this.intercambio_dolar;
                        this.dinero_en_euros = this.monto.monto_principal * this.intercambio_euro;
                        this.loading = false;
                    }
                })
        }
    },
}
</script>

<style scoped>
.titulo_moneda {
    font-size: 30px;
    justify-content: center;

}

</style>
