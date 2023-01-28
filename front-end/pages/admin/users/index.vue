<template>
  <div class="my-5">
    <h4 class="mb-3">Users</h4>
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
            <b-th scope="col">Email</b-th>
            <b-th scope="col">Role</b-th>
            <b-th scope="col">Address</b-th>
            <b-th scope="col">Phone</b-th>
            <b-th scope="col"></b-th>
          </b-tr>
        </b-thead>
        <tbody>
          <b-tr v-for="user in users" :key="user.id">
            <b-th scope="row">{{user.id}}</b-th>
            <b-td>{{user.name}}</b-td>
            <b-td>{{user.email}}</b-td>
            <b-td>{{user.role == 1 ? 'Admin' : 'Customer'}}</b-td>
            <b-td>{{user.address}}</b-td>
            <b-td>{{user.phone}}</b-td>
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
      users: [],
      pagination: null,
      page: 1,
    }
  },
  methods: {
    async fetchUsers() {
      try {
        const response = await this.$axios.get('/users')
        if (response.status === 200 && response.data) {
          this.users = response.data.data.data
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
    this.fetchUsers();
  },
};
</script>

<style lang="css" scoped></style>
