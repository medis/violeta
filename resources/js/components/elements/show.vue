<template>
  <div class="media show">

    <div class="columns is-mobile">
      <div class="column is-one-third-mobile is-one-third-tablet has-text-centered date is-size-6">
        <p>{{ formatDate('Do') }}</p>
        <p >{{ formatDate('MMM') }}</p>
      </div>

      <div class="column is-11 info">
        <p class="venue">{{ show.venue }}</p>
        <p class="is-size-7"><span class="time">{{ formatDate('hh:mm A') }}</span>, {{ show.address }}</p>
      </div>
    </div>

  </div>
</template>

<script>
  export default {
    props: ['show'],

    methods: {
      formatDate(format) {
        return moment(this.show.date).format(format);
      }
    }
  }
</script>
