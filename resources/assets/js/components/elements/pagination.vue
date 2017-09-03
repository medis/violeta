<template>
  <nav class="pagination is-centered" role="navigation" aria-label="pagination">
    <a class="pagination-previous" @click="fetchPage(pagination.links.previous)"
            :disabled="!pagination.links.previous">Previous
    </a>

    <a class="pagination-next" @click="fetchPage(pagination.links.next)"
            :disabled="!pagination.links.next">Next
    </a>

    <ul class="pagination-list">
      <li><span class="pagination-link">{{pagination.current_page}}</span></li>
      <li><span class="pagination-ellipsis">of</span></li>
      <li><span class="pagination-link">{{pagination.total_pages}}</span></li>
    </ul>
  </nav>
</template>

<script>
export default {
  props: ['pagination', 'parentName'],

  methods: {
    fetchPage(link) {
      Event.$emit(this.parentName + "_changePage", link);
    }
  }
}
</script>

