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
    <b-modal
      centered
      scrollable
      size="lg"
      id="bv-modal-quick-view"
      :hide-footer="true"
    >
      <b-container fluid class="p-5">
        <b-row>
          <b-col cols="3" class="d-flex flex-column">
            <img
              :src="
                book?.image ||
                'https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/notavailable.gif'
              "
              alt=""
              class="mb-2"
            />
            <b-button variant="danger" class="mb-2">Add To Cart</b-button>
            <b-button variant="outline-danger">Add To Wishlist</b-button>
          </b-col>
          <b-col class="d-flex flex-column">
            <div>
              <span v-if="book?.price" class="price">₹{{book?.price}}</span>
              <span class="text-muted text-decoration-line-through"
                >₹1534.00</span
              >
            </div>
            <h5 v-if="book?.name" class="name">{{book.name}}</h5>
            <div class="info text-muted">
              <span>
                By: {{book?.author}}(Author) | 
              </span>
              <span>
                Publisher: {{book?.product_detail?.publisher}} |
              </span>  
              <span>
                Released: {{book?.product_detail?.publisher_date | formatDate}} |
              </span>
            </div>
            <div class="description">
              {{book?.description}}
            </div>
            <nuxt-link :to="`/books/${book?.id}`"><b-button variant="outline-danger" class="w-100">VIEW PRODUCT DETAIL</b-button></nuxt-link>
          </b-col>
        </b-row>
      </b-container>
    </b-modal>
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
    async fetchBook(id) {
      const response = await this.$axios.get(`/products/${id}`);
      if (response.status === 200 && response.data) {
        this.book = response.data.data;
      }
    },

    showQuickView(id) {
      this.fetchBook(id);
      this.$bvModal.show("bv-modal-quick-view");
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
