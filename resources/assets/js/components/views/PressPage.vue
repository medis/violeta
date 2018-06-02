<template>

  <div class="page contact">
    <small-hero>Press</small-hero>
    <div class="container">
      <section class="section">

        <div v-if="loading">
          <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
          <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
          <content-placeholder :rows="placeholderRows"></content-placeholder>
        </div>

        <div v-else>

          <div v-if="press.data.length">
            <div class="box">
              <press v-for="article in press.data" :key="article.id" :article="article"></press>
            </div>

            <div class="columns">
              <div class="column is-6 is-offset-3">
                <pagination :pagination="press" @next="next" @prev="prev"></pagination>
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
    import PRESS_PAGE_QUERY from '../../graphql/pressPage.graphql';
    import ContentPlaceholder from 'vue-content-placeholder';

  Vue.component('press', require('../elements/press.vue'));
  Vue.component('pagination', require('../elements/pagination.vue'));

  export default {
    data() {
      return {
        loading: 0,
        press: [],
        page: 1,
        limit: 20,
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

    apollo: {
      press: {
        query: PRESS_PAGE_QUERY,
        variables() {
          return {
            page: this.page,
            limit: this.limit
          }
        },
      }
    },

    methods: {
      next: function() {
        this.page++;
      },
      prev: function() {
        this.page--;
      }
    },

    components: {
        ContentPlaceholder
    }
  }
</script>