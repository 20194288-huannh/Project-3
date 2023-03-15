<template>
  <div class="d-flex flex-column align-items-center">
    <nuxt-link
      :to="`/books/${book.id}`"
      :title="book?.name"
      ><img
        class="position-relative"
        :src="
          book?.image ||
          'https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/notavailable.gif'
        "
        @error="setDefaultImage"
        :alt="book?.name"
        :height="height"
        @mouseover="isShowQuickView = 1"
        @mouseout="isShowQuickView = 0"
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
    </nuxt-link>
  </div>
</template>

<script>
export default {
  props: {
    height: {
      type: Number,
      default: 200,
    },
    book: {
      type: Object,
    },
  },
  data() {
    return {
      isShowQuickView: 0,
      defaultImage: 'https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/notavailable.gif'
    };
  },
  methods: {
    setDefaultImage(event) {
      event.target.src = this.defaultImage;
    }
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
