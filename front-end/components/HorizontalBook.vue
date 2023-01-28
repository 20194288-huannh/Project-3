<template>
  <b-row class="text-color" style="border-top: solid 1px #ccc;">
    <b-col cols="6">
      <b-row class="content" >
        <b-col cols="3">
          <nuxt-link
            :to="`/books/${book.id}`"
            ><img
              :src="book.image"
              alt="Sapiens"
              height="150"
              width="100"
          /></nuxt-link>
        </b-col>
        <b-col cols="9" class="d-flex  flex-column">
            <a href=""><span class="title">{{book.name}}</span></a>
            <span><strong>By: </strong><a href="">{{book.author}}</a></span>
            <b-row>
                <b-col cols="3" class="mt-2 price">
                    <span class="text-muted actual-price">₹{{book.price}}</span>
                    <span class="text-danger sell">₹419</span>
                </b-col>
                <b-col cols="9" class="mt-2 d-flex flex-row-reverse">
                    <b-row class="w-100">
                        <b-col cols="4" class="d-flex flex-column font-weight-bold" style="font-size: 13px">
                            <span>Binding: </span>
                            <span>Release: </span>
                            <span>Language: </span>
                        </b-col>
                        <b-col cols="6" class="d-flex flex-column" style="font-size: 13px">
                            <span>{{book.product_detail?.binding}}</span>
                            <span>{{book.product_detail?.publisher_date | formatDate}}</span>
                            <span>{{book.product_detail?.language}} </span>
                        </b-col>
                    </b-row>
                </b-col>
            </b-row>
        </b-col>
      </b-row>
    </b-col>
    <b-col cols="6" class="buy">
        <span class="status">International Edition</span>
        <span>Ships within <strong>{{book.shipping_time}} </strong> Explain..</span>
        <span v-if="book.shipping_cost">{{book.shipping_cost}} Shipping in India and low cost Worldwide.</span>
        <span v-else>Free Shipping in India and low cost Worldwide.</span>
        <div class="mt-2">
            <b-button variant="danger" class="font-weight-bold" @click="buy">Buy Now</b-button>
            <b-button variant="dark" class="font-weight-bold">Add to Wishlist</b-button>
        </div>
    </b-col>
  </b-row>
</template>

<script>
export default {
    props: {
        book: {
            type: Object,
        },
    },
    methods: {
        async buy() {
            if (this.$auth.loggedIn) {
                const response = await this.$axios.post(`/orders`, {product_id: this.book.id})
                if (response.status === 200 && response.data) {
                    this.$emit('showOrdersModal')
                }
            } else {
                this.$router.push('/login')
            }
        }
    },
};
</script>

<style lang="scss" scoped>
.content{
    padding: 10px 0 20px;
}
.title{
    font-size: 18px;
}
.price{
    display: flex;
    flex-direction: column;
    border-right: solid 1px #ccc;
}
.text-color{
    color: #555555;
}
.actual-price{
    font-size: 13px;
    text-decoration: line-through;
    font-weight: 600;
}
.sell{
    font-size: 16px;
    font-weight: 600;
}
.status{
    color: #090;
    font-weight: 600;
}
.buy{
    display: flex;
    flex-direction: column;
    margin-top: 25px;
    font-size: 16px;
}
</style>