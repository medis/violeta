<template>
  <div class="modal is-active">
    <div class="modal-background" @click="closeModal"></div>
    <div class="modal-content">

      <div id="player"></div>

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
      this.player.stopVideo();
      Event.$emit('close');
    },

    getType: function() {
      if (!this.data) {
        return false;
      }

      return this.data.type;
    },

    onPlayerReady: function() {
      this.player.playVideo();
    }

  },

  created() {
    // Init Youtube api.
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  },

  watch: {
    data: function(val, oldVal) {

      if (val.type == 'youtube') {
        if (this.player === null) {
          this.player = new YT.Player('player', {
            height: '390',
            width: '640',
            videoId: val.code,
            events: {
              'onReady': this.onPlayerReady
            }
          });
        }
        else {
          this.player.loadVideoById(val.code, 0, 'hd720');
        }
      }

    }
  }
}
</script>
