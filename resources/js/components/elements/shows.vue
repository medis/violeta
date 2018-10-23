<template>
  <section class="section">
    <router-link to="/shows" title="view all shows" class="more is-pulled-right is-size-7">MORE SHOWS</router-link>
    <h2 class="title is-4">Upcoming shows</h2>

    <div v-if="dataShows.length">
      <show  v-for="show in dataShows" :key="show.id" :show="show"></show>
    </div>

  </section>
</template>

<script>
    Vue.component('show', require('./show.vue'));

    export default {
        props: ['dataShows']
    }
</script>