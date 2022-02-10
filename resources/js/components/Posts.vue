<template>
  <main>
    <div class="container">
      <h1>i miei post</h1>
      <PostItems
        v-for="post in posts"
        :key="post.id" 
        :post = "post"
      />

      <button
      @click="getPosts(pages.current -1)"
      :disabled = "pages.current === 1"
      >Prev</button>
      <button
      @click="getPosts(pages.current +1)"
      :disabled = "pages.current === pages.last"
      >Next</button>

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
      apiUrl: 'http://127.0.0.1:8000/api/posts?page=', //prendo tutti i post
      posts: null, //per gestire il loading
      pages: {}
    }
  },
  mounted(){
    this.getPosts();
  },
  methods: {
    getPosts(page = 1){
      axios.get(this.apiUrl + page)
      .then(res => {
        this.posts = res.data.data
        console.log(this.posts)
        this.pages = {
          current: res.data.current_page,
          last: res.data.last_page
        };
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