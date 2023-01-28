<template>
    <b-container>
        <h2 class="text-center mt-5 mb-5">Profile</h2>
        <b-row>
            <b-col cols="3">
                <h4>Account</h4>
                <b-list-group>
                    <b-list-group-item>Account Infomation</b-list-group-item>
                    <b-list-group-item>Cart</b-list-group-item>
                    <b-list-group-item @click="logout()">Log Out</b-list-group-item>
                </b-list-group>
            </b-col>
            <b-col cols="8">
                <h4>Account Infomation</h4>
                <b-row  class="p-3">
                    <b-col cols="3" class="d-flex flex-column">
                        <span>ID: </span>
                        <span>Name: </span>
                        <span>Email: </span>
                        <span>Role: </span>
                        <span>Address: </span>
                        <span>Phone: </span>
                    </b-col>
                    <b-col cols="8" class="d-flex flex-column">
                        <span>{{user?.id}}</span>
                        <span>{{user?.name}}</span>
                        <span>{{user?.email}}</span>
                        <span>{{user?.role == 1 ? 'Admin' : 'Customer'}}</span>
                        <span>{{user?.address}}</span>
                        <span>{{user?.phone}}</span>
                    </b-col>
                </b-row>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    export default {
        data() {
            return {
                user: {},
            }
        },
        methods: {
            logout() {
                this.$auth.logout()
                this.$router.push('/')
            }
        },
        created () {
            this.user = this.$auth.user
        },
    }
</script>

<style lang="scss" scoped>

</style>