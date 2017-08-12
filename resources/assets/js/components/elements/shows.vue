<template>
  <section class="section">
    <router-link to="/shows" title="view all shows" class="more is-pulled-right is-size-7">MORE SHOWS</router-link>
    <h2 class="title is-4">Upcoming shows</h2>

    <show v-for="show in shows" :key="show.id" :show="show"></show>
  </section>
</template>

<script>
  Vue.component('show', require('./show.vue'));
  export default {
    data() {
      return {
        shows: [
          {
            id: 1,
            date: moment("2017-08-25 23:00"),
            venue: 'The Half Moon',
            address: '93 Lower Richmond Rd, London SW15 1EU'
          },
          {
            id: 2,
            date: moment("2017-09-01 21:00"),
            venue: 'King\'s College London',
            address: 'Strand, London WC2R 2LS'
          }
        ]
      }
    }
  }
</script>