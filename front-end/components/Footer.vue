<template>
    <b-container fluid style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
        <b-row class="pt-5">
            <b-col cols="3" class="d-flex flex-column">
                <span class="text-danger font-italic font-weight-bold text-center mb-2">Company</span>
                <nuxt-link class="text-center" to="">About Us</nuxt-link>
                <nuxt-link class="text-center" to="">Career</nuxt-link>
                <nuxt-link class="text-center" to="">Blog</nuxt-link>
                <nuxt-link class="text-center" to="">Contact Us</nuxt-link>
            </b-col>
            <b-col cols="3" class="d-flex flex-column">
                <span class="text-danger font-italic font-weight-bold text-center mb-2">Policies</span>
                <nuxt-link class="text-center" to="">Privacy Policies</nuxt-link>
                <nuxt-link class="text-center" to="">Terms of Use</nuxt-link>
                <nuxt-link class="text-center" to="">Secure Shopping</nuxt-link>
                <nuxt-link class="text-center" to="">Copyright Policy</nuxt-link>
            </b-col>
            <b-col cols="3" class="d-flex flex-column">
                <span class="text-danger font-italic font-weight-bold text-center mb-2">Help</span>
                <nuxt-link class="text-center" to="">Payment</nuxt-link>
                <nuxt-link class="text-center" to="">Shipping</nuxt-link>
                <nuxt-link class="text-center" to="">Return</nuxt-link>
                <nuxt-link class="text-center" to="">FAQ</nuxt-link>
            </b-col>
            <b-col cols="3" class="d-flex flex-column">
                <span class="text-danger font-italic font-weight-bold text-center mb-2">Misc</span>
                <nuxt-link class="text-center" to="">Affiliate</nuxt-link>
                <nuxt-link class="text-center" to="">Sitemap</nuxt-link>
            </b-col>
        </b-row>
        <div class="d-flex justify-content-center mt-2">
            <b-list-group horizontal style="font-size: 1.5rem;">
                <b-list-group-item><b-icon icon="facebook" aria-hidden="true"></b-icon></b-list-group-item>
                <b-list-group-item><b-icon icon="twitter" aria-hidden="true"></b-icon></b-list-group-item>
                <b-list-group-item><b-icon icon="linkedin" aria-hidden="true"></b-icon></b-list-group-item>
                <b-list-group-item><b-icon icon="youtube" aria-hidden="true"></b-icon></b-list-group-item>
                <b-list-group-item><b-icon icon="instagram" aria-hidden="true"></b-icon></b-list-group-item>
            </b-list-group>
        </div>
        <div class="text-center mb-4">Copyright © 2022 . Bookswagon.com. All Rights Reserved</div>
    </b-container>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>

</style>