<template>
  <b-row class="pt-5 pb-5 pr-3 pl-3" style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
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
    <b-col cols="10" class="d-flex flex-column">
      <span class="author-name">{{author?.name}}</span>
      <p>
        {{author?.description}}
      </p>
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
.author-name {
  color: #404040;
  font-weight: 600;
  font-style: italic;
}
</style>