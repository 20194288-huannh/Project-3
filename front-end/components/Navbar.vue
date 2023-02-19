<template>
<b-container fluid>
    <b-row class="p-3">
        <b-col cols="1">
            <nuxt-link to="/">
                <b-img src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/logo-new.png" alt="Image 1"></b-img>
            </nuxt-link>
        </b-col>
        <b-col cols="6">
            <b-row class="justify-content-end">
                <b-col cols="10">
                    <b-input-group class="mt-3">
                        <b-form-input placeholder="Search by Title, Author, Publisher or ISBN" class="input-search"></b-form-input>
                        <b-input-group-append>
                            <b-button class="btn-search"></b-button>
                        </b-input-group-append>
                    </b-input-group>
                </b-col>
            </b-row>
        </b-col>
        <b-col cols="5">
            <b-row class="justify-content-end">
                <b-list-group horizontal class="border-none align-items-center">
                    <b-list-group-item class="hover" v-if="!loggedIn">
                        <b-input-group>
                            <b-form-input placeholder="Hello, User" class="input-search"></b-form-input>
                            <b-input-group-append>
                                <b-button variant="danger">
                                    <b-icon icon="person-circle" variant="light"></b-icon>
                                </b-button>
                            </b-input-group-append>
                        </b-input-group>
                        <div class="onHover text-center" style="width: 70%">
                            <nuxt-link to="/login">
                                <b-button variant="danger" class="w-100">Log In</b-button>
                            </nuxt-link>
                            <nuxt-link to="/register" class="text-danger pt-2 pb-3">Sign Up</nuxt-link>
                        </div>
                    </b-list-group-item>
                    <b-list-group-item class="hover" v-else>
                        <b-icon icon="person-circle" variant="danger" scale="1.5" class="mr-2"></b-icon>
                        <span>My Account</span>
                        <span class="text-danger font-weight-bold"> > </span>
                        <div class="onHover text-center">
                            <nuxt-link to="/login">
                                <b-button variant="danger" class="w-100" @click="logout">Log Out</b-button>
                            </nuxt-link>
                            <span class="text-danger pt-2 pb-3" style="border-bottom: 1px solid #bbb">Sign Up</span>
                            <nuxt-link :to="loggedIn ? '/login' : '/me'"><span>Your Account</span></nuxt-link>
                            <span>Your Order</span>
                            <span>Change Password</span>
                        </div>
                    </b-list-group-item>
                    <b-list-group-item class="d-flex justify-content-center">
                        <b-icon icon="heart" scale="2" variant="danger"></b-icon>
                    </b-list-group-item>
                    <b-list-group-item class="d-flex justify-content-center">
                        <b-icon icon="cart3" scale="2" variant="danger"></b-icon>
                    </b-list-group-item>
                </b-list-group>
            </b-row>
        </b-col>
    </b-row>
    <b-row class="justify-content-between backgrourd-navbar" align-v="center">
        <b-col cols="11">
            <b-navbar>
                <b-navbar-nav>
                    <!-- Navbar dropdowns -->
                    <b-nav-item-dropdown text="Book" left>
                        <b-dropdown-item :href="`/categories/${category.id}`" class="book-category" v-for="category in categories" :key="category.id">{{category.name}}</b-dropdown-item>
                    </b-nav-item-dropdown>

                    <b-nav-item href="#">
                        <nuxt-link to="/promo/id">New Arrivals</nuxt-link>
                    </b-nav-item>
                    <b-nav-item href="#">
                        <nuxt-link to="/promo/id">Box Sets</nuxt-link>
                    </b-nav-item>
                    <b-nav-item href="#">
                        <nuxt-link to="/promo/id">Best sellers</nuxt-link>
                    </b-nav-item>
                    <b-nav-item href="#">
                        <nuxt-link to="/promo/id">Fiction Books</nuxt-link>
                    </b-nav-item>
                    <b-nav-item href="#">
                        <nuxt-link to="/promo/id">Award Winners</nuxt-link>
                    </b-nav-item>
                    <b-nav-item href="#">
                        <nuxt-link to="/authors">Feature Authors</nuxt-link>
                    </b-nav-item>
                    <b-nav-item href="#">
                        <nuxt-link to="/promo/id">Request a book</nuxt-link>
                    </b-nav-item>
                </b-navbar-nav>
            </b-navbar>
        </b-col>
        <b-col cols="1" class="d-flex justify-content-end">
            <img alt="App Icon" style="height: 40px" class="pr-3" src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/android_withhover.svg" />
        </b-col>
    </b-row>
</b-container>
</template>

<style lang="css" scoped>
.btn-search {
    background: #e42b26 url("https://www.bookswagon.com/images/svg/search-solid.svg") no-repeat center !important;
    padding: 16px 15px;
    background-size: 20px 19px !important;
    height: 38px !important;
    width: 43px !important;
    vertical-align: top;
    border-radius: 0 5px 5px 0;
}

.input-search {
    border: 1px solid #e42b26 !important;
}

.height-33 {
    height: 33px;
}

.list-group-item {
    border: none;
}

.backgrourd-navbar {
    background: #d51912;
}

.nav-link a {
    color: #fff !important;
    padding: 11px 15px !important;
    font-size: 16px;
    line-height: 30px;
}

.navbar {
    padding: 0 0 0 15px;
}

.book-category {
    font-style: italic !important;
    font-weight: 700 !important;
    color: red !important;
}

.book-category a.dropdown-item {
    color: red !important;
}

.categories {
    overflow-y: auto !important;
    max-height: 100px !important;
}

a.dropdown-item {
    font-weight: 700 !important;
    color: #676767 !important;
}

.dropdown-menu li:hover {
    border-left: 4px solid #d51912;
}

.dropdown-menu li:hover .dropdown-item {
    color: #d51912 !important;
}

.hover:hover .onHover {
    visibility: visible;
}

.onHover {
    width: 100%;
    display: flex;
    flex-direction: column;
    padding: 1.25rem;
    margin-top: 0.5rem;
    border: 1px solid #bbb;
    background-color: #fff;
    z-index: 8;
    border-radius: 5px;
    visibility: hidden;
    position: absolute;
}
</style>

<script>
// import {mapGetters} from 'vuex'
// import { nameMenu } from '~/commons/constants'
export default {
    // middleware: ['authenticated'],
    data() {
        return {
            categories: [],
        };
    },
    computed: {
        loggedIn() {
            return this.$auth.loggedIn
        }
    },
    created() {
        this.fetchCategories();
    },
    methods: {
        async logout() {
          await this.$auth.logout()
        },
        async fetchCategories() {
            const response = await this.$axios.get(`/categories/highest`)
            if (response.status === 200 && response.data) {
                this.categories = response.data.data
            }
        },
    },
};
</script>
