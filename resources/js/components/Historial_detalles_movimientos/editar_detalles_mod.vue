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
            <b-row>
                <b-col cols="8">
                    <h1 class="text-left"> Editar informacion del registro </h1>
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
                        <b-form-group id="titulo_2"
                                      label="Titulo"
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
                    <b-card v-if="info_item.tipo_movimiento"
                            class="m-2"
                            text-variant="success"
                            align="center">
                        <b-card-text><h4><b> $ +{{ info_item.monto }} </b></h4></b-card-text>
                    </b-card>
                    <b-card v-else
                            class="m-2"
                            text-variant="danger"
                            align="center">
                        <b-card-text><h4><b>$ -{{ info_item.monto }} </b></h4></b-card-text>
                    </b-card>
                </b-col>
            </b-row>

            <!-- Descripcion & img -->
            <b-row>
                <b-col cols="8">
                    <b-card class="m-2 justify-content-center"
                            align="center">
                        <b-form-textarea id="descripcion"
                                         label="Descripcion"
                                         label-for="input-descripcion"
                                         v-model="descripcion"
                                         placeholder="Ingresa una descripcion a tu movimiento de al menos 10 caracteres"
                                         rows="4"
                                         size="sm"
                                         :state="descripcion.length >= 10"
                                         required>
                        </b-form-textarea>

                    </b-card>
                </b-col>
                <b-col cols="4">
                    <b-card class="m-2"
                            align="center">
                        <b-form-group id="imagen"
                                      label=""
                                      label-for="input-imagen"
                                      description="">
                            <b-form-file class="input_imagen"
                                         accept=".jpg, .png, .gif"
                                         id="input-imagen"
                                         v-model="imagen"
                                         placeholder="ingresar imagen"
                                         browse-text="Explorar"
                            ></b-form-file>

                        </b-form-group>
                    </b-card>
                </b-col>
            </b-row>

            <template #modal-footer>
                <div>
                    <b-button @click="cerrar_modal" variant="danger"> Cancelar</b-button>
                    <b-button @click="" variant="success"> Aplicar Cambios</b-button>
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

            //MODIFICABLE

            //NO MODIFICABLE
            //fechas
            fecha_DMY: "",
            fecha_HMS: "",

            //Informacion del movimiento
            titulo: '',
            descripcion: '',
            imagen: null,
            editado: false,

        }
    },
    mounted() {
        console.log("******* mounted Hijo editar detalles");
    },
    methods: {
        test() {
            console.log("***** methods Hijo editar detalles ");
            console.log(this.info_item);
            console.log(this.modal2);

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
        },
    },
    computed: {
        //validacion de la cantidad de caracteres de el campo titulo del formulario
        titulo_estado_2() {
            if (this.titulo.length < 10) {
                return false;
            }
        },
    }

}
</script>

<style scoped>

</style>
