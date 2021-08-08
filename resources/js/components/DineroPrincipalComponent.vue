<template>
    <div>
        <!-- esta tarjeta se mostrara si no hay errores en la request axios -->
        <b-card v-if="error" align="center">
            <b-card-text class="error_dinero_principal">
                Error al cargar la información
            </b-card-text>
            <b-button @click="api_request_monto" variant="primary">
                Reintentar
                <b-icon
                    icon="arrow-clockwise"
                    variant="light">
                </b-icon>
            </b-button>
        </b-card>

        <!-- esta tarjeta se mostrara si hay errores en la request axios -->
        <b-card v-else align="center">
            <b-overlay :show="loading" rounded="sm">
                <b-card-text class="texto_dinero_principal">
                    {{ info_dinero.moneda_principal }} {{ info_dinero.monto_principal }}
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
            error_estado: false,
            loading: false,
            error: false,
            retry_btn: false,
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
                    this.info_dinero = response.data[0];
                })
                .catch(error => {
                    //console.log(error);
                    this.error = true;
                    this.retry_btn = true;
                })
                .finally(() => {
                    this.loading = false;
                })
        }
    },
    computed: {}
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

