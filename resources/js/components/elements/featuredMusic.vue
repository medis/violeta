<template>

  <section class="section">
    <router-link to="/music" title="view all media" class="more is-pulled-right is-size-7">ALL MUSIC</router-link>
    <h2 class="title is-4">Featured Music</h2>
    <div class="content">
      <single-video :data="dataFeaturedSong"></single-video>
    </div>
  </section>

</template>

<script>
  Vue.component('SingleVideo', require('./video.vue'));

  export default {
    props: ['dataFeaturedSong'],

    data() {
      return {
        id: "component_" + this._uid,
      }
    },
  }
</script>
