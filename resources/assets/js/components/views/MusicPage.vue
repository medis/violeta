<template>

  <div class="page contact">
    <small-hero>Music and videos</small-hero>
    <div class="container">
      <section class="section">

        <div class="tile is-ancestor">

          <div class="tile">
            <!-- Add content or other tiles -->
          </div>
          <div class="tile">
            <!-- Add content or other tiles -->
          </div>

        </div>

      </section>
    </div>
  </div>

</template>

<script>
export default {

  data() {
    return {
      videos: [
        {
          type: 'youtube',
          code: 'jqhgXAGP4Ho'
        },
        {
          type: 'youtube',
          code: 'RbUMKenn5l8'
        }
      ],
      music: [
        {
          type: 'soundcloud',
          code: ''
        }
      ]
    }
  },

}
</script>
