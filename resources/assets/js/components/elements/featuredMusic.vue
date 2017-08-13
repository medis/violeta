<template>

  <section class="section">
    <router-link to="/music" title="view all media" class="more is-pulled-right is-size-7">ALL MUSIC</router-link>
    <h2 class="title is-4">Featured Music</h2>
    <div class="content">
      <single-video :data="data"></single-video>
    </div>
  </section>

</template>

<script>
  Vue.component('SingleVideo', require('../elements/video.vue'));

  export default {
    data() {
      return {
        data: {
          code: 'jqhgXAGP4Ho',
          title: 'London Grammar - Rooting For You'
        }
      }
    }
  }
</script>
