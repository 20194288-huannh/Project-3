<template>
<b-container class="d-flex flex-column justify-content-center align-items-center mt-5">
    <b-table :items="books" :fields="fields">
        <template #cell(actions)="row">
            <div class="text-muted" style="font-size: 14px">Added on: {{row.item?.created_at | formatDate}}</div>
            <b-button size="sm" variant="success" class="add-to-cart-btn" @click="addToCart(row.item.id)">
                Add to Cart
            </b-button>
        </template>
        <template #cell(id)="row">
            <b-button @click="destroyWishList(row.item.id)" variant="link">
                <b-icon icon="trash-fill" aria-hidden="true" scale="2" variant="muted"></b-icon>
            </b-button>
        </template>
        <template #cell(image)="row">
            <div class="d-flex">
                <b-img left :src="row.item?.image" alt="Left image" height="100" class="mr-3"></b-img>
            </div>
        </template>
        <template #cell(price)="row">
            <div class="d-flex flex-column justify-content-between">
                <span class="text-muted actual-price">${{row.item?.price}}</span>
                <span class="text-muted">${{row.item?.price}}</span>
            </div>
        </template>
        <template #cell(sale)="row">
            <div class="d-flex flex-column justify-content-between">
                <span class="text-muted actual-price">{{row.item?.sale}}%</span>
            </div>
        </template>
    </b-table>
</b-container>
</template>

<script>
export default {
    data() {
        return {
            fields: [{
                    key: "id",
                    label: "Sr.#"
                },
                {
                    key: "name",
                    label: "Name"
                },
                {
                    key: "author",
                    label: "Author"
                },
                {
                    key: "image",
                    label: "Image"
                },
                {
                    key: "price",
                    label: "Price"
                },
                {
                    key: "sale",
                    label: "Sale"
                },
                {
                    key: "actions",
                    label: "Actions"
                },
            ],
            books: []
        }
    },
    methods: {
        async fetchWishList() {
            const response = await this.GET('/products/wishlist')
            this.books = response.data.data
        },
        async destroyWishList(id) {
            const response = await this.POST(`/products/wishlist/${id}`)
            this.$toast.success("Delete Successed!")
            this.fetchWishList()
        },
        async addToCart(id) {
            if (this.$auth.loggedIn) {
                const response = await this.$axios.post(`/orders`, {
                    product_id: id,
                });
                if (response.status === 200 && response.data) {
                    this.$toast.success("Add To Cart Successed!")
                    this.$bvModal.hide("bv-modal-quick-view");
                }
            } else {
                this.$router.push("/login");
            }
        },
    },
    created() {
        this.fetchWishList();
    },
}
</script>

<style lang="scss" scoped>
.add-to-cart-btn {
    padding: 5px 25px;
    border-radius: 15px;
}
</style>
