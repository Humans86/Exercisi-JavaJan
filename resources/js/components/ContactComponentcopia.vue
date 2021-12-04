<template>
<div class="col-8 offset-2">
  <div class="card">
    <div class="class_header">
     <img src="/images/contact.jpg" class="logo_200 mx-auto d-block " alt="">
    </div>
    <div class="card_body">
      <div class="input-group">
      <div class="input-group-prepend">
         <span class="input-group-text" id="">Nom</span>
      </div>
  <input type="text" class="form-control" v-model="name">
      </div>

    <div class="input-group mt-3">
      <div class="input-group-prepend">
         <span class="input-group-text" id="">Cognom</span>
      </div>
  <input type="text" class="form-control" v-model="surname">
      </div>

      <div class="input-group mt-3">
      <div class="input-group-prepend">
         <span class="input-group-text" id="">Email</span>
      </div>
  <input type="email" class="form-control" v-model="email">
      </div>

       <div class="input-group mt-3">

  <textarea class="form-control" placeholder="Comentaris" v-model="content"></textarea>
      </div>
      <button  @click="saveContact" class="btn-btn-primary float-right mt-3 btn-lg">Enviar</button>
    </div>
    </div>
  </div>
</template>
<script>

export default {

data(){
        return {
          form:{
           name:" ",
           surname:" ",
           email:"",
           content: " ",
                
                }
                }     
      },
  created(){

 
  },
    methods: {
   onSubmit(){
          if(!this.formValid) return

           axios
           .post("/api/contact",{
              name: this.$v.form.name.$model,
              surname: this.$v.form.surname.$model,
              email: this.$v.form.email.$model,
              message: this.$v.form.content.$model,
             // phone: this.$v.form.phone.$model
           }) 
    },
    }
};
</script>