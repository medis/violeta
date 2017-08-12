<template>

  <section class="section">
    <router-link to="/media" title="view all media" class="more is-pulled-right is-size-7">ALL MEDIA</router-link>
    <h2 class="title is-4">Featured Video</h2>
    <div class="content">
      <single-video></single-video>
    </div>
  </section>

</template>

<script>
  Vue.component('SingleVideo', require('../elements/video.vue'));
</script>
