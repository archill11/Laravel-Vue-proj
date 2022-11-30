<template>
  <div>
    <ul>
      <li>
        <router-link to="/users">Users List (click)</router-link>
      </li>
      <li>
        <router-link to="/admin">Admin (click)</router-link>
      </li>
    </ul>
  </div>
  <router-view />
</template>

<script>
  export default {
    name: "Home",
  }
</script>

<style scoped>
  * {
    background-color: #bebebe;
  }
</style>