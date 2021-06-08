<template>
<div>
<div v-if="post">
<div class="card mt-5"> 
    <div class="card-header">
      <img :src="'/images/' + post.image.image" class="card-img-top" />
    </div>
    <div class="card-body">
      <h1 class="card-title"> {{ post.title }}  </h1>
      <router-link class="btn btn-success" :to="{name: 'post-category',params:{category_id:post.category_id}}">{{post.category.title}}</router-link> 
      <p class="card-text"> {{ post.content }}</p>
   
    </div>
</div>
<modal-post :post="postSelected"></modal-post>
  </div>
  <div v-else>
    <h1>El post no existeix</h1>
  </div>
</div>
</template>
<script>

export default {

  created(){

  this.getPosts();
    },

    methods: {
         
    getPosts:function() {
      fetch("/api/list/" + this.$route.params.id)
      .then(response => response.json())
      .then(json => (this.post = json.data));

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