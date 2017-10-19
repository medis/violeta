<template>

  <div class="page contact">
    <small-hero>About Violeta Skya</small-hero>
    <div class="container">
      <section class="section content">

      <div v-if="!ready">
        <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
        <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
        <content-placeholder :rows="placeholderRows"></content-placeholder>
      </div>

      <div v-if="ready">
        <span v-html="text"></span>
      </div>

      </section>
    </div>
  </div>

</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import ContentPlaceholder from 'vue-content-placeholder';

export default {
  computed: {
    ...mapGetters({
      ready: 'textsReady'
    }),
    text() {
      return this.$store.getters.getText('violeta_bio_long')
    }
  },
  data() {
    return {
      placeholderRows: [
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
  }
}
</script>