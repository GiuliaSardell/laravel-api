<template>
  <div>
    <Header />
    <Posts />
    <Footer />
  </div>

</template>

<script>

import Header from './components/partials/Header.vue';
import Footer from './components/partials/Footer.vue';
import Posts from './components/Posts.vue';

export default {
  name: "App",
  components:{
    Header,
    Footer,
    Posts
  }
}
</script>

<style lang="scss">

</style>