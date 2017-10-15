<template>

  <div class="page contact">
    <small-hero>Music</small-hero>
    <div class="container">
      <section class="section">

        <div v-if="!ready">
          <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
          <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
          <content-placeholder :rows="placeholderRows"></content-placeholder>
        </div>

        <div v-if="ready">

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
import { mapGetters, mapActions } from 'vuex'
import ContentPlaceholder from 'vue-content-placeholder';

export default {
  created() {
    Event.$on(this.id + "_changePage", (link) => this.$store.dispatch('changeMusicPage', link));
  },

  computed: {
    ...mapGetters({
      music: 'allMusic',
      ready: 'musicReady'
    }),
    chunkedVideos() {
      return chunk(this.music, 4)
    },
  },

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
