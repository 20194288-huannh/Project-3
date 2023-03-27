<template>
  <div>
    <b-card
      @mouseover="isShowQuickView = 1"
      @mouseout="isShowQuickView = 0"
      :class="isShowQuickView ? '' : 'border-card'"
    >
      <div class="offer position-absolute">{{book.sale}}%</div>
      <nuxt-link
        :to="`/books/${book.id}`"
      >
        <b-card-img
          img-top
          :src="
            book?.image ||
            'https://d2g9wbak88g7ch.cloudfront.net/productimages/mainimages/notavailable.gif'
          "
          :alt="book?.name"
          @error="setDefaultImage"
        />
        
      </nuxt-link>
      <div class="title">
        <b-button
          v-show="isShowQuickView"
          class="quick-view themecolor w-100"
          @click="showQuickView(book?.id)"
          >Quick View
        </b-button>
        <b-card-text>
          <span
            class="booktitle font-weight-bold text-center"
            v-if="book?.name"
            >{{ book.name }}</span
          >
          <span class="author authortextcolor" v-if="book?.author">{{
            book.author
          }}</span>
          <div class="d-flex justify-content-center">
            <span
              class="actualprice themecolor font-weight-bold mr-2"
              v-if="book?.price"
              >₹{{ salePrice }}</span
            >
            <span class="initialprice"
              ><del>₹{{ book.price }}</del></span
            >
          </div>
        </b-card-text>
      </div>
    </b-card>
  </div>
</template>

<script>
export default {
  props: {
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
    showQuickView(id) {
      this.$emit("show-modal-quick-view", id);
    },
    setDefaultImage(event) {
      event.target.src = this.defaultImage;
    }
  },
  computed: {
    salePrice() {
      return Math.floor(this.book?.price - this.book?.price * this.book?.sale / 100);
    }
  },
};
</script>

<style scoped>
.booktitle {
  font-size: 14px;
  color: #676767;
  display: block;
  min-height: 41px;
  margin-top: 11px;
  height: 41px;
  overflow: hidden;
}

.author {
  color: #332e2e;
  font-size: 14px;
  display: block;
  height: 41px;
  overflow: hidden;
  text-align: center;
  width: 100% !important;
}

.actualprice {
  color: #d51912 !important;
}

button.quick-view.themecolor {
  border: 1px solid #d51912;
  background-color: #fff;
  font-size: 12px;
  padding: 2px 8px;
  text-transform: uppercase;
  font-weight: 700;
  position: absolute;
  top: -27px;
  width: 123px;
  max-width: 90%;
  left: 50%;
  transform: translateX(-50%);
  cursor: pointer;
  text-align: center;
}

.themecolor {
  color: #d51912 !important;
}

.title {
  position: relative;
  margin-top: auto 0;
  font-style: italic;
}

.border-card {
  border: 1px solid #fff;
}

.offer {
  background: red;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  color: #fff;
  right: 0;
  line-height: 20px;
  font-size: 13px;
  padding-top: 8px;
  font-weight: 700;
  z-index: 9;
  right: 8px;
  top: 22px;
}
</style>
