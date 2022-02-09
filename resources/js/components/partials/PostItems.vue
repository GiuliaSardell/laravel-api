<template>
  <article>
    <h3>{{post.title}}</h3>
    <p class="data">{{post.created_at}}</p>
    <p class="text">{{post.content}}</p>
  </article>
</template>

<script>
export default {
  name: 'PostItems',
  props: {
    'post' : Object
  }
}
</script>

<style lang="scss" scoped>
  article{
    margin-bottom: 40px;
    .data{
      font-size: 12px;
      font-style: italic;
    }
    .text{
      padding: 5px 0;
    }
  }
</style>