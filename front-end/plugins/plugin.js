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

Vue.filter('formatDate', (value) => {
  if (!value) return ''
  const objDate = new Date(value);
  const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  if (objDate !== 'Invalid Date' && !isNaN(objDate)) {
    return (objDate.getDate() + ' ' + months[objDate.getMonth()] + ' ' + objDate.getFullYear())
  }
  return value;
})

Vue.component('star-rating', VueStarRating);
Vue.component('multi-range-slider', MultiRangeSlider);
Vue.component('carousel', carousel);
Vue.use(VueSweetalert2, { name: '$swal', VueSweetalert2 })
Vue.prototype.moment = moment
