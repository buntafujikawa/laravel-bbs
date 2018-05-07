<template>
  <div id="app">
    <navbar></navbar>
    <div class="container">
      <router-view></router-view>
    </div>
    <hr>
    <div class="container-fluid">
      <a href="https://github.com/acro5piano/laravel-vue-jwtauth-spa-todo-app" target="_blank">
        <img src="https://image.flaticon.com/icons/svg/25/25231.svg" width="30" height="20">
      </a>
    </div>
  </div>
</template>

<script>
  export default {
    components: {
      navbar: require('./components/Navbar.vue'),
    },
  }
</script>
