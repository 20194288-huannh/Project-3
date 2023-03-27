<template>
  <b-container>
    <h4 class="mt-4 ml-3 font-italic">Featured Authors</h4>
    <div class="grid-container">
      <ItemAuthor v-for="author in authors" :key="author.id" :author="author"/>
    </div>
  </b-container>
</template>

<script>
export default {
  data() {
    return {
      authors: [],
    };
  },
  methods: {
    async fetchAuthors() {
      const response = await this.$axios.get(`/authors`);
      if (response.status === 200 && response.data) {
        this.authors = response.data.data.data;
      }
    },
  },
  created () {
    this.fetchAuthors();
  },
};
</script>

<style lang="scss" scoped>
.grid-container {
  display: grid;
  column-gap: 5px;
  grid-template-columns: auto auto;
}
</style>