<template>
  <div class="my-5">
    <h4 class="mb-3">Users</h4>
    <div>
      <b-pagination
        v-model="page"
        :total-rows="pagination?.total"
        :per-page="15"
      ></b-pagination>
      <b-table-simple :item="books" :per-page="15" :current-page="page">
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
            <b-th scope="row">{{ user.id }}</b-th>
            <b-td>{{ user.name }}</b-td>
            <b-td>{{ user.email }}</b-td>
            <b-td>{{ user.role == 1 ? "Admin" : "Customer" }}</b-td>
            <b-td>{{ user.address }}</b-td>
            <b-td>{{ user.phone }}</b-td>
            <b-td>
              <b-button variant="primary">
                <b-icon
                  icon="pencil-fill"
                  @click="editUser(user.id)"
                  scale="0.75"
                ></b-icon>
              </b-button>
              <b-button variant="danger">
                <b-icon
                  icon="trash-fill"
                  scale="0.75"
                  @click="deleteUser(user.id)"
                ></b-icon>
              </b-button>
            </b-td>
          </b-tr>
        </tbody>
      </b-table-simple>
    </div>
    <b-modal
      id="modal-user"
      size="lg"
      :hide-footer="true"
      centered
      @show="resetModal"
      title="Update User"
    >
      <b-container>
        <b-form>
          <b-row>
            <b-col><label>Name</label></b-col>
            <b-col cols="8">
              <b-form-input v-model="user.name" maxlength="255" />
            </b-col>
          </b-row>
          <b-row class="mt-3">
            <b-col><label>Email</label></b-col>
            <b-col cols="8">
              <b-form-input v-model="user.email" maxlength="255" />
            </b-col>
          </b-row>
          <b-row class="mt-3">
            <b-col><label>Role</label></b-col>
            <b-col cols="8">
              <b-form-radio-group
                id="radio-group-1"
                v-model="user.role"
                :options="statuses"
                :aria-describedby="ariaDescribedby"
                name="radio-options"
              ></b-form-radio-group>
            </b-col>
          </b-row>
          <b-row class="mt-3">
            <b-col><label>Address</label></b-col>
            <b-col cols="8">
              <b-form-input v-model="user.address" maxlength="255" />
            </b-col>
          </b-row>
          <b-row class="mt-3">
            <b-col><label>Phone Number</label></b-col>
            <b-col cols="8">
              <b-form-input v-model="user.phone" maxlength="255" />
            </b-col>
          </b-row>
          <div class="mt-3 text-center">
            <b-button variant="primary" class="mr-1" @click="updateUser()">
              Save
            </b-button>
            <b-button variant="danger" @click="$bvModal.hide('modal-user')">
              Cancel
            </b-button>
          </div>
        </b-form>
      </b-container>
    </b-modal>
  </div>
</template>

<script>
export default {
  layout: "admin",
  data() {
    return {
      users: [],
      user: {},
      pagination: null,
      page: 1,
      form_update: {},
      statuses: [
        {
          text: "Admin",
          value: 1,
        },
        {
          text: "Customer",
          value: 2,
        },
      ],
    };
  },
  methods: {
    async fetchUsers() {
      try {
        const response = await this.$axios.get("/users");
        if (response.status === 200 && response.data) {
          this.users = response.data.data.data;
          this.pagination = response.data.data.meta;
          this.page = this.pagination.current_page;
        }
      } catch (e) {
        console.log(e);
      }
    },
    async fetchUser(id) {
      try {
        const response = await this.$axios.get(`/users/${id}`);
        if (response.status === 200 && response.data) {
          this.user = response.data.data;
        }
      } catch (e) {
        console.log(e);
      }
    },
    async deleteUser(id) {
      const result = await this.$swal({
        title: "Are you sure?",
        text: "Once deleted, there is no going back",
        icon: "warning",
        showCancelButton: true,
        dangerMode: true,
      });
      if (result.value) {
        const response = await this.POST(`/users/${id}/delete`);
        if (response && response.success) {
          this.$toast.success(response.message || "Successfully");
          this.fetchUsers();
        }
      }
    },
    resetModal() {
      this.user = {}
    },
    editUser(id) {
      this.fetchUser(id)
      this.$bvModal.show("modal-user");
    },
    async updateUser() {
      try {
        const response = await this.$axios.post(`/users/${id}`, {user: this.user});
        if (response.status === 200 && response.data) {
          this.user = response.data.data;
        }
      } catch (e) {
        console.log(e);
      }
    }
  },
  created() {
    this.fetchUsers();
  },
};
</script>

<style lang="css" scoped></style>
