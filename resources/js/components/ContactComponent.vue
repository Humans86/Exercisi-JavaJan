<template>

    <div class="col-8 offset-2">
      <div class="card">
         <div class="card-header">
           <h3><i class="fa fa-smile-beam text-success"></i> Contact Me </h3></div>
          <div class="card-body">
            <form @submit.prevent="onSubmit" class="contact">

            <BaseInput label= "Nom" 
              v-model="$v.form.name.$model" 
              :validator="$v.form.name">
            </BaseInput>

            <BaseInput label= "Cognom" 
              v-model="$v.form.surname.$model"
              :validator="$v.form.surname">
            </BaseInput>

            <BaseInput label= "Email" type="email" 
               v-model="$v.form.email.$model"
              :validator="$v.form.email">
            </BaseInput>

            <BaseInput label= "Phone" 
              :mask="'(+##) ###-###-###'" 
               v-model="$v.form.phone.$model"
              :validator="$v.form.phone">
            </BaseInput>

        <div class="form-group">
          <label>Contingut</label>
          <textarea
           v-model="$v.form.content.$model" 
          class="form-control" 
          :class="{
              'is-valid':!$v.form.content.$error && $v.form.content.$dirty,
              'is-invalid':$v.form.content.$error ,
              }"
          rows="3">
          
          </textarea>
        </div>
        <button 
          :disabled="!formValid"
        type="submit" class="btn btn-primary"> Enviar</button>

        <button class="btn btn-danger btn-sm" @click="resetForm">  Reset</button>

          </form>
         </div> 
      </div>
    </div>
</template>
<script>
import BaseInput from '../components/BaseInput.vue';
import { required, minLength,email} from 'vuelidate/lib/validators';

export default {
  components: { BaseInput },
    component:{BaseInput},
    data(){
        return{
            form:{
                name:"",
                surname:"",
                email:"",
                phone:"",
                content:""
            }
        }
    },
    validations:{
      form:{
        name:{
          required,
          minLength: minLength(3)
        },
        surname:{
          required,
          minLength: minLength(3)
        },
        email:{
          required,
          email
        },
        phone:{
          required,
          minLength: minLength(11)
        },
        content:{
          required
        }
    }
    },
    methods: {
        resetForm(){
          
          this.$v.form.name.$model = ""
          this.$v.form.surname.$model = ""
          this.$v.form.email.$model = ""
          this.$v.form.phone.$model = ""
          this.$v.form.content.$model = ""
          
          
          this.$v.$reset();
          document.querySelectorAll("form.contact input, form.contact textarea").forEach(e => e.value="");
          this.$awn.info("Formulari Reiniciat");

        },

        onSubmit(){
          if(!this.formValid) return

           axios
           .post("/api/contact",{
              name: this.$v.form.name.$model,
              surname: this.$v.form.surname.$model,
              email: this.$v.form.email.$model,
              message: this.$v.form.content.$model,
              phone: this.$v.form.phone.$model
           })
           .then(function(response) {
             console.log(response.data)
           this.$awn.info("Informacio Enviada Correctament");
        });
         
            
        }
    },
    computed:{
        formValid(){
          return !this.$v.form.name.$invalid;
          /*  return (
                 this.form.name.length > 0 &&
                 this.form.surname.length > 0 &&
                 this.form.phone.length > 0 &&
                 this.form.email.length > 0 &&
                 this.form.content.length > 0)*/
        }
    },
}
</script>
<style lang="scss">
  @import '~vue-awesome-notifications/dist/styles/style.scss';
</style>
