<template>
    <b-container>
        <b-modal
            v-model="modal_show"
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
                <div>
                    <b-button @click="cerrar_modal" variant="secondary"> volver</b-button>
                    <b-button @click="modificar_detalles" variant="warning"> Editar Detalles</b-button>
                    <b-button @click="ver_cambios" variant="transparent">
                        <b-icon icon="clock-history" font-scale="2.0" variant="dark"></b-icon>
                    </b-button>
                </div>
            </template>
            <editar_detalles_mov-component :modal2="modal_2" :info_item="info_movimiento" @default_modal2_event="cerrar_modal_2"/>
            <historial_cambios :info_item="info_movimiento" :modal3="modal_3" @default_modal3_event="cerrar_modal_3"/>
        </b-modal>
    </b-container>
</template>

<script>
import Editar_detalles_mod from "./editar_detalles_mod";
import Historial_cambios from "./historial_cambios";

export default {
    name: "detalles_movComponent",
    components: {Historial_cambios, Editar_detalles_mod},
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
            fecha_DMY: null,
            fecha_HMS: null,

            //modal editar registro
            modal_2: false,
            info_movimiento: [],

            //modal ver historial cambios
            modal_3: false,
        }
    },
    mounted() {
        console.log("******************** mounted Hijo *******************");
    },
    methods: {
        cerrar_modal() {
            const data_Modal = this.default_modal;
            this.$emit('default_modal_event', data_Modal);
        },
        cerrar_modal_2(valor) {
            this.modal_2 = valor;
        },
        cerrar_modal_3(valor) {
            this.modal_3 = valor;
        },
        date_format() {
            const fecha_all = new Date(this.mov_item.created_at);
            this.fecha_DMY = fecha_all.toLocaleDateString();
            this.fecha_HMS = fecha_all.toLocaleTimeString();
        },
        modificar_detalles() {
            this.modal_2 = true;
            this.info_movimiento = this.mov_item;
        },
        ver_cambios() {
            this.modal_3 = true;
            this.info_movimiento = this.mov_item;
        }

    },
    computed: {}
}
</script>

<style scoped>

</style>
