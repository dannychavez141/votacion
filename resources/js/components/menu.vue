
<template>
    <div class="container">
        <div class="row justify-content-center">

                     <div class="text-center">
          <h1>SISTEMA DE VOTACION VIRTUAL CCPU</h1>
          <img src="img/logo.png" alt />
        </div>

        </div>
    </div>
</template>
<script>
export default {
  data() {
    return {
      modo: 1,

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
