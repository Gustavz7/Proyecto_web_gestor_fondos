<template>
    <b-card
        border-variant="success"
        text-variant="dark"
        style="
            max-width: 16rem;
            max-height: 25rem;
            min-width: 16rem;
            min-height: 25rem;"
        img-src="https://i.postimg.cc/fRN7t5YP/depositar.png"
        img-top
        img-alt="Card image"
        img-width="160px"
        img-height="230px"
        class="m-2"
        body-class="text-center">
        <b-card-text>{{ card_subTitle }}</b-card-text>

        <!-- Seccion del modal -->
        <b-button class="text-dark" href="#" variant="outline-success"
                  @click="modalShow = !modalShow"> Agregar Dinero
        </b-button>
        <b-modal class="justify-content-center"
                 title="Depositar dinero"
                 v-model="modalShow"
                 size="lg"
                 centered
                 cancel-title="cancelar deposito"
                 cancel-variant="danger"
                 ok-title="depositar dinero"
                 ok-variant="success"
                 @cancel="limpiar_form_add"
                 @ok="crear_store_movimiento_add"
        >
            <b-form>
                <b-row>
                    <b-col>
                        <b-form-group id="monto"
                                      label="ingresa el monto a Depositar"
                                      label-for="input-monto"
                                    >
                            <b-form-input
                                id="input-monto"
                                v-model="monto"
                                :state="monto_estado"
                                type="number"
                                aria-describedby="input-live-monto"
                                placeholder="CLP"
                                required
                            ></b-form-input>
                            <b-form-invalid-feedback id="input-live-monto">
                                No puedes ingresar montos nulos, iguales o inferiores a 0
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col>
                        <b-form-group id="titulo"
                                      label="Titulo"
                                      label-for="input-titulo"
                                      description="">
                            <b-form-input
                                id="input-titulo"
                                v-model="titulo"
                                :state="titulo_estado"
                                type="text"
                                aria-describedby="input-live-feedback"
                                placeholder="Titular del movimiento"
                                required
                            ></b-form-input>
                            <b-form-invalid-feedback id="input-live-feedback">
                                Ingresa al menos 10 caracteres
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col>
                        <b-form-textarea id="descripcion"
                                         label="Descripcion"
                                         label-for="input-descripcion"
                                         v-model="descripcion"
                                         placeholder="Ingresa una descripcion a tu movimiento de al menos 10 caracteres"
                                         rows="4"
                                         size="sm"
                                         :state="descripcion_estado"
                                         required >
                        </b-form-textarea>
                    </b-col>
                    <b-col>
                        <b-form-group id="imagen"
                                      label-for="input-imagen"
                                      >
                            <b-form-file class="input_imagen"
                                         accept=".jpg, .png, .gif"
                                         id="input-imagen"
                                         v-model="imagen"
                                         placeholder="ingresar imagen"
                                         browse-text="Explorar"
                            ></b-form-file>
                        </b-form-group>
                    </b-col>
                </b-row>

            </b-form>
        </b-modal>
    </b-card>

</template>

<script>
export default {
    name: "Card-agregarDinero",
    data() {
        return {
            //card-config
            card_subTitle: "te permite agregar una suma de dinero en tu fondo principal",

            //modal-config
            modalShow: false,
            show: true,
            show_retirar_dinero_btn: true,

            //Informacion del movimiento
            titulo: "",
            monto: null,
            descripcion: "",
            imagen: null,
            tipo_movimiento: true, //#true(1)=Deposito #False(0)=Retiro
            editado: false
        }
    },
    methods: {
        //encapsulamiento de los datos y envio con axios post
        crear_store_movimiento_add() {
            console.log("hola, test");
            const info_movimiento = {
                monto_front: this.monto,
                titulo_front: this.titulo,
                descripcion_front: this.descripcion,
                imagen_front: this.imagen,
                tipo_movimiento_front: this.tipo_movimiento,
                editado_front: this.editado
            };
            axios
            .post('/add_movimiento', info_movimiento)
            .then((response) => {
                console.log(response.data);
            })
            .finally(() => {
                    this.limpiar_form_add;
                })
        },
        limpiar_form_add() {
            this.titulo = "";
            this.monto = 0;
            this.descripcion = "";
            this.imagen = null;
        }
    },
    computed: {
        //validacion de la cantidad de caracteres de los campos del formulario
        titulo_estado() {
            if (this.titulo.length < 10) {
                return false;
            }
        },
        monto_estado() {
            if (this.monto < 0 || this.monto == 0 || this.monto == null) {
                return this.show_retirar_dinero_btn = false
            } else {
                return this.show_retirar_dinero_btn = true
            }
        },
        descripcion_estado() {
            if (this.descripcion.length < 10) {
                return false;
            }

        },
    },
    mounted() {

    }
}
</script>

<style scoped>

</style>
