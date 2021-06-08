<template>
<div>
  <post-list-default :posts="posts"></post-list-default>
  </div>
</template>
<script>
export default {
  created() {
    this.getPosts();
  },
  methods: {
      postClick:function(p){
        this.postSelected = p;
      },
      getPosts(){
      fetch("/api/list")
      .then (response => response.json())
     .then(json => this.posts =json.data);
      }
    },
    data: function() {
        return{
        postSelected: "",
        posts: []
    };
}
}
</script>