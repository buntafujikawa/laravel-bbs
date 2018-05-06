import Vue from 'vue'
import VueRouter from 'vue-router'

require('./bootstrap')

window.Vue = require('vue');
Vue.use(VueRouter)

// Vue.component('navbar', require('./components/Layouts/Navbar.vue'))

const router = new VueRouter({
  mode: 'history',
  routes: [
    { path: '/', component: require('./components/ExampleComponent') },
    // { path: '/about', component: require('./components/About.vue') },
  ]
})

const app = new Vue({
  // router,
  el: '#app'
})
