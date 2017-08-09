<template>
  <div class="media show">

    <div class="columns">
      <div class="column is-1 has-text-centered date is-size-6">
        <p>{{ formatDate('Do') }}</p>
        <p >{{ formatDate('MMM') }}</p>
      </div>

      <div class="column is-11 info">
        <p class="venue">{{ show.venue }}</p>
        <p class="is-size-7">{{ show.address }}</p>
      </div>
    </div>

  </div>
</template>

<script>
  export default {
    props: ['show'],

    methods: {
      formatDate(format) {
        return this.show.date.format(format);
      }
    }
  }
</script>
