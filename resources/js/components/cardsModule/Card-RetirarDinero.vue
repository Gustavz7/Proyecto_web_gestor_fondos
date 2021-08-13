<template>
    <b-card
        border-variant="danger"
        bg-variant=""
        text-variant="dark"
        title=""
        style="
            max-width: 16rem;
            max-height: 25rem;
            min-width: 16rem;
            min-height: 25rem;"
        img-src="https://i.postimg.cc/kG26zRKK/retirar.png"
        img-top
        img-alt="Card image"
        img-width="160px"
        img-height="230px"
        class="m-2"
        body-class="text-center">
        <b-card-text> {{card_subTitle}}</b-card-text>
        <b-button class="text-dark" href="#" variant="outline-danger"
                  @click="modalShow = !modalShow"> Retirar Dinero
        </b-button>
        <b-modal class="justify-content-center"
                 title="Retirar dinero"
                 v-model="modalShow"
                 size="lg"
                 centered
                 cancel-title="cancelar retiro"
                 cancel-variant="danger"
                 ok-title="retirar dinero"
                 ok-variant="success"
                 @cancel="limpiar_form_retiro"
                 @ok="crear_store_movimiento"

        >
            <b-form>
                <b-row>
                    <b-col>
                        <b-form-group id="monto"
                                      label="ingresa el monto a retirar"
                                      label-for="input-monto"
                                      description="">
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
                                         :state="descripcion.length >= 10"
                                         required

                        >
                        </b-form-textarea>
                    </b-col>
                    <b-col>
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
                    </b-col>
                </b-row>
            </b-form>
        </b-modal>
    </b-card>

</template>

<script>
export default {
    name: "Card-RetirarDinero",
    data() {
        return {
            //card-config
            card_subTitle: "Te permite retirar una cantidad de dinero desde tu fondo principal",

            //Datos usados Card & form
            modalShow: false,
            show: true,
            show_retirar_dinero_btn: true,

            //Informacion del movimiento
            titulo: '',
            monto: null,
            descripcion: '',
            imagen: null,
            tipo_movimiento: false,
            editado: false
        }
    },
    methods: {
        //encapsulamiento de los datos y envio con axios post
        crear_store_movimiento() {
            const info_movimiento = {
                monto_front: this.monto,
                titulo_front: this.titulo,
                descripcion_front: this.descripcion,
                imagen_front: this.imagen,
                tipo_movimiento_front: this.tipo_movimiento,
                editado_front: this.editado
            };
            axios.post('/add_movimiento', info_movimiento).then((response) => {
                //const info_recibida = response.data;
                console.log(response.data);
                //this.$emit('addinfo', info_recibida);
            });
            this.titulo = '';
            this.monto = null;
            this.descripcion = '';
            this.imagen = null;
        },
        limpiar_form_retiro() {
            this.titulo = '';
            this.monto = null;
            this.descripcion = '';
            this.imagen = null;
        }
    },
    computed: {
        //validacion de la cantidad de caracteres de el campo titulo del formulario
        titulo_estado() {
            if (this.titulo.length < 10) {
                return false;
            }
        },

        //validacion del campo monto del formulario
        monto_estado() {
            if (this.monto < 0 || this.monto == 0 || this.monto == null) {
                return this.show_retirar_dinero_btn = false
            } else {
                return this.show_retirar_dinero_btn = true
            }
        }
    }
}
</script>

<style scoped>
.input_imagen {

}
</style>
