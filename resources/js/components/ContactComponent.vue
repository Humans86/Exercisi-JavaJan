<template>
<div class="col-8 offset-2">
  <form @submit.prevent="onSubmit">
  <div class="form-group">
    <label>Name</label>
    <input v-model="form.name" type="text" class="form-control">
  </div>
   <div class="form-group">
    <label>Surname</label>
    <input v-model="form.surname" type="text" class="form-control">
  </div>
   <div class="form-group">
    <label>Email</label>
    <input v-model="form.email" type="text" class="form-control">
  </div>
   <div class="form-group">
    <label>Content<9/label>
    <textarea v-model="form.content" class="form-control" rows="4"></textarea>
  </div>
  <button type="submit" class="btn-btn-primary">Enviar</button>
  </form> 
</div>
</template>
<script>

export default {

data(){
        return {
          form:{
           name:"",
           surname:" ",
           email:"",
           content: " ",
                
                }
                }     
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
    computed:{
      formValid(){
        return this.form.name.length > 0 &&
              this.form.surname.length > 0 &&
              this.form.email.length > 0 &&
              this.form.content.length > 0
      }
    }
    }
};
</script>