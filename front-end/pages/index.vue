<template>
  <b-container fluid>
    <HomeSlider />
    <b-container>
      <HomeTrendingSlider />
      <HomeBestSeller />
      <Slider @showModalQuickView="showQuickView" />
    </b-container>
    <b-modal centered scrollable size="lg" id="bv-modal-quick-view" :hide-footer="true">
      <b-container fluid class="p-5">
        <b-row>
          <b-col cols="3" class="d-flex flex-column">
            <img
              src="https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/454/9780593420454.jpg"
              alt=""
              class="mb-2"
            />
            <b-button variant="danger" class="mb-2">Add To Cart</b-button>
            <b-button variant="outline-danger">Add To Wishlist</b-button>
          </b-col>
          <b-col class="d-flex flex-column">
            <div>
              <span class="price">₹1534.00</span>
              <span class="text-muted text-decoration-line-through"
                >₹1534.00</span
              >
            </div>
            <h5 class="name">The Power of Unwavering Focus</h5>
            <div class="info text-muted">
              <span>
                By: Dandapani(Author) | Publisher: Penguin Publishing Group |
                Released: 06 Sep 2022 |
              </span>
            </div>
            <div class="description">
              Timeless lessons on wealth, greed, and happiness doing well with
              money isn?t necessarily about what you know. It?s about how you
              behave. And behavior is hard to teach, even to really smart
              people. How ...
            </div>
            <<nuxt-link to="/books/"></nuxt-link>
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
    return {};
  },
  methods: {
    showQuickView() {
      this.$bvModal.show("bv-modal-quick-view");
    },
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
.description{
  margin-bottom: 2rem;
}
</style>
