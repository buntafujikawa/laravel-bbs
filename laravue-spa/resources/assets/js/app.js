import Vue from 'vue'
import router from './router'
import http from "./services/http.js";
import userStore from './stores/userStore.js'

require('./bootstrap');

const app = new Vue({
  router,
  el: '#app',
  created() {
    http.init()
    userStore.init()
  },
  render: h => h(require('./app.vue')),
})
