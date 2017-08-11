<template>
  <div class="modal is-active">
    <div class="modal-background" @click="closeModal"></div>
    <div class="modal-content">

      <div v-if="getType() === 'youtube'">
        <iframe id="player" width="560" height="315" src="https://www.youtube.com/embed/jqhgXAGP4Ho?enablejsapi=1&autoplay=1" frameborder="0" allowfullscreen></iframe>
      </div>


    </div>
    <button class="modal-close is-large" @click="closeModal"></button>
  </div>
</template>

<script>
export default {
  props: ['data'],

  data() {
    return {
      iframe: null,
      player: null
    }
  },

  methods: {
    closeModal: function() {
      console.log(this.player);
      this.player.stopVideo();
      Event.$emit('close');
    },

    getType: function() {
      if (!this.data) {
        return false;
      }

      return this.data.type;
    },

  },

  created() {
    //https://developers.google.com/youtube/iframe_api_reference#loadVideoById
    // https://developers.google.com/youtube/iframe_api_reference#Examples
    this.player = new YT.Player('player');
    console.log(this.player);
  }

}
</script>
