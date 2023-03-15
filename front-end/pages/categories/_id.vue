<template>
  <b-container class="mt-5">
    <div class="d-flex justify-content-between">
      <div class="category-column" style="border-right: 1px solid #999">
        <h4 class="category-title">Browse Categories</h4>
        <ul class="list-group">
          <li
            :class="`list-group-item ${level[parent.level]}`"
            v-for="parent in parents"
            :key="parent.id"
          >
            <b-icon
              class="icon"
              icon="caret-right-fill"
              aria-hidden="true"
            ></b-icon
            ><nuxt-link :to="`/categories/${parent.id}`">{{
              parent.name
            }}</nuxt-link>
          </li>
          <li
            :class="`list-group-item category-active ${level[category.level]}`"
          >
            <b-icon
              class="icon"
              icon="caret-right-fill"
              aria-hidden="true"
            ></b-icon
            ><nuxt-link :to="`/categories/${category.id}`">{{
              category.name
            }}</nuxt-link>
          </li>
          <li
            :class="`list-group-item ${level[child.level]}`"
            v-for="child in children"
            :key="child.id"
          >
            <b-icon
              class="icon"
              icon="caret-right-fill"
              aria-hidden="true"
            ></b-icon
            ><nuxt-link :to="`/categories/${child.id}`">{{
              child.name
            }}</nuxt-link>
          </li>
        </ul>
      </div>
      <div class="book-column">
        <b-breadcrumb :items="breadcrumbs"></b-breadcrumb>
        <div class="d-flex justify-content-between pb-3">
          <h5 class="font-weight-bold">{{ category.name }}</h5>
          <div>
            <span class="font-weight-bold">Sort By: </span>
            <b-dropdown
              split
              split-variant="outline-danger"
              variant="danger"
              text="Relevance"
            >
              <b-dropdown-item href="#">Relevance</b-dropdown-item>
              <b-dropdown-item href="#">Price - Low to High</b-dropdown-item>
              <b-dropdown-item href="#">Price - High to Low</b-dropdown-item>
              <b-dropdown-item href="#">Discount</b-dropdown-item>
            </b-dropdown>
          </div>
        </div>
        <HorizontalBook
          v-for="book in books"
          :key="book.id"
          :book="book"
          @showOrdersModal="showModal"
        />
      </div>
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
  data() {
    return {
      children: [],
      category: {},
      parents: [],
      books: [],
      orders: [],
      breadcrumbs: [],
      total_gross: null,
      fields: [
        { key: "id", label: "Sr.#" },
        { key: "description", label: "Item Description" },
        { key: "quantity", label: "Quantity" },
        { key: "price", label: "Item Price" },
        { key: "total_price", label: "Total Price" },
        { key: "actions", label: "Actions" },
      ],
      level: {
        1: "first",
        2: "second",
        3: "third",
        4: "fourth",
      },
    };
  },
  computed: {},
  methods: {
    async fetchChildCategory() {
      const response = await this.$axios.get(
        `/categories/${this.$route.params.id}/child`
      );
      if (response.status === 200 && response.data) {
        this.children = response.data.data;
      }
    },
    async fetchParentCategory() {
      const response = await this.$axios.get(
        `/categories/${this.$route.params.id}/parent`
      );
      if (response.status === 200 && response.data) {
        this.parents = response.data.data;
      }
    },
    async fetchCategory() {
      const response = await this.$axios.get(
        `/categories/${this.$route.params.id}`
      );
      if (response.status === 200 && response.data) {
        this.category = response.data.data;
      }
    },
    async fetchBooks() {
      const response = await this.$axios.get(
        `/categories/${this.$route.params.id}/products`
      );
      if (response.status === 200 && response.data) {
        this.books = response.data.data;
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
      this.$router.push('/payment')
    }
  },
  async created() {
    await this.fetchParentCategory();
    await this.fetchCategory();
    await this.fetchChildCategory();
    this.fetchBooks();
    this.breadcrumbs = this.parents.map(function ({ id, name }) {
      return {
        text: name,
        to: { name: `categories/${id}` },
      };
    });
    this.breadcrumbs.push({
      text: this.category.name,
      to: { name: `categories/${this.category.id}` },
    });
  },
};
</script>

<style lang="scss" scoped>
.category-column {
  border-right: 1px solid rgb(204, 204, 204);
  width: 20%;
}
.book-column {
  width: 75%;
}
.category-title {
  color: #bc3232;
  font-size: 18px;
  margin-bottom: 10px;
}
.list-group-item {
  border: none !important;
  padding: 0;
  font-size: 14px;
  padding: 4px 0px;
}
.first {
  margin-left: 0px;
}
.second {
  margin-left: 10px;
}
.third {
  margin-left: 20px;
}
.fourth {
  margin-left: 30px;
}
.category-active {
  font-weight: 600;
}
.icon {
  font-size: 12px;
  color: #bc3232;
  padding-right: 3px;
}
.breadcrumb {
  background-color: #fff !important;
}
.italic {
  font-style: italic;
}
.actual-price {
  font-size: 13px;
  text-decoration: line-through;
  font-weight: 600;
}
</style>
