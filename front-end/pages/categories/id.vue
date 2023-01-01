<template>
  <b-container class="mt-5 ">
    <div class="d-flex justify-content-between">
      <div class="category-column" style = "border-right: 1px solid #999">
        <h4 class="category-title">Browse Categories</h4>
        <ul class="list-group">
          <li class="list-group-item"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon>Cras justo odio</li>
          <li class="list-group-item second category-active"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon>Dapibus ac facilisis in</li>
          <li class="list-group-item third"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon>Morbi leo risus</li>
          <li class="list-group-item fourth"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon>Porta ac consectetur ac</li>
          <li class="list-group-item fourth"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon>Porta ac consectetur ac</li>
          <li class="list-group-item fourth"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon>Porta ac consectetur ac</li>
          <li class="list-group-item fourth"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon>Porta ac consectetur ac</li>
          <li class="list-group-item fourth"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon>Porta ac consectetur ac</li>
          <li class="list-group-item fourth"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon>Porta ac consectetur ac</li>
          <li class="list-group-item fourth"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon>Porta ac consectetur ac</li>
          <li class="list-group-item fourth"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon>Porta ac consectetur ac</li>
          <li class="list-group-item fourth"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon>Porta ac consectetur ac</li>
          <li class="list-group-item fourth"><b-icon class="icon" icon="caret-right-fill" aria-hidden="true"></b-icon>Porta ac consectetur ac</li>
        </ul>
      </div>
      <div class="book-column">
        <b-breadcrumb :items="breadcrumbs"></b-breadcrumb>
        <div class="d-flex justify-content-between pb-3">
          <h5 class="font-weight-bold">Architecture</h5>
          <div>
            <span class="font-weight-bold">Sort By: </span>
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
        <HorizontalBook />
        <HorizontalBook />
        <HorizontalBook />
        <HorizontalBook />
        <HorizontalBook />
      </div>
    </div>
  </b-container>
</template>

<script>
export default {
  data() {
    return {
      breadcrumbs: [
        {
          text: "Home",
          href: "#",
        },
        {
          text: "Arts & Photography",
          href: "#",
        },
        {
          text: "Architecture",
          href: "#",
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
.category-column{
  border-right: 1px solid rgb(204, 204, 204);
  width: 20%;
}
.book-column{
  width: 75%;
}
.category-title{
  color: #BC3232;
  font-size: 18px;
  margin-bottom: 10px;
}
.list-group-item{
  border: none !important;
  padding: 0;
  font-size: 14px;
  padding: 4px 0px;
}
.first{
  margin-left: 0px;
}
.second{
  margin-left: 10px;
}
.third{
  margin-left: 20px;
}
.fourth{
  margin-left: 30px;
}
.category-active{
  font-weight: 600;
}
.icon{
  font-size: 12px;
  color: #BC3232;
  padding-right: 3px;
}
.breadcrumb {
  background-color: #fff !important;
}
</style>