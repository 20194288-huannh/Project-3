<template>
  <div class="my-5">
    <b-form inline>
      <label class="ml-3">Category</label>
      <b-form-select
        v-model="search.category_level_1"
        class="mb-2 mx-sm-2 mb-sm-0"
        :options="categories_level_1"
        :value="null"
        @change="category_level_1()"
      />
      <label class="ml-3"></label>
      <b-form-select
        v-if="search.category_level_1"
        v-model="search.category_level_2"
        class="mb-2 mx-sm-2 mb-sm-0"
        :options="categories_level_2"
        :value="null"
        @change="category_level_2()"
      />
    </b-form>
    <h4 class="mb-3">Category</h4>
    <div>
      <b-table-simple per-page="15" :current-page="page" id="my-table">
        <b-thead>
          <b-tr>
            <b-th scope="col" width="50">#</b-th>
            <b-th scope="col">Name</b-th>
            <b-th scope="col"></b-th>
          </b-tr>
        </b-thead>
        <tbody>
          <b-tr v-for="category in selected_sub_category" :key="category.id">
            <b-th scope="row" class="align-middle">{{ category.id }}</b-th>
            <b-td>{{ category.name }}</b-td>
            <b-td>
              <b-button variant="primary"
                ><b-icon icon="pencil-fill" scale="0.75"></b-icon
              ></b-button>
              <b-button variant="danger" @click="deleteCategory(book.id)"
                ><b-icon icon="trash-fill" scale="0.75"></b-icon
              ></b-button>
            </b-td>
          </b-tr>
        </tbody>
      </b-table-simple>
      <b-pagination
        v-model="page"
        :total-rows="pagination?.total"
        per-page="15"
        @input="paginate"
        :aria-controls="'my-table'"
      ></b-pagination>
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
      selected_category: null,
      selected_sub_category: [],
      search: {
        category_level_1: null,
        category_level_2: null,
        category_level_3: null,
      },
      categories_level_1: [],
      categories_level_2: [],
      categories_level_3: [],
    };
  },
  methods: {
    async fetchHighestCategory() {
      try {
        this.selected_category = this.search.category_level_2 || this.search.category_level_1
        const response = await this.$axios.get("/categories/highest");
        if (response.status === 200 && response.data) {
          this.categories_level_1 = response.data.data;
          this.selected_sub_category = this.categories_level_1
          this.categories_level_1 = this.categories_level_1.map(function (
            $item
          ) {
            return {
              value: $item.id,
              text: $item.name,
            };
          });
        }
      } catch (e) {
        console.log(e);
      }
    },
    async fetchCategoryLevel2() {
      try {
        this.selected_category = this.search.category_level_2 || this.search.category_level_1
        const response = await this.$axios.get(
          `/categories/${this.search.category_level_1}/child`
        );
        if (response.status === 200 && response.data) {
          this.categories_level_2 = response.data.data;
          this.selected_sub_category = this.categories_level_2
          this.categories_level_2 = this.categories_level_2.map(function (
            $item
          ) {
            return {
              value: $item.id,
              text: $item.name,
            };
          });
        }
      } catch (e) {
        console.log(e);
      }
    },
    async fetchCategoryLevel3() {
      try {
        const response = await this.$axios.get(
          `/categories/${this.search.category_level_2}/child`
        );
        if (response.status === 200 && response.data) {
          this.categories_level_3 = response.data.data;
          this.selected_sub_category = this.categories_level_3
          this.categories_level_3 = this.categories_level_3.map(function (
            $item
          ) {
            return {
              value: $item.id,
              text: $item.name,
            };
          });
        }
      } catch (e) {
        console.log(e);
      }
    },
    paginate(page) {
      this.$router.push({ path: this.$route.path, query: { page: this.page } });
    },
    category_level_1() {
      this.fetchCategoryLevel2()
    },
    category_level_2() {
      this.fetchCategoryLevel3()
    },
    category_level_3() {
      
    },
  },
  created() {},
  mounted() {
    this.page = this.$route.query.page || 1;
    this.fetchHighestCategory();
  },
};
</script>

<style lang="css" scoped></style>
