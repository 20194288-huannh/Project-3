<template>
  <b-row
    class="pt-5 pb-5 pr-3 pl-3 justify-content-between customer-border"
  >
    <b-col cols="2">
      <nuxt-link :to="`authors/${author?.id}`"
        ><img
          :src="author?.image"
          alt="Arundhati Roy"
          class="rounded-circle"
          width="90"
          height="90"
      /></nuxt-link>
    </b-col>
    <b-col cols="9" class="d-flex flex-column">
      <span class="author-name">{{ author?.name }}</span>
      <p class="text-limit mb-0">
        {{ author?.description }}
      </p>
      <nuxt-link class="mt-0 text-red" to="">Read More</nuxt-link>
    </b-col>
  </b-row>
</template>

<script>
export default {
  props: {
    author: {
      type: Object,
    },
  },
};
</script>

<style lang="scss" scoped>
.custom-border {
  display: inline-block;
  position: relative;
  padding-bottom: 5px; /* hoặc bất kỳ giá trị nào phù hợp */
}
.custom-border::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 1px;
  background-color: #000;
}
.author-name {
  color: #404040;
  font-weight: 600;
  font-style: italic;
}
.text-limit {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}

.text-expanded {
  -webkit-line-clamp: initial;
}
</style>
