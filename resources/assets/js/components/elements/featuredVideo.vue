<template>

  <section class="section">
    <h2 class="title is-4">Featured Video</h2>
    <div class="content">
      <single-video></single-video>
    </div>
  </section>

</template>

<script>
  Vue.component('SingleVideo', require('../elements/video.vue'));
</script>
