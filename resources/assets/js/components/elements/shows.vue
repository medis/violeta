<template>
  <section class="section">
    <router-link to="/shows" title="view all shows" class="more is-pulled-right is-size-7">MORE SHOWS</router-link>
    <h2 class="title is-4">Upcoming shows</h2>

    <div v-if="!ready">
      <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
      <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
      <content-placeholder :rows="placeholderRows"></content-placeholder>
    </div>

    <div v-if="ready">
      <div v-if="shows.length">
        <show  v-for="show in shows" :key="show.id" :show="show"></show>
      </div>
      <div v-else>Soon</div>
    </div>
    
  </section>
</template>

<script>
  import ContentPlaceholder from 'vue-content-placeholder';

  Vue.component('show', require('./show.vue'));
  export default {
    data() {
      return {
        ready: false,
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
          // }
        ],
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
    }
  }
</script>