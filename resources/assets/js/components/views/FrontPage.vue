<template>
  <div class="page front">

    <hero></hero>

    <div class="container">
      <div class="columns">

        <div class="column">
          <about></about>
          <shows></shows>
          <div v-if="loading">
            <content-placeholder :rows="placeholderRows"></content-placeholder>
          </div>
          <div v-else>
            <radios :data-radios="radios"></radios>
          </div>
        </div>

        <div class="column">
          <featured-music></featured-music>
          <newsletter></newsletter>
        </div>

      </div>
    </div>

  </div>
</template>

<script>
  //https://github.com/Akryum/vue-apollo-todos/blob/master/src/components/TodoList.vue
  //http://localhost/graphql?query=query+radiosAll{radios{id,title,link}}
  Vue.component('hero', require('../elements/hero.vue'));
  Vue.component('about', require('../elements/about.vue'));
  Vue.component('shows', require('../elements/shows.vue'));
  Vue.component('radios', require('../elements/radios.vue'));
  Vue.component('FeaturedMusic', require('../elements/featuredMusic.vue'));
  Vue.component('newsletter', require('../elements/newsletter.vue'));

  import ContentPlaceholder from 'vue-content-placeholder';
  import ALL_RADIOS_QUERY from '../../graphql/radiosAll.graphql'

  export default {
      data() {
          return {
              radios: [],
              loading: 0,

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
      },

      apollo: {
          radios: {
              query: ALL_RADIOS_QUERY
          }
      }
  }
</script>