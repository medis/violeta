<template>
  <nav class="pagination is-centered" role="navigation" aria-label="pagination">
    <a class="pagination-previous" @click="emitPrev"
            v-show="pagination.prev_page_url">Previous
    </a>

    <a class="pagination-next" @click="emitNext"
            v-show="pagination.next_page_url">Next
    </a>

    <ul class="pagination-list">
      <li><span class="pagination-link">{{pagination.page}}</span></li>
      <li><span class="pagination-ellipsis">of</span></li>
      <li><span class="pagination-link">{{pagination.last_page}}</span></li>
    </ul>
  </nav>
</template>

<script>
export default {
  props: ['pagination', 'links', 'parentName'],

  methods: {
    emitNext() {
      this.$emit("next");
    },

    emitPrev() {
      this.$emit("prev");
    }
  }
}
</script>

