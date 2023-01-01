<template>
  <b-container fluid class="p-5">
    <h3 class="text-center font-italic">New Arrivals</h3>
    <b-row>
      <b-col style="flex:20">
        <h5 class="font-italic">Refine your Search</h5>
        <div>Price range: ₹{{ minPrice }} - ₹{{ maxPrice }}</div>
        <multi-range-slider
          class="pt-3"
          baseClassName="multi-range-slider-bar-only"
          :minValue="minPrice"
          :maxValue="maxPrice"
          :max="50000"
          :min="0"
          :step="100"
          :rangeMargin="0"
          @input="updateFilterPrice"
        >
        </multi-range-slider>
        <div>Discount Range: {{ minDiscount }}%-{{ maxDiscount }}%</div>
        <multi-range-slider
          class="pt-3"
          baseClassName="multi-range-slider-bar-only"
          :minValue="minDiscount"
          :maxValue="maxDiscount"
          :max="50"
          :min="0"
          :step="1"
          :rangeMargin="0"
          @input="updateFilterDiscount"
        >
        </multi-range-slider>
        <span class="text-danger font-italic font-weight-bold">Binding</span>
        <b-form-group
          v-slot="{ ariaDescribedby }"
          class="mt-3"
        >
          <b-form-checkbox-group
            v-model="selected_binding"
            :options="options_binding"
            :aria-describedby="ariaDescribedby"
            name="flavour-2a"
            stacked
          ></b-form-checkbox-group>
        </b-form-group>
        <span class="text-danger font-italic font-weight-bold">Languages</span>
        <b-form-group
          v-slot="{ ariaDescribedby }"
          class="mt-3"
        >
          <b-form-checkbox-group
            v-model="selected_languages"
            :options="options_languages"
            :aria-describedby="ariaDescribedby"
            name="flavour-2a"
            stacked
          ></b-form-checkbox-group>
        </b-form-group>
      </b-col>
      <b-col style="flex:80">
        <div class="d-flex justify-content-between">
          <span class="d-flex align-items-center"
            ><strong>401 results found</strong></span
          >
          <div>
            <span>Sort By: </span>
            <b-dropdown
              split
              split-variant="outline-danger"
              variant="danger"
              text="Relevance"
            >
              <b-dropdown-item href="#">Relevance</b-dropdown-item>
              <b-dropdown-item href="#">Price - Low to High</b-dropdown-item>
              <b-dropdown-item href="#">Price - High to Low</b-dropdown-item>
              <b-dropdown-item href="#">Discount</b-dropdown-item>
            </b-dropdown>
          </div>
        </div>
        <div class="grid-container">
          <VerticalBook class="item"/>
          <VerticalBook class="item"/>
          <VerticalBook class="item"/>
          <VerticalBook class="item"/>
          <VerticalBook class="item"/>
          <VerticalBook class="item"/>
          <VerticalBook class="item"/>
          <VerticalBook class="item"/>
          <VerticalBook class="item"/>
          <VerticalBook class="item"/>
          <VerticalBook class="item"/>
          <VerticalBook class="item"/>
          <VerticalBook class="item"/>
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  data() {
    return {
      maxPrice: 50000,
      minPrice: 0,
      minDiscount: 0,
      maxDiscount: 50,
      selected_binding: [],
      selected_languages: [],
      options_binding: [
          { text: 'Paper Back', value: '1' },
          { text: 'Hand Over', value: '2' },
          { text: 'Others', value: '3' },
        ],
        options_languages: [
            { text: 'English', value: '1' },
            { text: 'Other', value: '2' },
        ]
    };
  },
  methods: {
    updateFilterPrice(e) {
      this.maxPrice = e.maxValue;
      this.minPrice = e.minValue;
    },
    updateFilterDiscount(e) {
      this.minDiscount = e.minValue;
      this.maxDiscount = e.maxValue;
    },
  },
};
</script>

<style scoped>
.grid-container {
  display: grid;
  column-gap: 0px;
  grid-template-columns: auto auto auto auto auto;
}
.item{
  border: 1px solid rgba(0, 0, 0, 0.125);
  padding: 10px 10px 0 10px;
}
</style>
<style>
.multi-range-slider-bar-only .bar-inner{
    background-color: #E9E9E9 !important;
    box-shadow: none;
    border: 1px solid #999  !important;
    box-shadow: none !important;
    height: 15px !important;
    border-radius: 0 !important;
}
.multi-range-slider-bar-only.zero-ranage-margin .thumb-right {
    left: 0px !important;
}
.multi-range-slider-bar-only .bar-right {
    width: 25%;
    background-color: #ffffff !important;
    border: 1px solid #999  !important;
    border-radius: 10% !important;
    box-shadow: none !important;
}
.multi-range-slider-bar-only .bar-left {
    width: 25%;
    background-color: #ffffff !important;
    border: 1px solid #999  !important;
    border-radius: 10% !important;
    box-shadow: none !important;
}

.multi-range-slider-bar-only .thumb::before {
    content: '';
    background-color: #f6f6f6 !important;
    position: absolute;
    width: 20px;
    height: 20px;
    border: 1px solid #c5c5c5 !important;
    box-shadow: none !important;
    border-radius: 15% !important;
    z-index: 1;
    margin: -2.25px !important;
    cursor: pointer;
}
</style>
<style src="../../node_modules/multi-range-slider-vue/MultiRangeSliderBarOnly.css">
</style>
