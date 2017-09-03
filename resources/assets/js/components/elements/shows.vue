<template>
  <section class="section">
    <router-link to="/shows" title="view all shows" class="more is-pulled-right is-size-7">MORE SHOWS</router-link>
    <h2 class="title is-4">Upcoming shows</h2>

    <div v-if="!ready">
      <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
      <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
      <content-placeholder :rows="placeholderRows"></content-placeholder>
    </div>

    <div v-if="ready">
      <div v-if="shows.length">
        <show  v-for="show in shows" :key="show.id" :show="show"></show>
      </div>
      <div v-else>Soon</div>
    </div>

  </section>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'
  import ContentPlaceholder from 'vue-content-placeholder';

  Vue.component('show', require('./show.vue'));
  export default {
    computed: mapGetters({
      shows: 'mostRecentShows',
      ready: 'showsReady'
    }),
    data() {
      return {
        placeholderRows: [
          {
            height: '15px',
            boxes: [[0, '100px']]
          },
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