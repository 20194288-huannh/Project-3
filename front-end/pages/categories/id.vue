<template>
  <b-container fluid class="p-5">
    <h3 class="text-center font-italic">New Arrivals</h3>
    <b-row>
      <b-col style="width: fit-content;">
        <h5 class="font-italic">Refine your Search</h5>
        <div>Price range: ₹0 - ₹50000</div>
      </b-col>
      <b-col cols="9">
        <div class="d-flex justify-content-between">
          <span class="d-flex align-items-center"><strong>401 results found</strong></span>
          <div>
            <span>Sort By: </span>
            <b-dropdown
              split
              split-variant="outline-primary"
              variant="primary"
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
            <ItemBook style="border: 1px solid rgba(0,0,0,.125);"/>
            <ItemBook style="border: 1px solid rgba(0,0,0,.125);"/>
            <ItemBook style="border: 1px solid rgba(0,0,0,.125);"/>
            <ItemBook style="border: 1px solid rgba(0,0,0,.125);"/>
            <ItemBook style="border: 1px solid rgba(0,0,0,.125);"/>
            <ItemBook style="border: 1px solid rgba(0,0,0,.125);"/>
            <ItemBook style="border: 1px solid rgba(0,0,0,.125);"/>
            <ItemBook style="border: 1px solid rgba(0,0,0,.125);"/>
            <ItemBook style="border: 1px solid rgba(0,0,0,.125);"/>
            <ItemBook style="border: 1px solid rgba(0,0,0,.125);"/>
            <ItemBook style="border: 1px solid rgba(0,0,0,.125);"/>
            <ItemBook style="border: 1px solid rgba(0,0,0,.125);"/>
            <ItemBook style="border: 1px solid rgba(0,0,0,.125);"/>
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {};
</script>

<style scoped>
.grid-container {
    display: grid;
    column-gap: 0px;
    grid-template-columns: auto auto auto auto auto;
}
</style>