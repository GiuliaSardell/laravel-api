<template>
  <main>
    <div class="container">
      <h1>i miei post</h1>
      <PostItems
        v-for="post in posts"
        :key="post.id" 
        :post = "post"
      />
    </div>
  </main>

  
</template>

<script>

import PostItems from './partials/PostItems';

export default {
  name: 'Posts',
  components: {
    PostItems
  },
  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/posts', //prendo tutti i post
      posts: null //per gestire il loading
    }
  },
  mounted(){
    this.getPosts();
  },
  methods: {
    getPosts(){
      axios.get(this.apiUrl)
      .then(res => {
        this.posts = res.data
        console.log(this.posts);
      })
    }
  }
}
</script>

<style lang="scss" scoped>
main{
  padding: 30px 0;
}
</style>