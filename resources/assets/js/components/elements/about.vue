<template>

  <section class="section">
    <router-link to="/bio" title="read all bio" class="more is-pulled-right is-size-7">FULL BIO</router-link>
    <h2 class="title is-4">About Violeta Skya</h2>
    <div class="content">
      <span v-html="dataAboutShort.body"></span>
    </div>
  </section>

</template>


<script>
export default {
  props: ['dataAboutShort'],
}
</script>