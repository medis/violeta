<template>
  <div class="page front">

    <hero></hero>

    <div class="container">
      <div class="columns">

        <div class="column">
          <about></about>
          <shows></shows>
          <radios></radios>
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

  import RADIOS_ALL from '../../graphql/radiosAll.graphql'

  export default {
      data() {
          return {
              data: []
          }
      },

      apollo: {
          data: {
              query: RADIOS_ALL
          }
      },
  }
</script>