<template>
    <div>
        <b-card
        align="center">
            <b-card-text
                class="texto_dinero_principal"> {{info_dinero}} </b-card-text>
        </b-card>

        <li>
            <ol v-for="item in info_dinero"> item.id</ol>
        </li>


    </div>
</template>

<script>
export default {
    name: "DineroPrincipalComponent",
    data(){
        return{
            moneda_principal:"",
            dinero_principal: "1.654.050",
            info_dinero: null,
        }
    },
    mounted(){
        axios.get('/dinero_principal').then((response) => {
            this.info_dinero = [];
            this.info_dinero = response.data[0];
            console.log(this.info_dinero);
        });
    }
}
</script>

<style scoped>
.texto_dinero_principal {
    font-weight: bold;
    font-size: 60px
}
</style>

