<template>

  <div class="page contact">
    <small-hero>Upcoming shows</small-hero>
    <div class="container">
      <section class="section">

        <div v-if="!ready">
          <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
          <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
          <content-placeholder :rows="placeholderRows"></content-placeholder>
        </div>

        <div v-if="ready">

          <div v-if="shows.length">
            <div class="box">
              <show v-for="show in shows" :key="show.id" :show="show"></show>
            </div>

            <div class="columns">
              <div class="column is-6 is-offset-3">
                <pagination :pagination="pagination" :links="links" :parentName="id"></pagination>
              </div>
            </div>
          </div>

          <div v-else>Soon</div>
        </div>

      </section>
    </div>
  </div>

</template>

<script>
  import { mapGetters, mapActions } from 'vuex'
  import ContentPlaceholder from 'vue-content-placeholder';

  Vue.component('show', require('../elements/show.vue'));
  Vue.component('pagination', require('../elements/pagination.vue'));

  export default {
    created() {
      Event.$on(this.id + "_changePage", (link) => this.$store.dispatch('changeShowsPage', link));
    },

    computed: mapGetters({
      shows: 'allShows',
      pagination: 'showsPager',
      links: 'showsLinks',
      ready: 'showsReady'
    }),

    data() {
      return {
        id: "component_" + this._uid,
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