<template>
  <div>
    <LoadingBar v-if="isLoading"/>
    <Nuxt />
  </div>
</template>
<script>
export default {
  computed: {
    isLoading() {
      return this.$store.state.isLoading
    }
  }
};
</script>