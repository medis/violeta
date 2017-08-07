<template>
  <nav class="navbar ">
    <div class="navbar-brand">
      <div class="navbar-burger burger" data-target="navMenu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <div id="navMenu" class="navbar-menu">
      <router-link to="/" class="navbar-item">Home</router-link>
      <router-link to="/link2" class="navbar-item">Link2</router-link>
    </div>
  </nav>
</template>