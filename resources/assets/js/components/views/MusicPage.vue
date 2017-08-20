<template>

  <div class="page contact">
    <small-hero>Music</small-hero>
    <div class="container">
      <section class="section">

        <div class="columns" v-for="videos in chunkedVideos">
            <div class="column" :class="getClass(videos)" v-for="video in videos">
              <div class="box is-paddingless video-wrapper">
                <single-video :data="video"></single-video>
              </div>
          </div>
        </div>

      </section>
    </div>
  </div>

</template>

<script>
export default {

  data() {
    return {
      videos: [
        {
          type: 'youtube',
          code: '-1W2nkMVgYo',
          title: 'Violeta Skya - Kiss Me (Teaser)'
        }
      ],
    }
  },

  computed: {
    chunkedVideos() {
      return chunk(this.videos, 4)
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
      else if (videos.length == 3) {
        return 'is-3';
      }
    }
  }

}
</script>
