<template>
  <header>
    <nav>
      <ul>
        <li>
          <a href="#">Home</a>
        </li>
        <li>
          <a class="active" href="#">Blog</a>
        </li>
        <li>
          <a href="#">Chi siamo</a>
        </li>
        <li>
          <a href="#">Contatti</a>
        </li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name : 'Header'
}
</script>

<style lang="scss" scoped>
header{
  background-color: burlywood;
  text-align: center;
  padding: 20px 0;
  ul{
    list-style: none;
    li{
      display: inline-block;
      margin: 0 15px;
      a{
        color:white;
        text-decoration: none;
        &:hover{
          text-decoration: underline;
        }
        &.active{
          color: brown;
        }
      }
    }
  }
}
</style>