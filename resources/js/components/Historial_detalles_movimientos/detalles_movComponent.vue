<template>
    <b-container>
        <b-modal
            v-model="modal_show"
            size="lg"
        >
            <!-- Encabezado & fecha -->
            <b-row>
                <b-col cols="8">
                    <h1 class="text-left"> Detalles del movimiento </h1>
                </b-col>
                <b-col cols="2">
                    <h5> Fecha: </h5>
                    <p> {{fecha_DMY}} </p>
                    <p> {{fecha_HMS}} </p>
                </b-col>
            </b-row>
            <!-- Titulo & monto (if: deposito, else: retiro) -->
            <b-row>
                <b-col cols="8">
                    <b-card class="m-2"
                            align="center">
                        <p>{{ mov_item.titulo }}</p>
                    </b-card>

                </b-col>
                <b-col cols="4">
                    <b-card v-if="mov_item.tipo_movimiento"
                            class="m-2"
                            text-variant="success"
                            align="center">
                        <b-card-text><h4><b> $ +{{ mov_item.monto }} </b></h4></b-card-text>
                    </b-card>
                    <b-card v-else
                            class="m-2"
                            text-variant="danger"
                            align="center">
                        <b-card-text><h4><b>$ -{{ mov_item.monto }} </b></h4></b-card-text>
                    </b-card>
                </b-col>
            </b-row>
            <!-- Descripcion & img -->
            <b-row>
                <b-col cols="8">
                    <b-card class="m-2 justify-content-center"
                            align="center"
                    >
                        <p>{{ mov_item.descripcion }}</p>
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
                <b-button @click="emitir_EstadoModal" variant="secondary"> volver</b-button>
                <b-button @click="emitir_EstadoModal" variant="warning"> Editar Detalles</b-button>
            </template>
        </b-modal>
    </b-container>
</template>

<script>
export default {
    name: "detalles_movComponent",
    props: {
        mov_item: {
            default: "Ocurrio un error al trae los datos desde el padre",
            required: false,
        },
        modal_show: {
            type: Boolean,
            required: true,
        }
    },
    data: () => {
        return {
            default_modal: false,

            //fechas DD/MM/YY & HH:MM:SS
            fecha_DMY: "",
            fecha_HMS: "",
        }
    },
    mounted() {
        console.log("******************** mounted Hijo *******************");
    },
    methods: {
        emitir_EstadoModal() {
            const data_Modal = this.default_modal;
            this.$emit('default_modal_event', data_Modal);
            console.log(this.mov_item);
        },
    },
    computed: {
        date_test() {
                console.log("computed hijo funcionando")
                const fecha_all = new Date(this.mov_item.created_at);
                this.fecha_DMY = fecha_all.toLocaleDateString();
                this.fecha_HMS = fecha_all.toLocaleTimeString();
        }
    }
}
</script>

<style scoped>

</style>
