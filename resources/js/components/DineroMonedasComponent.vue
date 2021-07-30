<template>
    <div>
        <b-card>
            <b-row>
                <b-col>
                    <p class="titulo_moneda"><b>Dolar</b></p>
                    <p class="monto">{{dinero_en_dolares}}</p>
                </b-col>
                <b-col>
                    <p class="titulo_moneda"><b>Euro</b></p>
                    <p> {{dinero_en_euros}} </p>
                </b-col>
            </b-row>
        </b-card>
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
            peso_precio: '',

            //dolar
            dolar: '$',
            precio_dolar: 0.0013,
            dinero_en_dolares: null,

            //euro
            euro: '€',
            precio_euro: 903.50,
            dinero_en_euros: null,

            //otros
            info: null
        }

    },
    mounted(){
        axios.get('/dinero_principal').then((response) => {
            this.monto = response.data[0];
            console.log(this.monto)
        });
        /*
        //corregir problema de consulta API aaaaaaaaaaaaaaa
        var config = {
            headers: {

            }
        };
        axios.get('https://mindicador.cl/api')
            .then((response) => {
                this.info = response.data;
                console.log(response.data);
            });*/

    },
    methods:{
        convertir(){
            this.dinero_en_dolares = this.monto;
            console.log("test ",this.monto)
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
