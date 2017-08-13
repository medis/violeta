<template>

  <div class="card video">
    <div class="card-image">

      <div class="image is-4by3 has-text-centered">
        <a @click="openModal()">
          <img :src="getUrl()" />
          <div class="bg"></div>
          <span class="icon play is-large"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span>
        </a>
      </div>

      <div class="card-content">
        <div class="media">
          <div class="media-content">
            <p class="title is-5">{{ this.data.title }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    props: ['data'],

    methods: {
      openModal() {
        Event.$emit('open', {
          type: 'youtube',
          code: this.data.code
        })
      },

      getUrl() {
        return "https://img.youtube.com/vi/" + this.data.code  +"/0.jpg";
      }
    }
  }
</script>