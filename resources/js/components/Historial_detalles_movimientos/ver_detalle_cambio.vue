<template>
    <b-container>
        <b-modal
            v-model="modal_4"
            size="lg"
            scrollable
            centered
            busy
            hide-header-close
            no-close-on-backdrop
            no-close-on-esc
            @show="date_format"
        >
            <!-- Encabezado & fecha -->
            <b-row>
                <b-col cols="8">
                    <h1 class="text-left"> Detalles del movimiento </h1>
                </b-col>
                <b-col cols="2">
                    <h5> Fecha: </h5>
                    <p> {{ fecha_DMY }} <br> {{ fecha_HMS }}</p>
                </b-col>
            </b-row>
            <!-- Titulo & monto (if: deposito, else: retiro) -->
            <b-row>
                <b-col cols="8">
                    <b-card class="m-2"
                            align="center">
                        <p>{{ data_item.titulo }}</p>
                    </b-card>

                </b-col>
                <b-col cols="4">
                    <b-card v-if="data_item.tipo_movimiento"
                            class="m-2"
                            text-variant="success"
                            align="center">
                        <b-card-text><h4><b> $ +{{ data_item.monto }} </b></h4></b-card-text>
                    </b-card>
                    <b-card v-else
                            class="m-2"
                            text-variant="danger"
                            align="center">
                        <b-card-text><h4><b>$ -{{ data_item.monto }} </b></h4></b-card-text>
                    </b-card>
                </b-col>
            </b-row>
            <!-- Descripcion & img -->
            <b-row>
                <b-col cols="8">
                    <b-card class="m-2 justify-content-center"
                            align="center"
                    >
                        <p>{{ data_item.descripcion }}</p>
                    </b-card>
                </b-col>
                <b-col cols="4">
                    <b-card class="m-2"
                            align="center">
                        <b-img thumbnail fluid src="https://picsum.photos/250/250/?image=54" alt="Image 1"></b-img>
                    </b-card>
                </b-col>
            </b-row>
            <template #modal-footer>
                <div>
                    <b-button @click="cerrar_modal4" variant="secondary"> volver</b-button>
                </div>
            </template>
        </b-modal>
    </b-container>
</template>

<script>
export default {
    name: "ver_detalle_cambio",
    props:{
        modal_4:{},
        data_item:{}
    },
    data: () => {
        return {
            fecha_DMY: "",
            fecha_HMS: "",
        }
    },
    mounted() {
    },
    methods: {
        cerrar_modal4() {
            this.$emit('default_modal4_event', false);
        },
        date_format() {
            const fecha_all = new Date(this.data_item.created_at);
            this.fecha_DMY = fecha_all.toLocaleDateString();
            this.fecha_HMS = fecha_all.toLocaleTimeString();
        },
    },
    computed: {

    }
}
</script>

<style scoped>

</style>
