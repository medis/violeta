<template>

  <section class="section">
    <router-link to="/bio" title="read all bio" class="more is-pulled-right is-size-7">FULL BIO</router-link>
    <h2 class="title is-4">About Violeta Skya</h2>
    <div class="content">

      <div v-if="!ready">
        <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
        <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
        <content-placeholder :rows="placeholderRows"></content-placeholder>
      </div>

      <div v-if="ready">
        <span v-html="text"></span>
      </div>
    </div>
  </section>

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
      return this.$store.getters.getText('violeta_bio_short')
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