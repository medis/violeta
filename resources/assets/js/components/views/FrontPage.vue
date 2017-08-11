<template>
  <div class="page front">

    <hero></hero>

    <div class="container">
      <div class="columns">

        <div class="column">
          <about></about>
          <shows></shows>
        </div>

        <div class="column">
          <featured-video></featured-video>
          <newsletter></newsletter>
        </div>

      </div>
    </div>

  </div>
</template>

<script>
  Vue.component('hero', require('../elements/hero.vue'));
  Vue.component('about', require('../elements/about.vue'));
  Vue.component('shows', require('../elements/shows.vue'));
  Vue.component('FeaturedVideo', require('../elements/featuredVideo.vue'));
  Vue.component('newsletter', require('../elements/newsletter.vue'));
</script>