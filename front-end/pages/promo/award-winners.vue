<template>
  <b-container fluid class="p-5">
    <Promo :title="'Award Winner'" :api="'products/award-winner'" @show-quick-view="showQuickView"/>
    <QuickViewModal ref="modal"/>
  </b-container>
</template>

<script>
export default {
  methods: {
    showQuickView(id) {
      this.$refs.modal.showQuickView(id)
    },
  },
};
</script>

<style scoped>
</style>
<style src="../../node_modules/multi-range-slider-vue/MultiRangeSliderBarOnly.css">
</style>
