<template>
  <div class="media show">

    <div class="columns is-mobile">
      <div class="column is-one-third-mobile is-one-third-tablet has-text-centered date is-size-6">
        <p>{{ formatDate('Do') }}</p>
        <p >{{ formatDate('MMM') }}</p>
      </div>

      <div class="column is-11 info">
        <p class="venue"><a :href="article.link" target="_blank">{{ article.title }}</a></p>
        <p class="is-size-7">{{ article.source }}</p>
      </div>
    </div>

  </div>
</template>

<script>
  export default {
    props: ['article'],

    methods: {
      formatDate(format) {
        return moment(this.article.date).format(format);
      }
    }
  }
</script>
