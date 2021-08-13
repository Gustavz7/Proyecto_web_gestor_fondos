<template>
    <div>
        <b-modal v-model="modal3"
                 title="Historial cambios del movimiento"
                 size="lg"
                 scrollable
                 centered
                 busy
                 hide-header-close
                 no-close-on-backdrop
                 no-close-on-esc
                 @show="request_modificaciones_mov">

            <!-- Esta carta se mostrá si no hubieron errores en la peticion de datos -->
            <b-card align="center" v-if="modificaciones_data.length === 0">
                <div>
                    <p> Este registro aún no tiene modificaciones</p>
                </div>
            </b-card>
            <b-card align="center" v-else>
                <div class="table-responsive-lg">
                    que honda esta chingada
                    <table class="table table-hover" style="text-align: center">
                        <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Tipo movimiento</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in modificaciones_data" v-bind:key="item.id">
                            <td>{{ item.id }}</td>
                            <td>{{ item.titulo }}</td>
                            <td>{{ item.created_at }}</td>
                            <td>
                                <div>
                                    <b-icon
                                        v-if="item.tipo_movimiento"
                                        icon="circle-fill"
                                        variant="success"
                                        font-scale="1"
                                    ></b-icon>
                                    <b-icon
                                        v-else
                                        icon="circle-fill"
                                        variant="danger"
                                        font-scale="1"
                                    ></b-icon>
                                </div>
                            </td>
                            <td>{{ item.monto }}</td>
                            <td>
                                <b-link href="#"
                                        @click="info_modificacion(item);"> Ver Detalles
                                </b-link>
                            </td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </b-card>

            <template #modal-footer>
                <b-button @click="cerrar_modal" variant="secondary"> Volver</b-button>
                <b-button @click="refrescar" variant="primary"> Refrescar</b-button>
            </template>
        </b-modal>
        <ver_detalle_cambio :modal_4="modal_4" :data_item="data_item" @default_modal4_event="cerrar_modal4"/>
    </div>
</template>

<script>
import Ver_detalle_cambio from "./ver_detalle_cambio";

export default {
    name: "historial_cambios",
    components: {Ver_detalle_cambio},
    props: {
        info_item: {
            default: "Ocurrio un error al trae los datos desde el padre",
            required: false,
        },
        modal3: {
            type: Boolean,
            required: true,
        }
    },
    data: () => {
        return {
            default_modal: false,
            modificaciones_data: [],

            //datos que seran trasasdos al hijo (ver_detalles_cambio.vue)
            data_item: [],
            modal_4: false,
        }
    },
    mounted() {
    },
    methods: {
        request_modificaciones_mov() {
            const id_mov = this.info_item.id;
            axios
                .get(`/movimientos_historial/${id_mov}`)
                .then((response) => {
                    this.modificaciones_data = response.data;
                    this.data_state = this.modificaciones_data.length
                    console.log(this.modificaciones_data);
                    console.log(this.modificaciones_data.length)
                })

        },
        cerrar_modal() {
            const data_Modal = this.default_modal;
            this.$emit('default_modal3_event', data_Modal);
        },

        refrescar() {
            this.request_modificaciones_mov();
        },
        /* esta funcion ejecutara cuando se precione el boton "ver detalles" en el lado
    derecho de cada registro que renderiza este componente */

        //abrir modal 4
        info_modificacion(item) {
            this.data_item = item;
            this.modal_4 = true;
        },
        //cerrar modal 4
        cerrar_modal4(arg) {
            this.modal_4 = arg;
        },
    }
}
</script>

<style scoped>
a:link, a:visited {
    color: #0018ff;
}

a:hover, a:active {
    background-color: transparent;
}
</style>
