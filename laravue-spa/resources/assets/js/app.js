import Vue from 'vue'
import router from './router'

require('./bootstrap');

const app = new Vue({
  router,
  el: '#app',
  render: h => h(require('./app.vue')),
})
