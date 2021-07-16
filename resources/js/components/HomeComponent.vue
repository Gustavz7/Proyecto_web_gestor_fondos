<template>
    <div>
        <div class="row justify-content-center">
            <DineroPrincipalComponent class="col-auto"/>
            <DineroMonedasComponent class="col-auto"/>
        </div>
        <div class="row justify-content-center mt-5">
            <cards-component/>
        </div>
        <div class="row justify-content-center mt-5">
            <historial-component/>
        </div>
    </div>
</template>

<script>
import DineroPrincipalComponent from "./DineroPrincipalComponent";
import DineroMonedasComponent from "./DineroMonedasComponent";
import HistorialComponent from "./HistorialComponent";
export default {
    name: "HomeComponent",
    components: {HistorialComponent, DineroMonedasComponent, DineroPrincipalComponent},
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
