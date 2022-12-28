import Vue from 'vue'
import moment from 'moment';
import VueSweetalert2 from 'vue-sweetalert2'
import VueStarRating from 'vue-star-rating';


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
Vue.use(VueSweetalert2, { name: '$swal', VueSweetalert2 })
Vue.prototype.moment = moment
