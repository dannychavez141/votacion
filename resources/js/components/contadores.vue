<template>
  <div class="container">

          <div class="card-body" style="padding: 0em;">
            <div class="col-md-12">
              <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <button
                        type="button"
                        class="btn btn-success"
                        @click="verFormulario()"
                      >VER CONTADORES</button>
                      <button
                        class="btn btn-success"
                        type="button"
                        @click="crearFormulario()"
                      >CREAR CONTADOR</button>
                    </div>
                    <div class="card-body" v-if="modoeditar==1">
                      <h2>VER CONTADORES</h2>

                      <div class="row">
                        <div class="col-md-12">
                          <label for>Buscar Contador:</label>
                          <input
                            type="text"
                            v-model="busq"
                            class="form-control"
                            placeholder="Buscar Contador"
                            v-on:keyup="getdatos()"
                          />
                        </div>
                      </div>
                      <br />
                      <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr class="text-center">
                            <th>CODIGO</th>
                            <th>NOMBRES Y APELLIDOS</th>
                            <th>ESTADO</th>
                            <th>ACCION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            class="text-center"
                            v-for="(dato,index) in datos"
                            v-bind:key="index"
                          >
                            <td>{{dato.codMat}}</td>
                            <td>{{dato.nomb+' '+dato.apepa}}</td>
                            <td>
                              {{dato.descrTipoP}}
                            </td>
                            <td>
                              <button
                                @click="editarFormulario(dato)"
                                class="btn btn-warning"
                                type="button"
                              >EDITAR</button>
                            </td>
                          </tr>
                          <tr align="center" v-if="datos.total=0"><td colspan="4"> NO EXISTEN COTADORES REGISTRADOS</td></tr>
                        </tbody>
                      </table>
                      </div>
                      <nav>
                        <ul class="pagination">
                          <li v-if="pagination.current_page > 1">
                            <button type="button" class="btn bg-warning">
                              <a href="#" @click.prevent="changePage(pagination.current_page - 1)">
                                <span>Atras</span>
                              </a>
                            </button>
                          </li>

                          <li v-for="(page,index) in pagesNumber" v-bind:key="index">
                            <button
                              type="button"
                              v-bind:class="[ page == isActived ? 'btn bg-success' : 'btn bg-warning']"
                            >
                              <a href="#" @click.prevent="changePage(page)">{{ page }}</a>
                            </button>
                          </li>

                          <li v-if="pagination.current_page < pagination.last_page">
                            <button type="button" class="btn bg-warning">
                              <a href="#" @click.prevent="changePage(pagination.current_page + 1)">
                                <span>Siguiente</span>
                              </a>
                            </button>
                          </li>
                        </ul>
                      </nav>
                    </div>
                    <form
                      method="POST"
                      v-on:submit.prevent="crearDato"
                      enctype="multipart/form-data"
                    >
                      <div class="card-body" v-if="modoeditar==2">
                        <h2>REGISTRAR CATEGORIA</h2>
                        <label for>Nombre de categoria:</label>
                        <input
                          type="text"
                          v-model="dato['descrTipoP']"
                          class="form-control"
                          value
                          placeholder="Nombre de Categoria"
                          required
                        />
                        <label for>Foto de la Categoria:</label>
                        <input
                          type="file"
                          id="fileC"
                          class="form-control"
                          placeholder="BuscarFoto"
                          required
                        />
                        <br />
                        <center>
                          <button class="btn btn-primary">GUARDAR</button>
                          <button
                            class="btn btn-warning"
                            type="button"
                            @click="verFormulario()"
                          >CANCELAR</button>
                        </center>
                      </div>
                    </form>
                    <form
                      v-on:submit.prevent="modiDato"
                      method="POST"
                      enctype="multipart/form-data"
                    >
                      <div class="card-body" v-if="modoeditar==3">
                        <h2>MODIFICANDO CATEGORIA</h2>
                        <label for>Codigo de categoria:</label>
                        <input
                          type="text"
                          v-model="dato.id"
                          name="id"
                          class="form-control"
                          placeholder="Codigo de Categoria"
                          readonly
                        />
                        <label for>Nombre de categoria:</label>
                        <input
                          type="text"
                          v-model="dato.descrTipoP"
                          name="descrTipoP"
                          class="form-control"
                          placeholder="Nombre de Categoria"
                          required
                        />
                        <label for>Foto de la Categoria:</label>
                        <input
                          type="file"
                          id="fileM"
                          class="form-control"
                          placeholder="Buscar Foto"
                        />
                        <label for>Estado:</label>
                        <select v-model="estado" name="estado" class="form-control">
                          <option v-bind:value="estado">{{estado['descrEst']}}</option>
                          <option
                            v-for="(estado,index) in estados"
                            v-bind:key="index"
                            v-bind:value="estado"
                          >{{estado['descrEst']}}</option>
                        </select>
                        <br />
                        <center>
                          <button class="btn btn-primary">GUARDAR</button>
                          <button
                            class="btn btn-warning"
                            type="button"
                            @click="verFormulario()"
                          >CANCELAR</button>
                        </center>
                      </div>
                    </form>
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
      modoeditar: 1,
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
  computed: {
    isActived: function () {
      return this.pagination.current_page;
    },
    pagesNumber: function () {
      if (!this.pagination.to) {
        return [];
      }
      var from = this.pagination.current_page - this.offset;
      if (from < 1) {
        from = 1;
      }
      var to = from + this.offset * 2;
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }
      var pagesArray = [];
      while (from <= to) {
        pagesArray.push(from);
        from++;
      }
      return pagesArray;
    },
  },
  methods: {
    getdatos: function (page) {
      var urldatos = this.urlg + "/all?page=" + page + "&busq=" + this.busq;
      //  console.log(urldatos);
      axios.get(urldatos).then((response) => {
        console.log(response.data.datos.data);
        (this.datos = response.data.datos.data),
          (this.pagination = response.data.pagination);
      });
    },
    verformulario(id) {
      this.modoeditar = id;
      this.dato = this.temp;
      console.log(this.modoeditar);
    },
    editarFormulario: function (dato) {
      this.modoeditar = 3;
      this.dato = dato;
      for (let i = 0; i < this.estados.length; i++) {
        if (this.estados[i]["id"] == dato["idEst"]) {
          this.estado = this.estados[i];
          console.log(this.estados[i]["id"]);
        }
      }
    },
    modiDato: function () {
      var url = this.urlg + "/" + this.dato.id;
      const modelo = new FormData();
      modelo.append("_method", "put");
      modelo.append("descrMarca", this.dato["descrMarca"]);
      modelo.append("idEst", this.estado["id"]);
      //  console.log(modelo.get('descrTipoP'));
      //   console.log(modelo.get('idEst'));
      axios
        .post(url, modelo, this.config)
        .then((response) => {
          //console.log(response);
          this.getdatos();
          this.verFormulario();
          alert("Marca Modificado con éxito");
          this.errors = [];
        })
        .catch((error) => {
          this.errors = "Corrija para poder editar con éxito";
        });
    },
    crearDato: function () {
      var url = this.urlg;
      var modelo = new FormData();
      modelo.append("descrMarca", this.dato["descrMarca"]);
      // console.log(modelo);
      axios
        .post(url, modelo, this.config)
        .then((response) => {
          // console.log(response);
          this.getdatos();
          this.verFormulario();
          alert("Nueva Marca creada con éxito");
          this.errors = [];
        })
        .catch((error) => {
          this.errors = "Corrija para poder crear con éxito";
        });
    },
    changePage: function (page) {
      this.pagination.current_page = page;
      this.getdatos(page);
    },
    apiestados: function () {
      var urldatos = "estados/all";
      // console.log(urldatos);
      axios.get(urldatos).then((response) => {
        //  console.log("apidatos:");
        //  console.log(response.data);
        this.estados = response.data;
        //   console.log("estados:");
        //console.log(this.estados);
      });
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
  created() {
    this.apiestados();
    this.getdatos();
  },
};
</script>
