<template>
  <div class="row g-3 my-2">
    <div class="col-md-3">
      <div
        class="
          p-3
          bg-white
          shadow-sm
          d-flex
          justify-content-around
          align-items-center
          rounded
        "
      >
        <div>
          <h3>720</h3>
          <p>Books</p>
        </div>
        <b-icon
          icon="book-fill"
          variant="success"
          class="primary-text border rounded-full secondary-bg p-4"
          shift-h="-8"
          shift-v="8"
          scale = "2.5"
        >
        </b-icon>
      </div>
    </div>

    <div class="col-md-3">
      <div
        class="
          p-3
          bg-white
          shadow-sm
          d-flex
          justify-content-around
          align-items-center
          rounded
        "
      >
        <div>
          <h3>4920</h3>
          <p>User</p>
        </div>
        <b-icon
          icon="person-fill"
          variant="success"
          class="primary-text border rounded-full secondary-bg p-4"
          shift-h="-8"
          shift-v="8"
          scale = "2.5"
        >
        </b-icon>
      </div>
    </div>

    <div class="col-md-3">
      <div
        class="
          p-3
          bg-white
          shadow-sm
          d-flex
          justify-content-around
          align-items-center
          rounded
        "
      >
        <div>
          <h3>3899</h3>
          <p>Voucher</p>
        </div>
        <b-icon
          icon="stickies-fill"
          variant="success"
          class="primary-text border rounded-full secondary-bg p-4"
          shift-h="-8"
          shift-v="8"
          scale = "2.5"
        >
        </b-icon>
      </div>
    </div>

    <div class="col-md-3">
      <div
        class="
          p-3
          bg-white
          shadow-sm
          d-flex
          justify-content-around
          align-items-center
          rounded
        "
      >
        <div>
          <h3>300</h3>
          <p>Orders</p>
        </div>
        <b-icon
          icon="cart-fill"
          variant="success"
          class="primary-text border rounded-full secondary-bg p-4"
          shift-h="-8"
          shift-v="8"
          scale="2.5"
        >
        </b-icon>
      </div>
    </div>
    <order-chart class="w-100 mt-5" :orderChart="chart"></order-chart>
    <book-chart class="w-100 mt-5" :bookChart="books"></book-chart>
  </div>
</template>

<script>
export default {
  layout: "admin",
  data () {
    return {
      chart: [],
      books: [],
    }
  },
  async created () {
    await this.fetchOrderChart();
    await this.fetchBookChart()
  },
  methods: {
    async fetchOrderChart() {
      try {
        const response = await this.$axios.get("/orders/total-orders-recent-year");
        if (response.status === 200 && response.data) {
          this.chart = response.data.data;
        }
      } catch (e) {
        console.log(e);
      }
    },
    async fetchBookChart() {
      try {
        const response = await this.$axios.get("/orders/total-books-recent-year");
        if (response.status === 200 && response.data) {
          this.books = response.data.data;
        }
      } catch (e) {
        console.log(e);
      }
    }
  },
};
</script>

<style lang="scss" scoped>
.icon-size{
  font-size: 30px !important;
}
</style>