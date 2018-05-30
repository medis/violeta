<template>
  <div class="page front">

    <hero></hero>

    <div class="container">
      <div class="columns">

        <div class="column">

          <div v-if="loading">
            <content-placeholder :rows="placeholderRows"></content-placeholder>
          </div>
          <div v-else>
            <about :data-about-short="aboutShort"></about>
            <shows :data-shows="shows"></shows>
            <radios :data-radios="radios"></radios>
          </div>

        </div>

        <div class="column">

          <div v-if="loading">
            <content-placeholder :rows="placeholderRows"></content-placeholder>
          </div>
          <div v-else><featured-music :data-featured-song="featuredSong"></featured-music></div>

          <newsletter></newsletter>
        </div>

      </div>
    </div>

  </div>
</template>

<script>
  //http://localhost/graphql?query=query+radiosAll{radios{id,title,link}}
  Vue.component('hero', require('../elements/hero.vue'));
  Vue.component('about', require('../elements/about.vue'));
  Vue.component('shows', require('../elements/shows.vue'));
  Vue.component('radios', require('../elements/radios.vue'));
  Vue.component('FeaturedMusic', require('../elements/featuredMusic.vue'));
  Vue.component('newsletter', require('../elements/newsletter.vue'));

  import ContentPlaceholder from 'vue-content-placeholder';
  import FRONT_PAGE_QUERY from '../../graphql/frontPage.graphql'

  export default {
      data() {
          return {
              radios: [],
              shows: [],
              featuredSong: [],
              aboutShort: [],
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
          data: {
              query: FRONT_PAGE_QUERY,
              variables: {
                  shows_number: 3
              },
              manual: true,
              result(results) {
                  this.radios = results.data.radios;
                  this.shows = results.data.shows.data;
                  this.featuredSong = results.data.musics[0];
                  this.aboutShort = results.data.text[0];
              }
          }
      }
  }
</script>