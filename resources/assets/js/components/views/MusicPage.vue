<template>

  <div class="page contact">
    <small-hero>Music</small-hero>
    <div class="container">
      <section class="section">

        <div v-if="loading">
          <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
          <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
          <content-placeholder :rows="placeholderRows"></content-placeholder>
        </div>

        <div v-else>

          <div class="videos grid">
            <figure v-for="(video, i) in musics" :key="i" :class="getClass(video)">
              <single-video :data="video"></single-video>
            </figure>
          </div>

        </div>

      </section>
    </div>
  </div>

</template>

<script>
import ContentPlaceholder from 'vue-content-placeholder';
import MUSIC_PAGE_QUERY from '../../graphql/musicPage.graphql'

export default {
  created() {
    Event.$on(this.id + "_changePage", (link) => this.$store.dispatch('changeMusicPage', link));
  },

  data() {
    return {
      loading: 0,
      musics: [],
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

  apollo: {
    musics: {
      query: MUSIC_PAGE_QUERY
    }
  },

  methods: {
      getClass(video) {
          return video.big == true ? 'big' : 'small';
      }
  }

}
</script>
