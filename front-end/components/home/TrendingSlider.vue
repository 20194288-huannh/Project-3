<template>
  <div>
    <b-list-group horizontal class="list-group-nav">
      <b-list-group-item class="col-2 d-flex align-items-center justify-content-center">
        <a
          href="https://www.bookswagon.com/promo-best-seller/best-seller/03AC998EBDC2"
          class="d-flex flex-column justify-content-center align-items-center"
        >
          <img
            src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/icon1.png"
            width="71px"
            height="71px"
            alt="Best seller"
          /><br />
          <span>Best Seller</span>
        </a>
      </b-list-group-item>
      <b-list-group-item class="col-2 d-flex align-items-center justify-content-center">
        <a
          href="https://www.bookswagon.com/promo-best-seller/award-winning/2109CDC4B4DC"
          class="d-flex flex-column justify-content-center align-items-center"
        >
          <img
            src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/icon8.png"
            width="71px"
            height="71px"
            alt="Award Winners"
          /><br />
          <span>Award Winners</span>
        </a>
      </b-list-group-item>
      <b-list-group-item class="col-2 d-flex align-items-center justify-content-center">
        <a
          href="https://www.bookswagon.com/promo-best-seller/box-sets/389DA2389287"
          class="d-flex flex-column justify-content-center align-items-center"
        >
          <img
            src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/icon4.png"
            width="71px"
            height="71px"
            alt="Box Sets"
          /><br />
          <span>Box Sets</span>
        </a>
      </b-list-group-item>
      <b-list-group-item class="col-2 d-flex align-items-center justify-content-center">
        <a
          href="https://www.bookswagon.com/promo-best-seller/new-arrivals/99325F010C89"
          class="d-flex flex-column justify-content-center align-items-center"
        >
          <img
            src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/icon2.png"
            width="71px"
            height="71px"
            alt="New Arrivals"
          /><br />
          <span>New Arrivals</span>
        </a>
      </b-list-group-item>
      <b-list-group-item class="col-2 d-flex align-items-center justify-content-center">
        <a 
          href="https://www.bookswagon.com/promo/fiction-books/9D7S5K6U3M"
          class="d-flex flex-column justify-content-center align-items-center"
        >
          <img
            src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/icon5.png"
            width="71px"
            height="71px"
            alt="Fictions Books"
          /><br />
          <span>Fictions Books</span>
        </a>
      </b-list-group-item>
      <b-list-group-item class="col-2 d-flex align-items-center justify-content-center">
        <a
          href="https://www.bookswagon.com/promo/best-tarot-card-decks/9H1N7S3D0P"
          class="d-flex flex-column justify-content-center align-items-center"
        >
          <img
            src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/tarot.png"
            width="71px"
            height="71px"
            alt="Tarot Cards"
          /><br />
          <span>Tarot Cards</span>
        </a>
      </b-list-group-item>
      <b-list-group-item class="col-2 d-flex align-items-center justify-content-center">
        <a
          href="https://www.bookswagon.com/promo-best-seller/international-bestseller/6CDDFB86E08F"
          class="d-flex flex-column justify-content-center align-items-center"
        >
          <img
            src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/icon7.png"
            width="71px"
            height="71px"
            alt="International Best Seller"
          /><br />
          <span class="text-center">International Best Seller</span>
        </a>
      </b-list-group-item>
    </b-list-group>
    <b-carousel
      id="carousel-1"
      v-model="slide"
      :interval="4000"
      controls
      indicators
      img-width="1024"
      img-height="480"
      style="text-shadow: 1px 1px 2px #333"
    >
      <!-- Slides with img slot -->
      <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
      <b-carousel-slide>
        <template #img>
          <b-row>
            <b-col cols="3">
              <HomeItemTrending :height="300"/>
            </b-col>
            <b-col cols="6">
              <b-row align-v="center" class="h-100 justify-content-around">
                <b-col cols="3">
                  <HomeItemTrending/>
                </b-col>
                <b-col cols="3">
                  <HomeItemTrending/>
                </b-col>
                <b-col cols="3">
                  <HomeItemTrending/>
                </b-col>
                <b-col cols="3">
                  <HomeItemTrending/>
                </b-col>
              </b-row>
            </b-col>
            <b-col cols="3">
              <HomeItemTrending :height="300"/>
            </b-col>
          </b-row>
        </template>
      </b-carousel-slide>
      <b-carousel-slide>
        <template #img>
          <b-row>
            <b-col cols="3">
              <HomeItemTrending :height="300"/>
            </b-col>
            <b-col cols="6">
              <b-row align-v="center" class="h-100 justify-content-around">
                <b-col cols="3">
                  <HomeItemTrending/>
                </b-col>
                <b-col cols="3">
                  <HomeItemTrending/>
                </b-col>
                <b-col cols="3">
                  <HomeItemTrending/>
                </b-col>
                <b-col cols="3">
                  <HomeItemTrending/>
                </b-col>
              </b-row>
            </b-col>
            <b-col cols="3">
              <HomeItemTrending :height="300"/>
            </b-col>
          </b-row>
        </template>
      </b-carousel-slide>
      <b-carousel-slide>
        <template #img>
          <b-row>
            <b-col cols="3">
              <HomeItemTrending :height="300"/>
            </b-col>
            <b-col cols="6">
              <b-row align-v="center" class="h-100 justify-content-around">
                <b-col cols="3">
                  <HomeItemTrending/>
                </b-col>
                <b-col cols="3">
                  <HomeItemTrending/>
                </b-col>
                <b-col cols="3">
                  <HomeItemTrending/>
                </b-col>
                <b-col cols="3">
                  <HomeItemTrending/>
                </b-col>
              </b-row>
            </b-col>
            <b-col cols="3">
              <HomeItemTrending :height="300"/>
            </b-col>
          </b-row>
        </template>
      </b-carousel-slide>
    </b-carousel>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isShowQuickView: 0,
    };
  },
};
</script>

<style lang="scss" scoped>
</style>
