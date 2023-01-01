<template>
  <div class="d-flex flex-column align-items-center">
    <a
      href="https://www.bookswagon.com/book/spy-x-family-vol-6/9781974725137"
      title="Spy X Family, Vol. 6"
      @mouseover="isShowQuickView = 1"
      @mouseout="isShowQuickView = 0"
      ><img
        class="position-relative"
        src="https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/137/9781974725137.jpg"
        data-src="https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/137/9781974725137.jpg"
        onerror="handleInvalidImages(this,'mainimages')"
        alt="Spy X Family, Vol. 6"
        :height="height"
    />
    <Transition name="slide-fade">
    <div class="newtrendquick" :class="isShowQuickView ? '' : 'invisible'"> 
      <a
        class="quick-view themecolor"
        data-toggle="modal"
        data-target="#quickviewmodal"
        data-id="2949456"
        >Quick View</a
      >
    </div>
    </Transition>
    </a>
  </div>
</template>

<script>
export default {
    props: {
        height: {
            type: Number,
            default: 200,
        },
    },
  data() {
    return {
      isShowQuickView: 0,
    };
  },
};
</script>

<style lang="scss" scoped>
.newtrendquick {
    display: flex;
  width: 100%;
}
.quick-view {
  background-color: #fff;
  border: 2px;
}
a.quick-view.themecolor {
  border: 1px solid #d51912;
  font-size: 13px;
  padding: 5px 20px;
  text-transform: uppercase;
  font-weight: 700;
  margin-top: -30px;
  z-index: 1;
  width: 100%;
  cursor: pointer;
  text-align: center;
}
</style>