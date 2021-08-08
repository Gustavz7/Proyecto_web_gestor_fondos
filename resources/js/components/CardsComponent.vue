<template>
    <div class="row justify-content-center">
        <CardAgregarDinero class="col-sm-auto"/>
        <CardRetirarDinero class="col-sm-auto"/>
        <CardEstadisticas class="col-sm-auto"/>
        <CardEmpty class="col-sm-auto"/>
    </div>
</template>

<script>
import CardEstadisticas from "./cardsModule/Card-estadisticas";
import CardEmpty from "./cardsModule/Card-Empty";
import CardAgregarDinero from "./cardsModule/Card-agregarDinero";
import CardRetirarDinero from "./cardsModule/Card-RetirarDinero";

export default {
    name: "cardsComponent",
    components: {CardRetirarDinero, CardAgregarDinero, CardEmpty, CardEstadisticas},
    data() {
        return {}
    }

}
</script>

<style scoped>


</style>
