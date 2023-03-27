<template>
  <b-container>
    <b-breadcrumb :items="breadcrumbs"></b-breadcrumb>
    <b-row>
      <b-col cols="3">
        <div class="book-img">
          <img
            :src="book.image"
            alt="Spy X Family, Vol. 6"
            style="display: inline-block"
            class="card-img-top"
            :title="book.name"
          />
        </div>
      </b-col>
      <b-col cols="9">
        <div class="header">
          <div class="title mb-2">
            <h5 class="text-danger font-italic d-inline-block">
              {{ book.name }}
            </h5>
            <span v-if="book?.product_detail?.binding"
              >({{ book.product_detail.binding }})</span
            >
            <span> | </span>
            <span v-if="book.product_detail?.publisher_date"
              >Released:
              {{ book.product_detail.publisher_date | formatDate }}</span
            >
          </div>
          <div class="author">
            <span v-if="book.author">By: {{ book.author }} (Author) | </span>
            <span v-if="book.product_detail?.publisher"
              >Publisher: {{ book.product_detail.publisher }} |
            </span>
            <span v-if="book.product_detail?.publisher_imprint"
              >Publisher Imprint:
              {{ book.product_detail.publisher_imprint }}</span
            >
          </div>
          <star-rating star-size="30"></star-rating>
        </div>
        <div class="body">
          <h3 class="text-danger">₹548</h3>
          <h5 class="text-muted">
            <del>₹ {{ book.price }}</del>
          </h5>
          <span>International Edition</span>
          <span v-if="book.shipping_time"
            >Ships within <strong>{{ book.shipping_time }}</strong></span
          >
          <span v-if="book.shipping_cost"
            >₹{{ book.shipping_cost }} shipping in India per item and low cost
            Worldwide.</span
          >
          <span v-else>Free Shipping in India and low cost Worldwide.</span>
          <div class="mt-4">
            <b-button variant="danger" @click="buy">Buy Now</b-button>
            <b-button variant="light" class="btn-add-wishlist"
              >Add to Wishlist</b-button
            >
          </div>
        </div>
      </b-col>
    </b-row>
    <div
      class="d-flex flex-column mt-4"
      style="border-bottom: 1px solid rgba(0, 0, 0, 0.1)"
    >
      <span class="text-danger font-weight-bold">About the book</span>
      <span class="font-weight-bold mb-3" v-if="book.description_title">{{
        book.description_title
      }}</span>
      <p>{{ book.description }}</p>
    </div>
    <div class="mt-3">
      <span class="text-danger font-weight-bold">Product Details</span>
      <b-row>
        <b-col cols="6" v-if="book.product_detail?.isbn_13"
          ><strong>ISBN-13:</strong> {{ book.product_detail.isbn_13 }}</b-col
        >
        <b-col cols="6"><strong>ISBN-10:</strong> 1974725138</b-col>
        <b-col cols="6" v-if="book.product_detail?.publisher"
          ><strong>Publisher:</strong>
          {{ book.product_detail.publisher }}</b-col
        >
        <b-col cols="6" v-if="book.product_detail?.publisher_date"
          ><strong>Publisher Date:</strong>
          {{ book.product_detail.publisher_date | formatDate }}</b-col
        >
        <b-col cols="6" v-if="book.product_detail?.publisher_imprint"
          ><strong>Publisher Imprint:</strong>
          {{ book.product_detail.publisher_imprint }}</b-col
        >
        <b-col cols="6" v-if="book.product_detail?.height"
          ><strong>Height:</strong> {{ book.product_detail.height }} mm</b-col
        >
        <b-col cols="6" v-if="book.product_detail?.no_of_pages"
          ><strong>No of Pages:</strong>
          {{ book.product_detail.no_of_pages }}</b-col
        >
        <b-col cols="6" v-if="book.product_detail?.weight"
          ><strong>Weight:</strong> {{ book.product_detail.weight }} gr</b-col
        >
        <b-col cols="6" v-if="book.product_detail?.binding"
          ><strong>Binding:</strong> {{ book.product_detail.binding }}</b-col
        >
        <b-col cols="6" v-if="book.product_detail?.language"
          ><strong>Language:</strong> {{ book.product_detail.language }}</b-col
        >
        <b-col cols="6" v-if="book.product_detail?.returnable"
          ><strong>Returnable:</strong>
          {{ book.product_detail.returnable }}</b-col
        >
        <b-col cols="6" v-if="book.product_detail?.spine_width"
          ><strong>Spine Width:</strong>
          {{ book.product_detail.spine_width }} mm</b-col
        >
        <b-col cols="6" v-if="book.product_detail?.width"
          ><strong>Width:</strong>
          {{ book.product_detail.spine_width }} mm</b-col
        >
      </b-row>
    </div>
    <b-modal
      centered
      scrollable
      size="xl"
      id="bv-modal-order"
      :header-bg-variant="'danger'"
      :header-text-variant="'light'"
    >
      <template #modal-title class="title"> My Shopping Cart </template>
      <b-table :items="orders" :fields="fields">
        <template #cell(actions)="row">
          <b-button
            size="sm"
            variant="link"
            @click="AddtoWishList(row.item)"
            class="mr-1"
          >
            Add to Wishlist
          </b-button>
          <b-button size="sm" variant="link" @click="remove(row.item.id)">
            Remove
          </b-button>
        </template>
        <template #cell(id)="row">
          <span>{{ row.item.product.id }}</span>
        </template>
        <template #cell(description)="row">
          <div class="d-flex">
            <b-img
              left
              :src="row.item?.product?.image"
              alt="Left image"
              height="50"
              class="mr-3"
            ></b-img>
            <div>
              <div>
                <strong>{{ row.item?.product?.name }}</strong>
              </div>
              <div>by {{ row.item?.product?.author }}</div>
            </div>
          </div>
        </template>
        <template #cell(price)="row">
          <div class="d-flex flex-column justify-content-between">
            <span class="text-muted actual-price"
              >${{ row.item?.product?.price }}</span
            >
            <span class="text-muted">${{ row.item?.product?.price }}</span>
          </div>
        </template>
        <template #cell(total_price)="row">
          <div class="d-flex flex-column justify-content-between">
            <span class="text-muted actual-price"
              >${{ row.item?.product?.price }}</span
            >
            <span class="text-muted">${{ row.item?.product?.price }}</span>
          </div>
        </template>
      </b-table>
      <b-row style="border-top: 1px solid #" class="pt-3">
        <b-col cols="6"></b-col>
        <b-col cols="6" style="font-size: 13px">
          <b-row>
            <b-col cols="3">
              <div>Total Gross</div>
              <div>Shipping</div>
              <div class="font-weight-bold">Amount Payable</div>
            </b-col>
            <b-col cols="3">
              <div>: ₹ {{ total_gross }}</div>
              <div>: ₹ 78</div>
              <div style="color: #009900" class="font-weight-bold">
                : ₹ {{ total_gross + 78 }}
              </div>
            </b-col>
            <b-col cols="6">
              <div style="color: #009900" class="font-weight-bold">
                Ships within 14-16 days.
              </div>
              <div></div>
              <div>(International Shipping Calculator)</div>
            </b-col>
          </b-row>
        </b-col>
      </b-row>
      <template #modal-footer>
        <b-button size="lg" variant="danger" @click="payment">
          Place Order
        </b-button>
      </template>
    </b-modal>
  </b-container>
</template>

<script>
export default {
  components: {},
  data() {
    return {
      book: {},
      orders: [],
      breadcrumbs: [
        {
          text: "Home",
          href: "#",
        },
        {
          text: "History & Humanities ",
          href: "#",
        },
        {
          text: "Philosophy",
          href: "#",
        },
        {
          text: "Philosophy: metaphysics & ontology ",
          href: "#",
        },
        {
          text: "Ikigai",
          active: true,
        },
      ],
      fields: [
        { key: "id", label: "Sr.#" },
        { key: "description", label: "Item Description" },
        { key: "quantity", label: "Quantity" },
        { key: "price", label: "Item Price" },
        { key: "total_price", label: "Total Price" },
        { key: "actions", label: "Actions" },
      ],
    };
  },
  methods: {
    async fetchBook() {
      try {
        const response = await this.$axios.get(
          `/products/${this.$route.params.id}`
        );
        if (response.status === 200 && response.data) {
          this.book = response.data.data;
        }
      } catch (e) {
        console.log(e);
      }
    },
    async fetchOrders() {
      const response = await this.$axios.get("/orders/all");
      if (response.status === 200 && response.data) {
        this.orders = response.data.data.data;
        this.total_gross = response.data.data.total_gross;
      }
    },
    showModal() {
      this.$bvModal.show("bv-modal-order");
      this.fetchOrders();
    },
    async remove(id) {
      const response = await this.$axios.post(`/orders/${id}/delete`);
      if (response.status === 200 && response.data) {
        this.$toast.success("Remove order success!");
        this.fetchOrders();
      } else {
        this.$toast.error("Fail");
      }
    },
    payment() {
      this.$router.push("/payment");
    },
    async buy() {
      if (this.$auth.loggedIn) {
        const response = await this.$axios.post(`/orders`, {
          product_id: this.book.id,
        });
        if (response.status === 200 && response.data) {
          this.showModal("bv-modal-order");
        }
      } else {
        this.$router.push("/login");
      }
    },
    async addToWishList(id) {
      if (this.$auth.loggedIn) {
        const response = await this.POST("products/wishlist", {
          product_id: this.book.id,
        });
        this.$router.push("/wishlist");
      } else {
        this.$router.push("/login");
      }
    },
  },
  created() {
    this.fetchBook();
  },
};
</script>

<style lang="scss" scoped>
.breadcrumb {
  background-color: none;
}
.book-img {
  padding: 25px;
  border: 1px solid #dee2e6 !important;
}
.header {
  font-size: 1rem;
  line-height: 1.5rem;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  padding-bottom: 15px;
}
.body {
  display: flex;
  flex-direction: column;
}
.btn-add-wishlist {
  background-color: #fff;
  border: 1px solid #d51912;
  color: #d51912;
}
</style>
