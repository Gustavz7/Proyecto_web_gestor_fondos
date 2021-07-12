<template>
    <div>
        <b-navbar toggleable="lg" type="light" variant="light">
            <b-navbar-brand href="/home">Gestor de Fondos v0.1</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item href="#">About</b-nav-item>
                </b-navbar-nav>

                <b-navbar-nav class="ml-auto">
                    <b-nav-item-dropdown right>
                        <template #button-content>
                            <em>User</em>
                        </template>
                        <b-dropdown-item href="#">Profile</b-dropdown-item>
                        <b-dropdown-item href="#">Sign Out</b-dropdown-item>
                    </b-nav-item-dropdown>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
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
