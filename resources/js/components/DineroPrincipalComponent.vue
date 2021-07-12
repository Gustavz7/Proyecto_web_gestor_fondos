<template>
    <div>
        <b-button @click="error_A">Test</b-button>

        <b-container>
            <b-card v-if="error_estado == true" align="center">
                <b-card-text class="texto_dinero_principal">
                    {{ info_dinero.moneda_principal }} {{ info_dinero.monto_principal }}
                </b-card-text>
            </b-card>

            <b-card v-if="error_estado == false" align="center">
                <b-card-text class="error_dinero_principal">
                    no se pudo cargar la información
                </b-card-text>
                <b-button @click="reintentar" variant="primary">Reintentar</b-button>
            </b-card>
        </b-container>

    </div>
</template>

<script>
export default {
    name: "DineroPrincipalComponent",
    mounted(){
            axios.get('/dinero_principal').then((response) => {
            this.info_dinero = response.data[0];
            });

    },
    data: () => {
        return{
            info_dinero: [],
            error_estado: true
        }
    },
    methods:{
        reintentar(){
            console.log("reintentado conexion xd")
        },
        error_A(){
            this.error_estado = !this.error_estado;
        }
    },
    computed:{

    }
}
</script>

<style scoped>
.texto_dinero_principal {
    font-weight: bold;
    font-size: 60px;
}
.error_dinero_principal{
    font-weight: bold;
    font-size: 30px;
}
</style>

