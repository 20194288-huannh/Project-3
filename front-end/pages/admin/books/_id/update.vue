<template>
  <div class="card">
    <div class="card-header">
      <h4 v-if="Number(id) === 0">Add Book</h4>
      <h4 v-else>Edit Book</h4>
    </div>
    <AdminBookForm />
  </div>
</template>

<script>
export default {
  layout: "admin",
  data() {
    return {
      id: this.$route.params.id,
    };
  },
};
</script>

<style scoped></style>
