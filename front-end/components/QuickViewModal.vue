<template>
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
          <b-button @click="addToCart" variant="danger" class="mb-2"
            >Add To Cart</b-button
          >
          <b-button @click="addToWishList(book?.id)" variant="outline-danger"
            >Add To Wishlist</b-button
          >
        </b-col>
        <b-col class="d-flex flex-column">
          <div>
            <span v-if="book?.price" class="price">₹{{ book?.price }}</span>
            <span class="text-muted text-decoration-line-through"
              >₹1534.00</span
            >
          </div>
          <h5 v-if="book?.name" class="name">{{ book.name }}</h5>
          <div class="info text-muted">
            <span> By: {{ book?.author }}(Author) | </span>
            <span> Publisher: {{ book?.product_detail?.publisher }} | </span>
            <span>
              Released:
              {{ book?.product_detail?.publisher_date | formatDate }} |
            </span>
          </div>
          <div class="description">
            {{ book?.description }}
          </div>
          <nuxt-link :to="`/books/${book?.id}`">
            <b-button variant="outline-danger" class="w-100"
              >VIEW PRODUCT DETAIL</b-button
            >
          </nuxt-link>
        </b-col>
      </b-row>
    </b-container>
  </b-modal>
</template>

<script>
export default {
  data() {
    return {
      book: {},
    };
  },
  methods: {
    async fetchBook(id) {
      const response = await this.$axios.get(`/products/${id}`);
      if (response.status === 200 && response.data) {
        this.book = response.data.data;
      }
    },
    async showQuickView(id) {
      await this.fetchBook(id);
      this.$bvModal.show("bv-modal-quick-view");
    },
    async addToCart() {
      if (this.$auth.loggedIn) {
        const response = await this.$axios.post(`/orders`, {
          product_id: this.book.id,
        });
        if (response.status === 200 && response.data) {
          this.$toast.success("Add To Cart Successed!");
          this.$bvModal.hide("bv-modal-quick-view");
        }
      } else {
        this.$router.push("/login");
      }
    },
    async addToWishList(id) {
      if (this.$auth.loggedIn) {
        const response = await this.$axios.post("products/wishlist", {
          product_id: id,
        });
        if (response.status === 200 && response.data) {
          this.$toast.success("Add To WishList Successed!");
          this.$bvModal.hide("bv-modal-quick-view");
        }
      } else {
        this.$router.push("/login");
      }
    },
  },
};
</script>

<style lang="scss" scoped></style>
