<template>
  <div>
    <div class="d-flex justify-content-between mt-4">
      <h3 class="title">{{ title }}</h3>
      <nuxt-link class="see-all" to="">See All</nuxt-link>
    </div>
    <swiper
      class="swiper"
      :options="swiperOption"
      ref="swiper"
      style="padding: 0 28px 30px 28px"
    >
      <swiper-slide v-for="(book, index) in books" :key="index">
        <VerticalBook :book="book" @show-modal-quick-view="showModal"/>
      </swiper-slide>
      <div class="swiper-pagination mt-4" slot="pagination"></div>
      <div class="swiper-button-prev" slot="button-prev" @click="prev()"></div>
      <div class="swiper-button-next" slot="button-next" @click="next()"></div>
    </swiper>
  </div>
</template>

<script>
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/swiper-bundle.css";
export default {
  data() {
    return {
      swiperOption: {
        slidesPerView: 7,
        spaceBetween: 10,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        autoplay: true,
      },
      isShowQuickView: 0,
    };
  },
  props: {
    books: {
      type: Array,
      default: [],
    },
    title: {
      type: String,
      default: "",
    },
  },
  methods: {
		prev() {
			this.$refs.swiper.$swiper.slidePrev();
		},
		next() {
			this.$refs.swiper.$swiper.slideNext();
		},
    showModal(id) {
      this.$emit("show-modal", id);
    },
	}
};
</script>

<style scoped>
.swiper-button-next:after {
  margin-left: 30px;
  margin-bottom: 100px;
  font-size: 30px;
  color: #000;
}

.swiper-button-prev:after {
  margin-right: 30px;
  margin-bottom: 100px;
  font-size: 30px;
  color: #000;
}

.see-all {
  color: red;
  margin: auto 0;
}
</style>
