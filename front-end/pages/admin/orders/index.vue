<template>
  <div class="my-5">
    <h4 class="mb-3">Orders</h4>
    <div>
      <b-row>
        <b-table per-page="15" :current-page="page" hover :items="orders" :fields="fields" id="my-table">
          <template #cell(month)="row">
            {{
              new Date(row.item.payment.payment_date).toLocaleString(
                "default",
                { month: "long" }
              )
            }}
          </template>
          <template #cell(user_name)="row">
            {{ row.item.user.name }}
          </template>
          <template #cell(total_price)="row">
            {{ row.item.total_price }}
          </template>
          <template #cell(date)="row">
            {{ row.item.payment.payment_date }}
          </template>
          <template #cell(payment_method)="row">
            {{ row.item.payment_method }}
          </template>
          <template #cell(collapse)="row">
            <b-link size="sm" @click="row.toggleDetails" class="mr-2">
              {{ row.detailsShowing ? "Hide" : "Show" }} Detail
            </b-link>
          </template>
          <template #row-details="row">
            <b-card>
              <b-table :items="row.item.orders" :fields="fieldsOrderTable">
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
                    <span class="text-muted text-decoration-line-through"
                      >${{ row.item?.actual_price }}</span
                    >
                  </div>
                </template>
                <template #cell(total_price)="row">
                  <div class="d-flex flex-column justify-content-between">
                    <span class="text-muted actual-price"
                      >${{ row.item?.product?.price }}</span
                    >
                  </div>
                </template>
              </b-table>
            </b-card>
          </template>
        </b-table>
      </b-row>
      <b-pagination v-model="page" :total-rows="pagination?.total" per-page="15" @input="paginate" :aria-controls="'my-table'"></b-pagination>
    </div>
  </div>
</template>

<script>
export default {
  layout: "admin",
  data() {
    return {
      orders: [],
      pagination: null,
      page: 1,
      fields: [
        "Month",
        {
          key: "user_name",
          label: "User",
        },
        {
          key: "total_price",
          label: "Total Price",
        },
        "Date",
        {
          key: "payment_method",
          label: "Payment Method",
        },
        {
          key: "collapse",
          label: "",
        },
      ],
      fieldsOrderTable: [
        { key: "id", label: "Sr.#" },
        { key: "description", label: "Item Description" },
        { key: "quantity", label: "Quantity" },
        { key: "price", label: "Item Price" },
        { key: "total_price", label: "Total Price" },
      ],
    };
  },
  methods: {
    paginate(page) {
      this.$router.push({
        path: this.$route.path,
        query: {
          page: this.page,
        },
      });
      this.fetchOrders();
    },
    async fetchOrders() {
      try {
        const response = await this.$axios.get("/carts", {
          params: {
            page: this.page,
          },
        });
        if (response.status === 200 && response.data) {
          this.orders = response.data.data;
          this.pagination = response.data.data.meta;
          this.page = this.pagination.current_page;
        }
      } catch (e) {
        console.log(e);
      }
    },
  },
  created() {},
  mounted() {
    this.fetchOrders();
    this.page = this.$route.query.page || 1;
  },
};
</script>

<style lang="css" scoped></style>
