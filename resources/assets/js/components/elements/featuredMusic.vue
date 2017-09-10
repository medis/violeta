<template>

  <section class="section">
    <router-link to="/music" title="view all media" class="more is-pulled-right is-size-7">ALL MUSIC</router-link>
    <h2 class="title is-4">Featured Music</h2>
    <div class="content">

      <div v-if="!ready">
          <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
      </div>

       <div v-if="ready">
          <single-video :data="featuredSong"></single-video>
      </div>
    </div>
  </section>

</template>

<script>
  import { mapGetters, mapActions } from 'vuex'
  import ContentPlaceholder from 'vue-content-placeholder';

  Vue.component('SingleVideo', require('../elements/video.vue'));

  export default {
    computed: mapGetters({
      featuredSong: 'featuredSong',
      ready: 'musicReady'
    }),

    data() {
      return {
        id: "component_" + this._uid,
        placeholderRows: [
          {
            height: '15px',
            boxes: [[0, '100px']]
          },
          {
            height: '15px',
            boxes:[[0, '100px'], ['10%', 1]]
          },
          {
            height: '15px',
            boxes: [[0, '100px']]
          },
          {
            height: '15px',
            boxes:[[0, '100px'], ['10%', 2]]
          }
        ]
      }
    },

    components: {
        ContentPlaceholder
    },
  }
</script>
