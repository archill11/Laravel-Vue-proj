require('./bootstrap');

import { createApp } from 'vue';
import Home from "./components/Home.vue";


const app = createApp({
  data() {
    return {

    };
  },
  methods: {

  }
})
app.component('home', Home)
app.mount('#app')

