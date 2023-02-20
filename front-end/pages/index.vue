<template>
  <b-container fluid>
    <HomeSlider />
    <b-container>
      <HomeTrendingSlider />
      <Slider
        @show-modal="showQuickView"
        :books="bookSellers"
        :title="'Best Seller'"
      />
      <Slider
        @show-modal="showQuickView"
        :books="bookSellers"
        :title="'New Arrivals'"
      />
      <div class="d-flex justify-content-between">
        <a href="">
          <img
            width="100%"
            height="100%"
            src="https://www.bookswagon.com/images/promotionimages/web/nonfictionbooksWeb.jpg?v=2.1"
            alt=""
          />
        </a>
        <a href="">
          <img
            width="100%"
            height="100%"
            src="https://www.bookswagon.com/images/promotionimages/web/4_mangamania.jpg?v=2.1"
            alt=""
          />
        </a>
      </div>
      <Slider
        @show-modal="showQuickView"
        :books="bookSellers"
        :title="'International Bestseller'"
      />
      <div class="">
        <a href="">
          <img
            width="100%"
            height="100%"
            src="https://www.bookswagon.com/images/promotionimages/web/MedicalWeb.jpg?v=1.5"
            alt=""
          />
        </a>
      </div>
      <Slider
        @show-modal="showQuickView"
        :books="bookSellers"
        :title="'Award Winners'"
      />
      <Slider
        @show-modal="showQuickView"
        :books="bookSellers"
        :title="'BW Top 100 Books'"
      />
      <Slider
        @show-modal="showQuickView"
        :books="bookSellers"
        :title="'Minimum 40% Discount and Above'"
      />
    </b-container>
    <QuickViewModal ref="modal"/>
  </b-container>
</template>

<script>
export default {
  name: "Index",
  data() {
    return {
      bookSellers: [],
      book: {},
    };
  },
  methods: {
    async fetchBookSellers() {
      const response = await this.$axios.get(`/categories/2/products`);
      if (response.status === 200 && response.data) {
        this.bookSellers = response.data.data;
      }
    },

    showQuickView(id) {
      this.$refs.modal.showQuickView(id)
    },
  },
  created() {
    this.fetchBookSellers();
  },
  mounted() {
    this.$nextTick(() => {
      this.$nuxt.$loading.start();
      setTimeout(() => this.$nuxt.$loading.finish(), 500);
    });
  },
};
</script>
<style>
.price {
  color: #d51912 !important;
  font-size: 1.5rem;
  font-weight: 600;
}
.name {
  font-style: italic;
  font-family: Lato, sans-serif;
  margin: 12px 0px;
}
.info {
  margin-bottom: 1rem;
}
.description {
  margin-bottom: 2rem;
}
</style>
