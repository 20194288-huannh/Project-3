<template>
  <b-container fluid>
    <HomeSlider/>
    <b-container>
      <HomeTrendingSlider/>
      <HomeBestSeller/>
      <Slider/>
    </b-container>
  </b-container>
</template>

<script>
export default {
  name: 'Index',
  mounted() {
    this.$nextTick(() => {
      this.$nuxt.$loading.start()
      setTimeout(() => this.$nuxt.$loading.finish(), 500)
    })
  }
}
</script>

