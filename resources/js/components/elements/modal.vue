<template>
  <div class="modal is-active">
    <div class="modal-background" @click="closeModal"></div>
    <div class="modal-content">

      <div :class="isType('youtube') ? 'youtube' : 'is-hidden' ">
        <div id="player"></div>
      </div>

      <div v-show="isType('flickr')">
          <div class="columns">
            <div class="column is-8 is-offset-2 is-paddingless">
                <figure class="image">
                <img :src="this.image.image" />
              </figure>
            </div>
          </div>
      </div>

    </div>
    <button class="modal-close is-large" @click="closeModal"></button>
  </div>
</template>

<script>
Vue.component('comment', require('./comment.vue'));
export default {
  props: ['data'],

  data() {
    return {
      player: null,
      image: {
        thumbnail: '',
        image: '',
        original: ''
      }
    }
  },

  methods: {
    closeModal: function() {
      if (this.data.type == 'youtube') {
        this.player.stopVideo();
      }

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
    },

    isType: function(type) {
      return this.data !== null && this.data.type == type;
    },

    hasComments: function(image) {
      return this.image.comments.lenght > 0;
    },

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
            height: '360',
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

      if (val.type == 'flickr') {
        this.image = val.data;
      }
    }
  }
}
</script>
