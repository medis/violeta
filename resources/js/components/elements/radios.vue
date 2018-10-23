<template>
  <section class="section">
    <h2 class="title is-4">Radio</h2>

    <div v-if="dataRadios.length">
      <div class="columns is-multiline">
        <div v-for="radio in dataRadios" :key="radio.id" class="media radio column is-half">
          <a :href="radio.link" target="_blank">{{ radio.title }}</a>
        </div>
      </div>
    </div>
    <div v-else>Soon</div>

  </section>
</template>

<script>
  export default {
    props: ['dataRadios']
  }
</script>