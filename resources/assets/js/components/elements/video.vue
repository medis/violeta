<template>

  <div class="card video">
    <div class="card-image">

      <div class="image is-4by3 has-text-centered">
        <a @click="openModal()">
          <img src="https://img.youtube.com/vi/jqhgXAGP4Ho/0.jpg" />
          <span class="icon play is-large"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span>
        </a>
      </div>

      <div class="card-content">
        <div class="media">
          <div class="media-content">
            <p class="title is-5">London Grammar - Rooting For You</p>
            <p class="subtitle is-6"><a href="https://www.youtube.com/channel/UCgX66nFZQodWgTeNIMF_4Rw" target="_blank">LondonGrammarVEVO</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
  export default {
    props: ['code'],

    methods: {
      openModal() {
        Event.$emit('open', {
          type: 'youtube',
          code: this.code
        })
      }
    }
  }
</script>