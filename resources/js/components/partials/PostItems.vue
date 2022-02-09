<template>
  <article>
    <h3>
      <a href="#">{{post.title}}</a>
    </h3>
    <p class="data">{{formatDate}}</p>
    <p class="text">{{ truncateText }}</p>
  </article>
</template>

<script>
export default {
  name: 'PostItems',
  props: {
    'post' : Object
  },
  computed: {
    truncateText(){
      return this.post.content.substr(0, 50) + '...';
    },
    formatDate(){
      const d = new Date(this.post.created_at);
      let day = d.getDate();
      let month = d.getMonth();
      const year = d.getFullYear();

      if(day < 10) day = '0'+day;
      if(month < 10) month = '0'+month;

      return `${day}/${month}/${year}`;
    }
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
    a{
      color:black;
      text-decoration: none;
      &:hover{
        text-decoration: underline;
      }
    }
  }
</style>