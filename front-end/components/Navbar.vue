<template>
  <b-container fluid>
    <b-row>
      <b-col cols="1">
        <a href="">
          <b-img fluid src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/logo-new.png" alt="Image 1"></b-img>
        </a>
      </b-col>
      <b-col cols="6">
        <b-input-group class="mt-3">
          <b-form-input placeholder="Search by Title, Author, Publisher or ISBN" class="input-search"></b-form-input>
          <b-input-group-append>
            <b-button class="btn-search"></b-button>
          </b-input-group-append>
        </b-input-group>
      </b-col>
      <b-col cols="5" >
        <b-row class="justify-content-end">
          <b-list-group horizontal class="border-none">
            <b-list-group-item>
                <b-input-group>
              <b-form-input placeholder="Hello, User" class="input-search"></b-form-input>
              <b-input-group-append>
                <b-button variant="danger"><b-icon icon="person-circle" variant="light"></b-icon></b-button>
              </b-input-group-append>
            </b-input-group>
            </b-list-group-item>
            <b-list-group-item class="d-flex justify-content-center"><b-icon icon="heart" scale="2" variant="danger"></b-icon></b-list-group-item>
            <b-list-group-item class="d-flex justify-content-center"><b-icon icon="cart3" scale="2" variant="danger"></b-icon></b-list-group-item>
          </b-list-group>
        </b-row>
      </b-col>
    </b-row>
    <b-row class="justify-content-between backgrourd-navbar" align-v="center">
      <b-col cols="11">
        <b-navbar>
          <b-navbar-nav>
            <!-- Navbar dropdowns -->
            <b-nav-item-dropdown text="Book" right>
              <b-dropdown-item class="text-white" href="#">EN</b-dropdown-item>
              <b-dropdown-item href="#">ES</b-dropdown-item>
              <b-dropdown-item href="#">RU</b-dropdown-item>
              <b-dropdown-item href="#">FA</b-dropdown-item>
            </b-nav-item-dropdown>

            <b-nav-item href="#" class="text-white" variant="light">New Arrivals</b-nav-item>
            <b-nav-item href="#">Box Sets</b-nav-item>
            <b-nav-item href="#">Best sellers</b-nav-item>
            <b-nav-item href="#">Fiction Books</b-nav-item>
            <b-nav-item href="#">Award Winners</b-nav-item>
            <b-nav-item href="#">Feature Authors</b-nav-item>
            <b-nav-item href="#">Request a book</b-nav-item>
          </b-navbar-nav>
        </b-navbar>
      </b-col>
      <b-col cols="1" class="d-flex justify-content-end">
        <img alt="App Icon" style="height: 40px;" class="pr-3" src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/android_withhover.svg">
      </b-col>
    </b-row>
  </b-container>
</template>
<style scope>
.btn-search {
  background: #e42b26 url('https://www.bookswagon.com/images/svg/search-solid.svg') no-repeat center !important;
  padding: 16px 15px;
  background-size: 20px 19px !important;
  height: 38px !important;
  width: 43px !important;
  vertical-align: top;
  border-radius: 0 5px 5px 0;
}
.input-search{
  border: 1px solid #e42b26 !important;
}
.list-group-item {
  border: none;
}
.backgrourd-navbar{
  background: #d51912;
}
.nav-link{
  color: #fff !important;
  padding: 11px 15px !important;
}
</style>
<script>
// import {mapGetters} from 'vuex'
// import { nameMenu } from '~/commons/constants'
export default {
  // middleware: ['authenticated'],
  data() {
    return {
    }
  },
  computed: {
  },
  methods: {
    logout() {
      // await this.$auth.logout()
      // this.$router.push('/login')
    }
  },
}
</script>
