<template>
 <div>
  <h1>
    This is USER page of {{ user.name }} with {{ user.email }}
  </h1>
 </div>
</template>

<script>
  export default {
    name: "UserPage",
    data: () => ({
      user: {},
    }),
    async mounted() {
      try {
        const result = await axios.get('/users/' + this.$route.params.id);
        this.user = result.data;
      } catch (err) {
        console.log(err);
        alert("Ошибка при запросе на сервер");
      }
    },
    methods: {
    }
  }
</script>

<style scoped>
  * {
    background-color: #c51c1c;
  }
</style>