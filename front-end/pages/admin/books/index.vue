<template>
<div class="my-5">
    <h4 class="mb-3">Books Table</h4>
    <b-form inline>
        <label class="ml-3">Category</label>
        <b-form-select v-model="search.category_level_1" class="mb-2 mx-sm-2 mb-sm-0" :options="categories_level_1" :value="null" @change="category_level_1()" />
        <b-form-select v-if="search.category_level_1" v-model="search.category_level_2" class="mb-2 mx-sm-2 mb-sm-0" :options="categories_level_2" :value="null" @change="category_level_2()" />
        <b-form-select v-if="search.category_level_2" v-model="search.category_level_3" class="mb-2 mx-sm-2 mb-sm-0" :options="categories_level_2" :value="null" @change="category_level_3()" />
    </b-form>
    <div>
        <b-table-simple per-page="15" :current-page="page" id="my-table">
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
                    <b-th scope="row" class="align-middle">{{ book.id }}</b-th>
                    <b-td>{{ book.name }}</b-td>
                    <b-td>
                        <b-img :src="book.image" height="120" alt="Responsive image"></b-img>
                    </b-td>
                    <b-td>{{ book.author }}</b-td>
                    <b-td>{{ book.price }}</b-td>
                    <b-td>{{ book.sale }}</b-td>
                    <b-td>
                        <nuxt-link :to="`/admin/books/${book.id}/update`">
                            <b-button variant="primary"><b-icon icon="pencil-fill" scale="0.75"></b-icon></b-button>
                        </nuxt-link>
                        <b-button variant="danger" @click="deleteBook(book.id)">
                            <b-icon icon="trash-fill" scale="0.75"></b-icon>
                        </b-button>
                    </b-td>
                </b-tr>
            </tbody>
        </b-table-simple>
        <b-pagination v-model="page" :total-rows="pagination?.total" per-page="15" @input="paginate" :aria-controls="'my-table'"></b-pagination>
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
        async fetchBooks() {
            try {
                const response = await this.$axios.get("/products", {
                    params: {
                        page: this.page,
                        category: this.search.category_level_3 ||
                            this.search.category_level_2 ||
                            this.search.category_level_1,
                    },
                });
                if (response.status === 200 && response.data) {
                    this.books = response.data.data.data;
                    this.pagination = response.data.data.meta;
                    this.page = this.pagination.current_page;
                }
            } catch (e) {
                console.log(e);
            }
        },
        async fetchHighestCategory() {
            try {
                const response = await this.$axios.get("/categories/highest");
                if (response.status === 200 && response.data) {
                    this.categories_level_1 = response.data.data;
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
                const response = await this.$axios.get(
                    `/categories/${this.search.category_level_1}/child`
                );
                if (response.status === 200 && response.data) {
                    this.categories_level_2 = response.data.data;
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
            this.$router.push({
                path: this.$route.path,
                query: {
                    page: this.page
                }
            });
            this.fetchBooks();
        },
        async deleteBook(id) {
            const result = await this.$swal({
                title: "Are you sure?",
                text: "Once deleted, there is no going back",
                icon: "warning",
                showCancelButton: true,
                dangerMode: true,
            });
            if (result.value) {
                const response = await this.POST(`/products/${id}/delete`);
                if (response && response.success) {
                    this.$toast.success(response.message || "Successfully");
                    this.fetchBooks();
                }
            }
        },
        category_level_1() {
            this.fetchCategoryLevel2();
            this.fetchBooks();
        },
        category_level_2() {
            this.fetchCategoryLevel3();
            this.fetchBooks();
        },
        category_level_3() {
            this.fetchBooks();
        },
    },
    created() {},
    mounted() {
        this.page = this.$route.query.page || 1;
        this.fetchBooks();
        this.fetchHighestCategory();
    },
};
</script>

<style lang="css" scoped></style>
