<template>
 <h1>{{ title }}</h1>
  <input type="text" name="title" id="title" v-model="title">
  <input type="button" value="ok" @click="addUser">
  <ul>
    <li v-for="user in users"> 
      <User :user="user"/>
    </li>
  </ul>
</template>

<script>
import User from "../components/User.vue";

  export default {
    name: "UsersList",
    components: {
      User,
    },
    data: () => ({
      title: 'title',
        users: [],
    }),
    async mounted() {
      try {
        const result = await axios.get('/users');
        this.users = result.data;
      } catch (err) {
        console.log(err);
        alert("Ошибка при запросе на сервер");
      }
    },
    methods: {
      addUser() {
        this.users.push( {name: this.title} )
      }
    }
  }
</script>

<style scoped>
  * {
    background-color: #aa7c7c;
  }
</style>