<template>

  <div class="page contact">
    <small-hero>About Violeta Skya</small-hero>
    <div class="container">
      <section class="section content">

      <div v-if="loading">
        <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
        <content-placeholder :rows="placeholderRows"></content-placeholder><br/>
        <content-placeholder :rows="placeholderRows"></content-placeholder>
      </div>

      <div v-else>
        <span v-html="body"></span>
      </div>

      </section>
    </div>
  </div>

</template>

<script>
import ContentPlaceholder from 'vue-content-placeholder';
import ABOUT_PAGE_QUERY from '../../graphql/aboutPage.graphql'

export default {

  data() {
    return {
      text: [],
      loading: 0,
      placeholderRows: [
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
  computed: {
    body: function() {
        return this.text[0].body;
    }
  },
  apollo: {
    text: {
      query: ABOUT_PAGE_QUERY
    }
  },
  components: {
    ContentPlaceholder
  }
}
</script>