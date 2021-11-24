<template>
<div class="col-8 offset-2">
  <div class="card">
    <div class="class_header">
      Formulari de Contacte
    </div>
    <div class="card_body">
      <div class="input-group">
      <div class="input-group-prepend">
         <span class="input-group-text" id="">Nom</span>
      </div>
  <input type="text" class="form-control">
      </div>

    <div class="input-group mt-3">
      <div class="input-group-prepend">
         <span class="input-group-text" id="">Cognom</span>
      </div>
  <input type="text" class="form-control">
      </div>

      <div class="input-group mt-3">
      <div class="input-group-prepend">
         <span class="input-group-text" id="">Email</span>
      </div>
  <input type="email" class="form-control">
      </div>

       <div class="input-group mt-3">

  <textarea class="form-control" placeholder="Comentaris"></textarea>
      </div>
      <button type="button" class="btn-btn-primary float-right mt-3 btn-lg">Enviar</button>
    </div>
    </div>
  </div>
</template>
<script>

export default {

  created(){

 
  },
    methods: {
         
   saveContact:function() {
     return;
          }
    },
    data: function() {
        return {
            postSelected: "",
            post: ""
                
                };
                }
};
</script>