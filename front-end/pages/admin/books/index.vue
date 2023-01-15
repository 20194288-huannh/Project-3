<template>
  <div class="my-5">
    <h4 class="mb-3">Recent Orders</h4>
    <div>
      <b-pagination
        v-model="page"
        :total-rows="pagination?.total"
        :per-page="15"
      ></b-pagination>
      <b-table-simple :item="books" :per-page="15"
      :current-page="page">
        <b-thead>
          <b-tr>
            <b-th scope="col" width="50">#</b-th>
            <b-th scope="col">Name</b-th>
            <b-th scope="col">Image</b-th>
            <b-th scope="col">Author</b-th>
            <b-th scope="col">Price</b-th>
            <b-th scope="col">Sale</b-th>
            <b-th scope="col"></b-th>
          </b-tr>
        </b-thead>
        <tbody>
          <b-tr v-for="book in books" :key="book.id">
            <b-th scope="row">{{book.id}}</b-th>
            <b-td>{{book.name}}</b-td>
            <b-td><b-img :src="book.image" height="120" alt="Responsive image"></b-img></b-td>
            <b-td>{{book.author}}</b-td>
            <b-td>{{book.price}}</b-td>
            <b-td>{{book.sale}}</b-td>
            <b-td>
              <b-button variant="primary"
                ><b-icon
                  icon="pencil-fill"
                  scale="0.75"
                ></b-icon
              ></b-button>
              <b-button variant="danger"><b-icon
                  icon="trash-fill"
                  scale="0.75"
                ></b-icon></b-button>
            </b-td>
          </b-tr>
        </tbody>
      </b-table-simple>
    </div>
  </div>
</template>

<script>
export default {
  layout: "admin",
  data() {
    return {
      books: [],
      pagination: null,
      page: 1,
    }
  },
  methods: {
    async fetchBooks() {
      try {
        const response = await this.$axios.get('/products')
        if (response.status === 200 && response.data) {
          this.books = response.data.data.data
          this.pagination = response.data.data.meta;
          this.page = this.pagination.current_page;
        }
      }
      catch (e) {
        console.log(e)
      }
    }
  },
  created () {
    this.fetchBooks();
  },
};
</script>

<style lang="css" scoped></style>
