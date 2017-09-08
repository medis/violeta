<template>
  <div class="navbar-wrapper" v-bind:class="{ 'collapsed' : collapse }">
    <div class="bg"></div>
    <div class="container">
      <nav class="navbar">
        <div class="navbar-brand is-hidden-tablet">
          <div class="navbar-burger burger" @click="showNav = !showNav" v-bind:class="{ 'is-active' : showNav }">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>

        <div class="navbar-menu columns" v-bind:class="{ 'is-active' : showNav }">
          <div class="column"><router-link to="/" class="navbar-item home" @click.native="closeMenu()">Home</router-link></div>
          <div class="column"><router-link to="/bio" class="navbar-item" @click.native="closeMenu()">Bio</router-link></div>
          <div class="column"><router-link to="/music" class="navbar-item" @click.native="closeMenu()">Music</router-link></div>
          <div class="column"><router-link to="/photos" class="navbar-item" @click.native="closeMenu()">Photos</router-link></div>
          <div class="column"><router-link to="/shows" class="navbar-item" @click.native="closeMenu()">Shows</router-link></div>
          <div class="column"><router-link to="/press" class="navbar-item" @click.native="closeMenu()">Press</router-link></div>
          <div class="column"><router-link to="/contact" class="navbar-item" @click.native="closeMenu()">Contact</router-link></div>
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
      },

      closeMenu() {
        this.showNav = false;
      }
    }

  }
</script>