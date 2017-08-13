<template>

  <div class="page contact">
    <small-hero>Music</small-hero>
    <div class="container">
      <section class="section">

        <div class="columns" v-for="videos in chunkedVideos">
            <div class="column" v-for="video in videos">
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
          code: 'jqhgXAGP4Ho',
          title: 'London Grammar - Rooting For You'
        },
        {
          type: 'youtube',
          code: 'RbUMKenn5l8',
          title: 'London Grammar - Big Picture'
        }
      ],
    }
  },

  computed: {
    chunkedVideos() {
      return chunk(this.videos, 4)
    }
  },

}
</script>
