<template>
    <div>

        <DineroPrincipalComponent/>
        <!--
        <DineroMonedasComponent/>
        <cards-component/>
        <historial-component/>
        -->
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
