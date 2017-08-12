<template>

  <div class="page contact">
    <small-hero>Photos</small-hero>
    <div class="container">
      <section class="section">

        <div class="columns" v-for="images in chunkedImages">
            <div class="column" v-for="image in images">
              <div class="box is-paddingless image-wrapper">
                <a @click="openModal(image)">
                  <img :src="image.images.low_resolution.url" />
                  <div class="bg"></div>
                  <span class="icon is-large"><i class="fa fa-eye" aria-hidden="true"></i></span>
                </a>
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
      images: []
    }
  },

  computed: {
    chunkedImages() {
      return chunk(this.images, 4)
    }
  },

  created() {
    this.getImages();
  },

  methods: {
    getImages() {
      axios.get('/api/instagram').then(response => {
        this.images = response.data.data
      })
    },
    openModal(image) {
      Event.$emit('open', {
        type: 'instagram',
        data: image
      })
    },
  }

}
</script>
