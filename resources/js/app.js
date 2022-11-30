require('./bootstrap');

import * as Vue from 'vue';
import * as VueRouter from 'vue-router';
import routes from './routes';
import Home from "./components/Home.vue";


const router = VueRouter.createRouter({
  history: VueRouter.createWebHashHistory(),
  routes
})

const app = Vue.createApp({
  data: () => ({
  }),
  methods: {
  }
})
app.use(router)
app.component('home', Home)
app.mount('#app')

