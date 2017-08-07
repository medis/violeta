<template>
  <nav class="navbar">
    <div class="navbar-brand">
      <div class="navbar-burger burger" @click="showNav = !showNav" v-bind:class="{ 'is-active' : showNav }">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <div class="navbar-menu" v-bind:class="{ 'is-active' : showNav }">
      <router-link to="/" class="navbar-item">Home</router-link>
      <router-link to="/link2" class="navbar-item">Link2</router-link>
    </div>
  </nav>
</template>

<script>
  export default {

    data() {
      return {
        showNav: false
      }
    }

  }
</script>