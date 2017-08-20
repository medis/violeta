<template>

  <div class="page contact">
    <small-hero>Upcoming shows</small-hero>
    <div class="container">
      <section class="section">

        <div v-if="shows.length">
          <show v-for="show in shows" :key="show.id" :show="show"></show>
        </div>
        <div v-else>Soon</div>

      </section>
    </div>
  </div>

</template>

<script>
  Vue.component('show', require('../elements/show.vue'));
  export default {
    data() {
      return {
        shows: [
          // {
          //   id: 1,
          //   date: moment("2017-08-25 23:00"),
          //   venue: 'The Half Moon',
          //   address: '93 Lower Richmond Rd, London SW15 1EU'
          // },
          // {
          //   id: 2,
          //   date: moment("2017-09-01 21:00"),
          //   venue: 'King\'s College London',
          //   address: 'Strand, London WC2R 2LS'
          // },
          // {
          //   id: 2,
          //   date: moment("2017-09-01 21:00"),
          //   venue: 'King\'s College London',
          //   address: 'Strand, London WC2R 2LS'
          // },
          // {
          //   id: 2,
          //   date: moment("2017-09-01 21:00"),
          //   venue: 'King\'s College London',
          //   address: 'Strand, London WC2R 2LS'
          // },
          // {
          //   id: 2,
          //   date: moment("2017-09-01 21:00"),
          //   venue: 'King\'s College London',
          //   address: 'Strand, London WC2R 2LS'
          // },
          // {
          //   id: 2,
          //   date: moment("2017-09-01 21:00"),
          //   venue: 'King\'s College London',
          //   address: 'Strand, London WC2R 2LS'
          // },
          // {
          //   id: 2,
          //   date: moment("2017-09-01 21:00"),
          //   venue: 'King\'s College London',
          //   address: 'Strand, London WC2R 2LS'
          // },
          // {
          //   id: 2,
          //   date: moment("2017-09-01 21:00"),
          //   venue: 'King\'s College London',
          //   address: 'Strand, London WC2R 2LS'
          // },
          // {
          //   id: 2,
          //   date: moment("2017-09-01 21:00"),
          //   venue: 'King\'s College London',
          //   address: 'Strand, London WC2R 2LS'
          // }
        ]
      }
    }
  }
</script>