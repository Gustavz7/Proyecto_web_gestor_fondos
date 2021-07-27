<template>
    <div>
        <b-card
            bg-variant="light"
            text-variant="dark"
            title=""
            style="width: 16rem; height: 25rem;"
            img-src="https://i.postimg.cc/kG26zRKK/retirar.png"
            img-top
            img-alt="Card image"
            img-width="160px"
            img-height="230px"
            class="mb-2"
            body-class="text-center">
            <b-card-text>Retirar una cantidad de dinero desde tu fondo principal</b-card-text>
            <b-button class="text-dark" href="#" variant="outline-warning"
                      @click="modalShow = !modalShow"> Retirar Dinero
            </b-button>
        </b-card>
        <b-modal class="justify-content-center"
                 title="Retirar dinero"
                 v-model="modalShow"
                 size="lg"
                 centered

                 cancel-title="cancelar retiro"
                 cancel-variant="danger"

                 ok-title="retirar dinero"
                 ok-variant="success"
        >
            <b-form>
                <b-row>
                    <b-col>
                        <b-form-group id="monto"
                                      label="ingresa el monto"
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
    </div>
</template>

<script>
export default {
    name: "Card-RetirarDinero",
    data() {
        return {

            //Datos usados Card & form
            modalShow: false,
            show: true,
            show_retirar_dinero_btn: true,

            //Informacion del movimiento
            titulo: '',
            monto: null,
            descripcion: '',
            imagen: null,
        }
    },
    methods: {

    },
    computed: {
        titulo_estado() {
            return this.titulo.length > 2 ? true : false
        },
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
