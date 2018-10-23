<template>

  <div class="card video">
    <div class="card-image">

      <div class="image is-4by3 has-text-centered">
        <a @click="openModal()">
          <img :src="getUrl()" />
          <div class="bg"></div>
          <span class="icon play is-large"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span>
          <p class="title">{{ this.data.title }}</p>
        </a>
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
          code: this.data.source
        })
      },

      getUrl() {
        return "https://img.youtube.com/vi/" + this.data.source  +"/0.jpg";
      }
    }
  }
</script>