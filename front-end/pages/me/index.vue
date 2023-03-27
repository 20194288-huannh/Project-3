<template>
  <b-container style="margin-top: 70px">
    <b-row>
      <b-col cols="12">
        <b-tabs
          pills
          vertical
          active-nav-item-class="active-tab"
          title-item-class="title"
          nav-wrapper-class="w-25"
        >
          <b-tab>
            <template #title>
              <span class="title">Account</span>
            </template>
            <h4>Account Infomation</h4>
            <b-row class="p-3">
              <b-col cols="3" class="d-flex flex-column">
                <span class="font-weight-bold">ID: </span>
                <span class="font-weight-bold">Name: </span>
                <span class="font-weight-bold">Email: </span>
                <span class="font-weight-bold">Role: </span>
                <span class="font-weight-bold">Address: </span>
                <span class="font-weight-bold">Phone: </span>
              </b-col>
              <b-col cols="8" class="d-flex flex-column">
                <span>{{ user?.id }}</span>
                <span>{{ user?.name }}</span>
                <span>{{ user?.email }}</span>
                <span>{{ user?.role == 1 ? "Admin" : "Customer" }}</span>
                <span>{{ user?.address }}</span>
                <span>{{ user?.phone }}</span>
              </b-col>
            </b-row>
          </b-tab>
          <b-tab>
            <template #title>
              <span class="title mb-3">Orders</span>
            </template>
            <h4>Orders History</h4>
            <b-table hover :items="orders" :fields="fields">
              <template #cell(month)="row">
                {{
                  new Date(row.item.payment.payment_date).toLocaleString(
                    "default",
                    { month: "long" }
                  )
                }}
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
                        <span class="text-muted"
                          >${{ row.item?.product?.price }}</span
                        >
                      </div>
                    </template>
                    <template #cell(total_price)="row">
                      <div class="d-flex flex-column justify-content-between">
                        <span class="text-muted actual-price"
                          >${{ row.item?.product?.price }}</span
                        >
                        <span class="text-muted"
                          >${{ row.item?.product?.price }}</span
                        >
                      </div>
                    </template>
                  </b-table>
                </b-card>
              </template>
            </b-table>
          </b-tab>
          <b-tab title="Wishlist" class="active">
            <template #title>
              <span class="title">Wishlist</span>
            </template>
            <h4>Orders History</h4>
            <Wishlist />
          </b-tab>
        </b-tabs>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  data() {
    return {
      expandedRows: [],
      user: {},
      orders: [],
      fields: [
        "Month",
        {
          key: "order_number",
          label: "Order Number",
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
    logout() {
      this.$auth.logout();
      this.$router.push("/");
    },
    async fetchOrders() {
      const response = await this.$axios.get(`/users/${this.user.id}/carts`);
      if (response.status === 200 && response.data) {
        this.orders = response.data.data;
        console.log(this.orders);
      }
    },
  },
  created() {
    this.user = this.$auth.user;
    this.fetchOrders();
  },
};
</script>

<style>
.active-tab {
  border-left: 5px solid #007bff !important;
  background-color: #fff !important;
  color: rgba(0, 0, 0, 0.85) !important;
}

.title {
  font-size: 20px !important;
  padding-left: 20px !important;
  border-radius: 0 !important;
}

.active-tab .title {
  padding-left: 15px !important;
}
</style>
