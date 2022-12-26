<template>
  <div>
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
              <a
                href="https://www.bookswagon.com/book/vagabond-vizbig-edition-vol-2/9781421522449"
                title="Vagabond (Vizbig Edition), Vol. 2, 2"
                class="d-flex justify-content-around"
                ><img
                  class="bklazy"
                  src="https://d2g9wbak88g7ch.cloudfront.net/productimages/images200/449/9781421522449.jpg"
                  data-src="https://d2g9wbak88g7ch.cloudfront.net/productimages/images200/449/9781421522449.jpg"
                  onerror="handleInvalidImages(this,'mainimages')"
                  alt="Vagabond (Vizbig Edition), Vol. 2, 2"
                  width="200px"
                  height="300px"
              /></a>
              <div class="position-absolute newtrendquick"><a class="quick-view themecolor" data-toggle="modal" data-target="#quickviewmodal" data-id="2949456">Quick View</a></div>
            </b-col>
            <b-col cols="6">
              <b-row align-v="center" class="h-100 justify-content-around">
                <b-col cols="3" class="d-flex justify-content-center">
                  <a
                    href="https://www.bookswagon.com/book/spy-x-family-vol-6/9781974725137"
                    title="Spy X Family, Vol. 6"
                    @mouseover="isShowQuickView = 1" @mouseout="isShowQuickView = 0"
                    ><img
                      class="bklazy"
                      src="https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/137/9781974725137.jpg"
                      data-src="https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/137/9781974725137.jpg"
                      onerror="handleInvalidImages(this,'mainimages')"
                      alt="Spy X Family, Vol. 6"
                      width="125px"
                      height="200px"
                  /></a>
                  <div v-if="isShowQuickView" class="position-absolute newtrendquick"><a class="quick-view themecolor" data-toggle="modal" data-target="#quickviewmodal" data-id="2949456">Quick View</a></div>
                </b-col>
                <b-col cols="3" class="d-flex justify-content-center">
                  <a
                    href="https://www.bookswagon.com/book/spy-x-family-vol-6/9781974725137"
                    title="Spy X Family, Vol. 6"
                    @mouseover="isShowQuickView = 1" @mouseout="isShowQuickView = 0"
                    ><img
                      class="bklazy"
                      src="https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/137/9781974725137.jpg"
                      data-src="https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/137/9781974725137.jpg"
                      onerror="handleInvalidImages(this,'mainimages')"
                      alt="Spy X Family, Vol. 6"
                      width="125px"
                      height="200px"
                  /></a>
                  <div v-if="isShowQuickView" class="position-absolute newtrendquick"><a class="quick-view themecolor" data-toggle="modal" data-target="#quickviewmodal" data-id="2949456">Quick View</a></div>
                </b-col>
                <b-col cols="3" class="d-flex justify-content-center">
                  <a
                    href="https://www.bookswagon.com/book/spy-x-family-vol-6/9781974725137"
                    title="Spy X Family, Vol. 6"
                    ><img
                      class="bklazy"
                      src="https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/137/9781974725137.jpg"
                      data-src="https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/137/9781974725137.jpg"
                      onerror="handleInvalidImages(this,'mainimages')"
                      alt="Spy X Family, Vol. 6"
                      width="125px"
                      height="200px"
                  /></a>
                  <div class="position-absolute newtrendquick"><a class="quick-view themecolor" data-toggle="modal" data-target="#quickviewmodal" data-id="2949456">Quick View</a></div>
                </b-col>
                <b-col cols="3" class="d-flex justify-content-center">
                  <a
                    href="https://www.bookswagon.com/book/spy-x-family-vol-6/9781974725137"
                    title="Spy X Family, Vol. 6"
                    ><img
                      class="bklazy"
                      src="https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/137/9781974725137.jpg"
                      data-src="https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/137/9781974725137.jpg"
                      onerror="handleInvalidImages(this,'mainimages')"
                      alt="Spy X Family, Vol. 6"
                      width="125px"
                      height="200px"
                  /></a>
                  <div class="position-absolute newtrendquick"><a class="quick-view themecolor" data-toggle="modal" data-target="#quickviewmodal" data-id="2949456">Quick View</a></div>
                </b-col>
              </b-row>
            </b-col>
            <b-col cols="3">
              <a
                href="https://www.bookswagon.com/book/chainsaw-man-vol-8-tatsuki/9781974722785"
                title="Chainsaw Man, Vol. 8"
                class="d-flex justify-content-between"
                ><img
                  class="bklazy"
                  src="https://d2g9wbak88g7ch.cloudfront.net/productimages/images200/785/9781974722785.jpg"
                  data-src="https://d2g9wbak88g7ch.cloudfront.net/productimages/images200/785/9781974722785.jpg"
                  onerror="handleInvalidImages(this,'mainimages')"
                  alt="Chainsaw Man, Vol. 8"
                  width="200px"
                  height="300px"
              /></a>
              <div class="position-absolute newtrendquick"><a class="quick-view themecolor" data-toggle="modal" data-target="#quickviewmodal" data-id="2949456">Quick View</a></div>
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
            isShowQuickView: 0
        }
    },
};
</script>

<style lang="scss" scoped>
.newtrendquick{
    display: flex;
    justify-content: center;
    width: 100%;
}
.quick-view{
    background-color: #fff;
    border: 2px;
}
a.quick-view.themecolor {
    border: 1px solid #d51912;
    font-size: 13px;
    padding: 2px 8px;
    text-transform: uppercase;
    font-weight: 700;
    margin-bottom: 2px;
    position: absolute;
    top: 3px;
    width: 123px;
    max-width: 90%;
    left: 50%;
    transform: translateX(-50%);
    cursor: pointer;
    text-align: center;
}
</style>
