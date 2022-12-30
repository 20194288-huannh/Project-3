<template>
  <b-row class="text-color" style="border-top: solid 1px #ccc;">
    <b-col cols="6">
      <b-row class="content" >
        <b-col cols="3">
          <a
            href="https://www.bookswagon.com/book/sapiens-yuval-noah-harari/9780099590088"
            ><img
              src="https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/088/9780099590088.jpg"
              alt="Sapiens"
              height="150"
              width="100"
          /></a>
        </b-col>
        <b-col cols="9" class="d-flex  flex-column">
            <a href=""><span class="title">Sapiens</span></a>
            <span><strong>By: </strong><a href="">Yuval Noah Harari</a></span>
            <b-row>
                <b-col cols="3" class="mt-2 price">
                    <span class="text-muted actual-price">₹599</span>
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
                            <span>Paperback</span>
                            <span>05 May 2016</span>
                            <span>English </span>
                        </b-col>
                    </b-row>
                </b-col>
            </b-row>
        </b-col>
      </b-row>
    </b-col>
    <b-col cols="6" class="buy">
        <span class="status">International Edition</span>
        <span>Ships within <strong>14-16 Days </strong> Explain..</span>
        <span>Free Shipping in India and low cost Worldwide.</span>
        <div class="mt-2">
            <b-button variant="danger" class="font-weight-bold">Buy Now</b-button>
            <b-button variant="dark" class="font-weight-bold">Add to Wishlist</b-button>
        </div>
    </b-col>
  </b-row>
</template>

<script>
export default {};
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