<template>
    <div>
        <b-modal v-model="modal2"
                 size="lg"
                 scrollable
                 centered
                 busy
                 hide-header-close
                 no-close-on-backdrop
                 no-close-on-esc
                 @show="date_format">

            <!-- Encabezado & fecha -->
            <b-row align-h="center">
                <b-col cols="8">
                    <h2> Editar informacion del registro </h2>
                </b-col>
                <b-col cols="auto">
                    <h4>Fecha</h4>
                    <p class="texto-deshabilitado"> {{ fecha_DMY }} <br> {{ fecha_HMS }} <i
                        class="fas fa-lock text-dark fa-x4"></i></p>
                </b-col>
            </b-row>

            <!-- Titulo & monto (if: deposito, else: retiro) -->
            <b-row>
                <b-col cols="8">
                    <b-card class="m-2"
                            title="Titulo"
                            align="center">
                        <b-form-group id="titulo_2"
                                      label=""
                                      label-for="input-titulo_2"
                                      description="">
                            <b-form-input
                                id="input-titulo_2"
                                v-model="titulo"
                                :state="titulo_estado_2"
                                type="text"
                                aria-describedby="input-live-feedback_2"
                                placeholder="Titular del movimiento"
                                required
                            ></b-form-input>
                            <b-form-invalid-feedback id="input-live-feedback_2">
                                Ingresa al menos 10 caracteres
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </b-card>

                </b-col>
                <b-col cols="4">
                    <b-card
                        title="Monto"
                        class="m-2"
                        align="center">
                        <b-card-text class="texto-deshabilitado">
                            <h4>
                                <b v-if="info_item.tipo_movimiento" class="text-success"> $ +{{
                                        info_item.monto
                                    }} </b>
                                <b v-else class="text-danger"> $ -{{ info_item.monto }} </b>
                                <i class="fas fa-lock text-dark"></i>
                            </h4>
                        </b-card-text>
                    </b-card>


                </b-col>
            </b-row>

            <!-- Descripcion & img -->
            <b-row>
                <b-col cols="8">
                    <b-card class="m-2 justify-content-center"
                            title="Descripcion"
                            align="center">
                        <b-form-textarea id="descripcion"
                                         label="Descripcion"
                                         label-for="input-descripcion"
                                         v-model="descripcion"
                                         placeholder="Ingresa una descripcion a tu movimiento de al menos 10 caracteres"
                                         rows="4"
                                         size="sm"
                                         :state="descripcion_estado_2"
                                         required>
                        </b-form-textarea>

                    </b-card>
                </b-col>
                <b-col cols="4">
                    <b-card class="m-2"
                            align="center"
                            title="Imagen">
                        <b-form-group id="imagen"
                                      label=""
                                      label-for="input-imagen"
                                      description="">
                            <b-form-file class="input_imagen"
                                         accept=".jpg, .png, .gif"
                                         id="input-imagen"
                                         v-model="imagen"
                                         placeholder="img file"
                                         browse-text="Explorar"
                            ></b-form-file>

                        </b-form-group>
                    </b-card>
                </b-col>
            </b-row>

            <template #modal-footer>
                <div>
                    <b-button @click="cerrar_modal" variant="danger"> Cancelar</b-button>
                    <b-button v-if="titulo_length &&
                              descripcion_length"
                              @click="agregar_cambios"
                              variant="success">
                        Aplicar Cambios
                    </b-button>
                    <b-button v-else
                              disabled
                              @click="agregar_cambios"
                              variant="success">
                        Aplicar Cambios
                    </b-button>
                </div>

            </template>
        </b-modal>
    </div>

</template>

<script>
export default {
    name: "editar_detalles_mod",
    props: {
        info_item: {
            default: "Ocurrio un error al trae los datos desde el padre",
            required: false,
        },
        modal2: {
            default: "Ocurrio un error",
            required: false,
        }
    },
    data: () => {
        return {
            default_modal: false,
            titulo_length: false,
            descripcion_length: false,

            error: false,
            error_msj: "error desde: editar_detalles_mod.vue",

            /** Informacion del movimiento **/
            //NO MODIFICABLE
            fecha_DMY: "",
            fecha_HMS: "",
            //MODIFICABLE
            titulo: "",
            descripcion: "",
            imagen: null,
            tipo_movimiento: "",
            editado: "",

        }
    },
    mounted() {
        console.log("******* mounted Hijo editar detalles");
    },
    methods: {
        test() {
            console.log("*****");
        },
        cerrar_modal() {
            const data_Modal = this.default_modal;
            this.$emit('default_modal2_event', data_Modal);
        },
        guardar_cambios() {
            console.log("cambios hechos");

            //ultimo paso
            this.cerrar_modal();
        },
        date_format() {
            const fecha_all = new Date(this.info_item.created_at);
            this.fecha_DMY = fecha_all.toLocaleDateString();
            this.fecha_HMS = fecha_all.toLocaleTimeString();

            this.tipo_movimiento = this.info_item.tipo_movimiento;
        },
        validar_length() {
            if (this.descripcion.length <= 9) {
                this.descripcion_length = false;
                this.titulo_length = false;
            } else {
                this.descripcion_length = true;
                this.titulo_length = true;
            }
        },
        agregar_cambios() {
            this.editado = true;
            if (this.descripcion_length && this.titulo_length) {
                const params = {
                    id_mov_original_upd: this.info_item.id,
                    monto_upd: this.info_item.monto,
                    titulo_upd: this.titulo,
                    descripcion_upd: this.descripcion,
                    imagen_upd: this.imagen,
                    tipo_movimiento_upd: this.info_item.tipo_movimiento,
                    editado_upd: this.editado
                };
                console.log(params);
                axios
                    .put(`/movimientos/${this.info_item.id}`, params)
                    .then((response) => {
                        this.error = false;
                        const respuesta = response.data;
                        console.log(respuesta);
                    })
                    .catch(error => {
                        this.error = true;
                        console.log(error);
                    })
                    .finally(() => {
                        this.error = false;
                        this.cerrar_modal();
                    });
                //peticion axios que guarda el cambio en una tabla y los acumula por su id
                axios
                    .post("/movimientos_historial", params)
                    .then((response) => {
                        const respuesta = response.data;
                        console.log(respuesta);
                    })
                    .catch(error => {
                        this.error = true;
                        console.log(error);
                    })
                    .finally(() => {
                        this.error = false;
                    })
            } else {
                this.error = true;
                console.log(this.error_msj);
            }

        },
    },
    computed: {
        //validacion de la cantidad de caracteres de el campo titulo del formulario
        titulo_estado_2() {
            if (this.titulo.length <= 9) {
                return false;
            }
        },
        descripcion_estado_2() {
            this.validar_length();
            if (this.descripcion.length <= 9) {
                return false;
            }
        }
    }
}
</script>

<style scoped>
.texto-deshabilitado {
    opacity: 0.4;
}
</style>
