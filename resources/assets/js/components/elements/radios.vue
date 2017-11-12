<template>
  <section class="section">
    <h2 class="title is-4">Radio</h2>

    <div v-if="!ready">
      <content-placeholder :rows="placeholderRows"></content-placeholder>
    </div>

    <div v-if="ready">
      <div v-if="radios.length">
        <div v-for="radio in radios" :key="radio.id" class="media radio">
          <a :href="radio.link" target="_blank">{{ radio.title }}</a>
        </div>
      </div>
      <div v-else>Soon</div>
    </div>

  </section>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'
  import ContentPlaceholder from 'vue-content-placeholder';

  export default {
    computed: mapGetters({
      radios: 'allRadios',
      ready: 'radiosReady'
    }),
    data() {
      return {
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