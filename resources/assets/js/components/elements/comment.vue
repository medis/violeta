<template>
  <article class="media">
    <figure class="media-left">
      <p class="image is-64x64">
        <img :src="this.comment.from.profile_picture">
      </p>
    </figure>
    <div class="media-content">
      <div class="content">
        <p>
          <strong>{{ this.comment.from.full_name }}</strong>
          <br>
          {{ this.comment.text }}
        </p>
      </div>
    </div>
  </article>
</template>

<script>
  export default {
    props: ['comment'],

    data() {
      return {
        data: []
      }
    }
  }
</script>
