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

          <div class="columns" v-for="videos in chunkedVideos">
              <div class="column" :class="getClass(videos)" v-for="video in videos">
                <div class="box is-paddingless video-wrapper">
                  <single-video :data="video"></single-video>
                </div>
            </div>
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

  computed: {
    chunkedVideos() {
      return chunk(this.musics, 4)
    },
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
    getClass(videos) {
      if (videos.length == 1) {
        return 'is-6 is-offset-3';
      }
      else if (videos.length == 2) {
        return 'is-6';
      }
      else if (videos.length == 3) {
        return 'is-4';
      }
      else if (videos.length == 4) {
        return 'is-3';
      }
    }
  }

}
</script>
