<template>
  <div class="container">
    <h1 class="text-left">Historial de tus movimientos</h1>

    <!-- Esta carta se mostrá cuando hay errores en la consulta -->
    <b-card v-if="error" align="center">
      <b-card-text> No se pudieron cargar los datos</b-card-text>

      <b-button variant="primary" @click="request_movimientos">
        Reintentar
        <b-icon icon="arrow-clockwise" variant="light"> </b-icon>
      </b-button>
    </b-card>
    <!-- Esta carta se mostrá si no hubieron errores en la peticion de datos -->
    <b-card v-else align="center">
      <b-overlay :show="loading" rounded="sm">
        <div class="table-responsive-sm">
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
              <tr v-for="item in movimientos_data" v-bind:key="item.id">
                <td>{{ item.id }}</td>
                <td>{{ item.titulo }}</td>
                <td>{{ item.created_at}}</td>
                <td>{{ item.monto }}</td>

                <td>
                  <div>
                    <b-icon
                      v-if="item.tipo_movimiento"
                      icon="circle-fill"
                      variant="success"
                      animation="throb"
                      font-scale="1"
                    ></b-icon>
                    <b-icon
                      v-else
                      icon="circle-fill"
                      variant="danger"
                      animation="throb"
                      font-scale="1"
                    ></b-icon>
                  </div>
                </td>
                <td>
                  <b-link
                    href="#"
                    @click="
                      modalShow = !modalShow;
                      info_movimiento(item);
                    "
                  >
                    Ver más</b-link
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <b-card-footer>
          <b-button variant="primary" @click="request_movimientos"
            >Cargar más</b-button
          >
        </b-card-footer>
      </b-overlay>
    </b-card>
    <!-- Seccion del modal que muestra la informacion completa del movimiento (componente hijo) -->
    <detalles_mov-component
      :mov_item="item_movimiento"
      :modal_show="modalShow"
      @default_modal_event="iniciar_Modal"
    />
  </div>
</template>

<script>
import Detalles_movComponent from "./Historial_detalles_movimientos/detalles_movComponent";

export default {
  name: "HistorialComponent",
  components: { Detalles_movComponent },
  data: () => {
    return {
      loading: true,
      error: false,
      alert: false,
      error_mjs: "",
      retry_btn: false,
      movimientos_data: [],
      modalShow: false,

      //datos item consultado
      item_movimiento: [],
      created_at: "example",
    };
  },
  mounted() {
    this.request_movimientos();
  },
  methods: {
    request_movimientos() {
      axios
        .get("/movimientos")
        .then((response) => {
          this.alert = false;
          this.loading = true;
          this.error = false;
          this.movimientos_data = response.data;
        })
        .catch((error) => {
          this.error_msj = error;
          this.alert = true;
          this.error = true;
          this.retry_btn = true;
        })
        .finally(() => {
          this.loading = false;
        });
    },
    iniciar_Modal(valor) {
      this.modalShow = valor;
    },
    info_movimiento(item) {
      this.item_movimiento = item;
    },
  },
  computed: {

  }
};
</script>

<style scoped>
</style>
