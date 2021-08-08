<template>
    <b-container>
        <div class="row  justify-content-around">
            <DineroPrincipalComponent class="col-8"/>
            <DineroMonedasComponent class="col-4"/>
        </div>
        <div class="row justify-content-center mt-5">
            <cards-component/>
        </div>
        <div class="row justify-content-center mt-5">
            <historial-component/>
        </div>
    </b-container>
</template>

<script>
import DineroPrincipalComponent from "./DineroPrincipalComponent";
import DineroMonedasComponent from "./DineroMonedasComponent";
import HistorialComponent from "./HistorialComponent";
import CardsComponent from "./CardsComponent";
export default {
    name: "HomeComponent",
    components: {CardsComponent, HistorialComponent, DineroMonedasComponent, DineroPrincipalComponent},
    mounted(){

    },
    data: () => {
        return{

        }
    },
    methods:{

    },
    computed:{

    }
}
</script>

<style scoped>

</style>
