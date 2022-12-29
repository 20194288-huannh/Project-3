import Vue from 'vue'
import moment from 'moment';
import VueSweetalert2 from 'vue-sweetalert2'
import VueStarRating from 'vue-star-rating';
import MultiRangeSlider from "multi-range-slider-vue";
import carousel from 'vue-owl-carousel'


Vue.filter('startCase', (str) => {
  if (!str) return ''
  str = _.startCase(str.toString())
  return str
})

Vue.filter('formatDate', (value, format = 'DD/MM/YYYY') => {
  if (!value) return ''
  return moment(value).format(format)
})

Vue.component('star-rating', VueStarRating);
Vue.component('multi-range-slider', MultiRangeSlider);
Vue.component('carousel', carousel);
Vue.use(VueSweetalert2, { name: '$swal', VueSweetalert2 })
Vue.prototype.moment = moment
