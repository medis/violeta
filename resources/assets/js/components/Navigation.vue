<template>
  <div class="navbar-wrapper" v-bind:class="{ 'collapsed' : collapse }">
    <div class="bg"></div>
    <div class="container">
      <nav class="navbar">
        <div class="navbar-brand">
          <div class="navbar-burger burger" @click="showNav = !showNav" v-bind:class="{ 'is-active' : showNav }">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>

        <div class="navbar-menu columns" v-bind:class="{ 'is-active' : showNav }">
          <div class="column is-1 is-offset-3"><router-link to="/music" class="navbar-item">Music</router-link></div>
          <div class="column is-1"><router-link to="/photos" class="navbar-item">Photos</router-link></div>
          <div class="column is-2"><router-link to="/" class="navbar-item"><img src="/images/logo.png" alt="Violeta Skya homepage" /></router-link></div>
          <div class="column is-1"><router-link to="/video" class="navbar-item">Video</router-link></div>
          <div class="column is-1"><router-link to="/contact" class="navbar-item">Contact</router-link></div>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>
  export default {

    data() {
      return {
        showNav: false,
        last_known_scroll_position: 0,
        ticking: false,
        collapse: false
      }
    },

    created() {
      window.addEventListener('scroll', () => {
        this.handleScroll()
      });
    },

    methods: {
      handleScroll() {
        this.last_known_scroll_position = window.scrollY;
        if (!this.ticking) {
          window.requestAnimationFrame(() => {
            if (this.last_known_scroll_position >= 10) {
              this.collapse = true;
            }
            else {
              this.collapse = false;
            }

            this.ticking = false;
          });
        }
        this.ticking = true;
      }
    }

  }
</script>