<template>

  <div class="page contact">
    <small-hero>Press</small-hero>
    <div class="container">
      <section class="section">

        <div v-if="!ready">
          <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
          <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
          <content-placeholder :rows="placeholderRows"></content-placeholder>
        </div>

        <div v-if="ready">

          <div v-if="press.length">
            <div class="box">
              <press v-for="article in press" :key="article.id" :article="article"></press>
            </div>

            <div class="columns">
              <div class="column is-6 is-offset-3">
                <pagination :pagination="pagination" :parentName="id"></pagination>
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

  Vue.component('press', require('../elements/press.vue'));
  Vue.component('pagination', require('../elements/pagination.vue'));

  export default {
    created() {
      Event.$on(this.id + "_changePage", (link) => this.$store.dispatch('changePressPage', link));
    },

    computed: mapGetters({
      press: 'allPress',
      pagination: 'pressPager',
      ready: 'pressReady'
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