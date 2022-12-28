<template>
  <b-container fluid>
    <HomeSlider/>
    <HomeTrendingSlider/>
    <HomeBestSeller/>
  </b-container>
</template>

<script>
import Slider from '~/components/home/Slider'
import TrendingSlider from '../components/home/TrendingSlider.vue'
import BestSeller from '../components/home/BestSeller.vue'
export default {
  components: { Slider, TrendingSlider, BestSeller },
  name: 'Index',
}

