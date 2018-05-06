require('./bootstrap');

window.Vue = require('vue');

Vue.component('example', require('./components/ExampleComponent.vue'));

const app = new Vue({
  el: '#app'
});
