<template>
  <nav class="pagination is-centered" role="navigation" aria-label="pagination">
    <a class="pagination-previous" @click="fetchPage(links.prev)"
            :disabled="!links.prev">Previous
    </a>

    <a class="pagination-next" @click="fetchPage(links.next)"
            :disabled="!links.next">Next
    </a>

    <ul class="pagination-list">
      <li><span class="pagination-link">{{pagination.current_page}}</span></li>
      <li><span class="pagination-ellipsis">of</span></li>
      <li><span class="pagination-link">{{pagination.last_page}}</span></li>
    </ul>
  </nav>
</template>

<script>
export default {
  props: ['pagination', 'links', 'parentName'],

  methods: {
    fetchPage(link) {
      if (link !== undefined) {
        Event.$emit(this.parentName + "_changePage", link);
      }
    }
  }
}
</script>

