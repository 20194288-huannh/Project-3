<template>
  <b-container class="mt-5 ">
    <div class="d-flex justify-content-between">
      <div class="category-column" style = "border-right: 1px solid #999">
        <h4 class="category-title">Browse Categories</h4>
        <ul class="list-group">
          <li :class="`list-group-item ${level[parent.level]}`" v-for="parent in parents" :key="parent.id"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon><nuxt-link :to="`/categories/${parent.id}`">{{parent.name}}</nuxt-link></li>
          <li :class="`list-group-item category-active ${level[category.level]}`"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon><nuxt-link :to="`/categories/${category.id}`">{{category.name}}</nuxt-link></li>
          <li :class="`list-group-item ${level[child.level]}`" v-for="child in children" :key="child.id"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon><nuxt-link :to="`/categories/${child.id}`">{{child.name}}</nuxt-link></li>
        </ul>
      </div>
      <div class="book-column">
        <b-breadcrumb :items="breadcrumbs"></b-breadcrumb>
        <div class="d-flex justify-content-between pb-3">
          <h5 class="font-weight-bold">{{category.name}}</h5>
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
        <HorizontalBook v-for="book in books" :key="book.id" :book="book"/>
      </div>
    </div>
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
      breadcrumbs: [],
      level: {
        1 : 'first',
        2 : 'second',
        3 : 'third',
        4 : 'fourth',
      }
    };
  },
  computed: {
  },
  methods: {
    async fetchChildCategory() {
      const response = await this.$axios.get(`/categories/${this.$route.params.id}/child`)
      if (response.status === 200 && response.data) {
        this.children = response.data.data
      }
    },
    async fetchParentCategory() {
      const response = await this.$axios.get(`/categories/${this.$route.params.id}/parent`)
      if (response.status === 200 && response.data) {
        this.parents = response.data.data
      }
    },
    async fetchCategory() {
      const response = await this.$axios.get(`/categories/${this.$route.params.id}`)
      if (response.status === 200 && response.data) {
        this.category = response.data.data
      }
    },
    async fetchBooks() {
      const response = await this.$axios.get(`/categories/${this.$route.params.id}/products`)
      if (response.status === 200 && response.data) {
        this.books = response.data.data
      }
    }
  },
  async created () {
    await this.fetchParentCategory()
    await this.fetchCategory()
    await this.fetchChildCategory()
    this.fetchBooks()
    this.breadcrumbs = this.parents.map(function ({id, name}) {
      return {
        text: name,
        to: { name: `categories/${id}`}
      }
    })
    this.breadcrumbs.push({text: this.category.name, to: {name: `categories/${this.category.id}`}});
    console.log(this.breadcrumbs)
  },
};
</script>

<style lang="scss" scoped>
.category-column{
  border-right: 1px solid rgb(204, 204, 204);
  width: 20%;
}
.book-column{
  width: 75%;
}
.category-title{
  color: #BC3232;
  font-size: 18px;
  margin-bottom: 10px;
}
.list-group-item{
  border: none !important;
  padding: 0;
  font-size: 14px;
  padding: 4px 0px;
}
.first{
  margin-left: 0px;
}
.second{
  margin-left: 10px;
}
.third{
  margin-left: 20px;
}
.fourth{
  margin-left: 30px;
}
.category-active{
  font-weight: 600;
}
.icon{
  font-size: 12px;
  color: #BC3232;
  padding-right: 3px;
}
.breadcrumb {
  background-color: #fff !important;
}
</style>