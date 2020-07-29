<template>
  <div class="container" style="padding: 0em;">
    <div class="row justify-content-center" style="padding: 0em;">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="table-responsive">
              <table class="table">
                <tr align="center">
                  <td>
                    <button type="button" class="btn btn-primary" @click="verformulario(2)">
                      CONTADORES
                      <img src="img/persona.png" alt width="50re" height="50re" />
                    </button>
 <button type="button" class="btn btn-primary" @click="verformulario(3)">
                      PUESTOS
                      <img src="img/puesto.jpg" alt width="50re" height="50re" />
                    </button>
                    <button type="button" class="btn btn-primary" @click="verformulario(4)">
                      PARTIDOS
                      <img src="img/cont.png" alt width="50re" height="50re" />
                    </button>

                    <button type="button" class="btn btn-primary" @click="verformulario(5)">
                      ELECCIONES
                      <img src="img/voto.jpg" alt width="50re" height="50re" />
                    </button>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="card-body">
            <div class="col-md-12">
                 <menuprincipal v-if="modo==1"></menuprincipal>
                <contadores v-if="modo==2"></contadores>
                <contadores v-if="modo==3"></contadores>
                <contadores v-if="modo==4"></contadores>
                <contadores v-if="modo==5"></contadores>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      busq: "",
      datos: [],
      urlg: "contadores",
      modo: 1,
      dato: [],
      temp: [],
      estados: [],
      estado: [],
      config: {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      },
      pagination: {
        total: 0,
        current_page: 0,
        per_page: 0,
        last_page: 0,
        from: 0,
        to: 0,
      },
      errors: "",
      offset: 3,
    };
  },
  methods: {
    verformulario(id) {
      this.modo = id;
      console.log(this.modo);
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
  created() {},
};
</script>
