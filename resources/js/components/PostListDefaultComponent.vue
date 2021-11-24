<template>
  <div>
    <div class="card mt-3" v-for="post in posts" :key="post.title">
      <img v-bind:src="'/images/' + post.image" class="card-img-top" />
      <div class="card-body">
        <h5 class="card-title">{{ post.title }}</h5>
        <p class="card-text" v-html="post.content"></p>
        <button class="btn btn-primary" v-on:click="postClick(post)">Veure Resum</button>
        <router-link class="btn btn-success" :to="{name: 'detail', params: {id: post.id}}">Veure</router-link>
      </div>
    </div>
    <modal-post :post="postSelected"></modal-post>

   
  </div>
</template>
<script>

export default {
  props: ["posts"],

  methods: {
    postClick: function(p) {
      this.postSelected = p;
    }
  },
  data: function() {
    return {
      postSelected: "",
      }
 
      }
    };

</script>