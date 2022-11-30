<template>
  <div>
    <h2>{{ user.name }} {{ user.surname }} : {{ user.role }}</h2>
    <router-link :to="'/users/' + user.id">go profile</router-link>
  </div>
</template>


<script>
  export default {
    props: ['user'],
    name: "User",
    data() {
      return {
        name: 'loh',
        surname : 'sedoy',
      };
    },
    methods: {
      
    }
  }
</script>

<style scoped>

</style>